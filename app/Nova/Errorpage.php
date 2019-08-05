<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Image;
//use Laravel\Nova\Fields\Text;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Actions\Actionable;
//use Laravel\Nova\Fields\Toggle;
use Laravel\Nova\Fields\Boolean;


class Errorpage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Errorpage';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static function label()
    {
        return 'Error page';
    }

    



    public function fields(Request $request)
    {   
       
        return [
            ID::make()->sortable(),

            //Text::make('Created Date','updated_at'),
               
            Image::make('Image','image')->disk('404_page')->storeAs(function(Request $request) {
                return $request->image->getClientOriginalName();
            })->creationRules('required'),
            
            Boolean::make('Status','status')->fillUsing(function($request, $model, $attribute, $requestAttribute) {
               $id=$model->id;
              
                if($id=='' && $request->status==1 )
              {
                $model->where('id','!=',$id)->update(['status'=>0]);
                $model->status=$request->status;
                $model->save();
              }elseif($id=='' && $request->status==0){
                $model->status=$request->status;
                $model->save();
              }elseif($id!=''&& $model->status==0)
              {
                $model->status=$request->status;
                $model->save();
            }else
              {
                $model->where('id','!=',$id)->update(['status'=>0]);
                $model->where('id',$id)->update(['status'=>1]);
              }
             })
        
            
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
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
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
