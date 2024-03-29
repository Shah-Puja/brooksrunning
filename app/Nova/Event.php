<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Date;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Actions\Actionable;

class Event extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */

    public static $displayInNavigation = true;
    public static $model = 'App\Models\Event';
         

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'event_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'event_name','start_dt'
    ];

   
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $model1='App\Models\Event';
         $state_arr=[];
         $country_arr=[];
        
        // $state=$model1::select('state')->where('state','!=','')->distinct()->get();
        // foreach($state as $key => $states){
        //   $state_arr[]=$states->state;
        // }
        $states= $model1::select('state_abr')->where('state_abr','!=','')->distinct()->orderBy('state_abr', 'ASC')->get();
            if(!in_array('NT',(array)$states)){
                
                $array_nt=array( "state_abr" => "NT");
              
                $states->push( (object)$array_nt);
                $states=$states->sortBy('state_abr');
            }
            foreach($states as $key => $states){
          $state_arr[]=$states->state_abr;
        }
        $a=array_combine(array_values($state_arr), array_values($state_arr));
        $country=$model1::select('country')->where('country','!=','')->distinct()->get();
        foreach( $country as $key1 =>  $countries){
            $country_arr[]=$countries->country;
        }

        $b=array_combine(array_values($country_arr), array_values($country_arr));
        
        $value = $a['New Zealand'];
        unset($a['New Zealand']);
        $a['New Zealand'] = $value;
        
        return [
         
            ID::make()->hideFromIndex()->sortable(),
            Text::make('Event Name','event_name')->sortable()->rules('required', 'max:255'),

            Text::make('Event Header','event_header')->hideFromIndex()->rules('required', 'max:255'),

            Text::make('Slug','slug')->hideFromIndex()->rules('required', 'max:255'),

            Image::make('Logo','logo')->disk('uploads_event_logo')->storeAs(function (Request $request) {
                return $request->logo->getClientOriginalName();
            })->hideFromIndex()->help(
                'Recommended Dimensions : 450x450'
            )->rules('mimes:jpeg,png'),

            Image::make('Banner','banner')->disk('uploads_event_banner')->storeAs(function (Request $request) {
                return $request->banner->getClientOriginalName();
            })->hideFromIndex()->rules('mimes:jpeg,png'),
            
            //Text::make('Banner Background Colour','banner_bg_color')->hideFromIndex(),
            Text::make('Event Date','date_str')->sortable()->rules('required', 'max:255'),

            
           
            Date::make(__('Start date'), 'start_dt')->hideFromIndex()->rules('required', 'max:255'),
            Date::make(__('End date'), 'end_dt')->fillUsing(function($request, $model, $attribute, $requestAttribute) {
                if($request->end_dt==''){
                    $model->end_dt=$request->start_dt;
                }else{
                    $model->end_dt=$request->end_dt;
                }
            }
                
                )->hideFromIndex(),
            Date::make(__('Next Event date'), 'next_dt')->fillUsing(function($request, $model, $attribute, $requestAttribute) {
                if($request->next_dt==''){
                      $next=date('Y-m-d', strtotime("+12 months $request->start_dt"));
                    $model->next_dt = date('Y-m-01', strtotime($next));
                }else{
                    $model->next_dt = $request->next_dt;
                }
            })->hideFromIndex(),

            Text::make('City','city')->hideFromIndex(),
            
            // Select::make('State','state')
            // ->options([
            //     'ACT'=>'ACT',
            //     'New South Wales'=>'New South Wales',
            //     'NT'=>'NT',
            //     'Queensland'=>'Queensland',
            //     'South Australia'=>'South Australia',
            //     'Tasmania'=>'Tasmania',
            //     'Victoria'=>"Victoria",
            //     'Western Australia'=>'Western Australia',
            //     'New Zealand'=>'New Zealand'])->hideFromIndex(),

            Select::make('State','state_abr')->options($a)->hideFromIndex(),
             //Select::make('Country','country')->options(['Australia'=>'Australia','New Zealand'=>'New Zealand'])->hideFromIndex(),
            Select::make('Country','country')->options($b)->hideFromIndex(),
            Textarea::make('Content','content')->hideFromIndex(),
            Text::make('Link','link')->hideFromIndex(),
            Select::make('Enable','status')->options([
                'YES' => 'YES',
                'NO' => 'NO',
            ])->sortable(),
            
            Text::make('Series','series')->hideFromIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    


    public function cards(Request $request)
    {
        return [
            //(new Metrics\TotalEvents),
            //(new Metrics\EventPerDay),
            //(new Metrics\EventsPlan),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new Filters\EventType,
            new Filters\Eventstatus,
            //new Filters\Eventfeatured,
            new Filters\Eventdate,
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
