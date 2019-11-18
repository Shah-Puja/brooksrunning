<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(){
        $array = ['120292_030','120291_073','110303_008','110302_040'];
        $data_array = [];
        foreach($array as $item){
            $item = explode('_',$item);
            $style = $item[0];
            $color_code = $item[1];
            $data_array[] = array('style'=> $style,'color_code'=> $color_code);
        }   
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                    ->whereHas('variants', function ( $query ) {
                                          $query->where('visible', '=', 'Yes');
                                    })
                                    ->with('variants')
                                    ->get();
            
        $products = $styles->filter(function ($value, $key) use ($data_array) {
                $data=[];
                foreach($data_array as $value_array){
                        if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                            $data[] = $value;
                        }
                }
            return $data;
        })->unique('style');
        
        $colour_options = $styles->unique(function ($item){
            return $item['style'].$item['color_code'];
        });

        return view( 'customer.collection_listing',compact('colour_options','products'));
    }

    public function adreline_ghost(){
        $array = ['110294_096','120284_096','120284_484','120277_495','110288_096'];
        $data_array = [];
        foreach($array as $item){
            $item = explode('_',$item);
            $style = $item[0];
            $color_code = $item[1];
            $data_array[] = array('style'=> $style,'color_code'=> $color_code);
        }   
        $orderby_style_string = implode("','",collect($data_array)->pluck('style')->toArray());
        $orderby_color_string = implode("','",collect($data_array)->pluck('color_code')->toArray());
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                    ->whereHas('variants', function ( $query ) {
                                          $query->where('visible', '=', 'Yes');
                                    })
                                    ->with('variants')
                                    ->orderByRaw("FIELD(style ,'$orderby_style_string') ASC,FIELD(color_code ,'$orderby_color_string') ASC")
                                    ->get();
            
        $products = $styles->filter(function ($value, $key) use ($data_array) {
                $data=[];
                foreach($data_array as $value_array){
                        if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                            $data[] = $value;
                        }
                }
            return $data;
        })->unique(function ($item) {
            return $item['style'].$item['color_code'];
        });
        
        $colour_options = $styles->unique(function ($item){
            return $item['style'].$item['color_code'];
        });

        return view( 'customer.collection_adrenaline_ghost',compact('colour_options','products'));
    }

    public function mothers_day(){
        $women_running_shoes = \App\Models\Product::getProducts_array(['120277_406','120279_509','120284_028','120287_531','120292_030','120285_092']);
        $women_running_clothing = \App\Models\Product::getProducts_array(['221364_563', '221255_182','221135_182','221221_594','221349_561','221350_182']);
        $sports_bras = \App\Models\Product::getProducts_array(['350064_568','350037_052','350071_001']);
        $accessories = \App\Models\Product::getProducts_array(['280404_517','280356_520','280409_081']);
        $products = '';
        $colour_options ='';
        return view( 'customer.collection_mothers_day_listing',compact('women_running_shoes','women_running_clothing','sports_bras','accessories','colour_options','products'));
    }

    public function fathers_day(){
        $men_running_shoes = \App\Models\Product::getProducts_array(['110316_466','110283_126','110294_069','110299_092','110296_071','110298_479','110314_088','110309_053','110297_419']);
        $men_running_clothing = \App\Models\Product::getProducts_array(['211090_424', '211133_330','211232_078']);
        $men_accessories = \App\Models\Product::getProducts_array(['280337_329','280409_081','742087_100','BROXYGEN_211','280355_466','280412_001']);
        $products = '';
        $colour_options ='';
        return view( 'customer.collection_fathers_day_listing',compact('men_running_shoes','men_running_clothing','men_accessories','colour_options','products'));
    }

    public function energize_collection(){
        $support_shoes = \App\Models\Product::getProducts_array(['120272_321','110283_449','120286_615','110298_429']);
        $neutral_shoes = \App\Models\Product::getProducts_array(['110290_057', '120279_520','110293_428','120282_080','110297_488','120285_542','110295_493','120288_080']);
        $products = '';
        $colour_options ='';
        return view( 'customer.collection_energize_listing',compact('support_shoes','neutral_shoes','colour_options','products'));
    }

    public function shoes_for_nurses(){
        $array = ['120284_071','110294_071','620047_001','610060_001','120277_071','110288_071','110296_057','120283_070','120287_080','110299_092','120275_447','110286_064','110039_001','120032_001','620047_001','610060_001'];
        $data_array = [];
        foreach($array as $item){
            $item = explode('_',$item);
            $style = $item[0];
            $color_code = $item[1];
            $data_array[] = array('style'=> $style,'color_code'=> $color_code);
        } 
        $orderby_style_string = implode("','",collect($data_array)->pluck('style')->toArray());
        $orderby_color_string = implode("','",collect($data_array)->pluck('color_code')->toArray());  
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                        ->whereHas('variants', function ( $query ) {
                                            $query->where('visible', '=', 'Yes');
                                    })
                                    ->with('variants')
                                    ->orderByRaw("FIELD(style ,'$orderby_style_string') ASC,FIELD(color_code ,'$orderby_color_string') ASC")
                                    ->get();
            
        $products = $styles->filter(function ($value, $key) use ($data_array) {
                $data=[];
                foreach($data_array as $value_array){
                        if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                            $data[] = $value;
                        }
                }
            return $data;
        })->unique('style');
        
        $colour_options = $styles->unique(function ($item){
            return $item['style'].$item['color_code'];
        });

        return view( 'customer.collection_shoes_for_nurses',compact('colour_options','products'));
     }

     public function ghost_saturation(){
        $array = ['120305_620','110316_785','120305_394','110316_350','120305_465','110316_454'];
        $data_array = [];
        foreach($array as $item){
            $item = explode('_',$item);
            $style = $item[0];
            $color_code = $item[1];
            $data_array[] = array('style'=> $style,'color_code'=> $color_code);
        } 
        $orderby_style_string = implode("','",collect($data_array)->pluck('style')->toArray());
        $orderby_color_string = implode("','",collect($data_array)->pluck('color_code')->toArray());  
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                        ->whereHas('variants', function ( $query ) {
                                            $query->where('visible', '=', 'Yes');
                                    })
                                    ->with('variants')
                                    //->orderByRaw("FIELD(style ,'$orderby_style_string') ASC,FIELD(color_code ,'$orderby_color_string') ASC")
                                    ->get();
            
        $products_array = $styles->filter(function ($value, $key) use ($data_array) {
                $data=[];
                foreach($data_array as $value_array){
                        if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                            $data[] = $value;
                        }
                }
            return $data;
        });

        $products = $products_array->sortBy(function ($item, $key) use ($array) {
            foreach($array as $key=>$array_item){
                $array_item = explode('_',$array_item);
                $style = $array_item[0];
                $color_code = $array_item[1];
                if($item->style == $style && $item->color_code== $color_code){
                    return $key;
                }
            } 
        });
        
        $colour_options = $styles->unique(function ($item){
            return $item['style'].$item['color_code'];
        });

        return view( 'customer.collection_ghost_saturation',compact('colour_options','products'));
       }

       public function revel3_shine_collection(){
        $array = ['120302_032','120302_021','120302_043'];
        $data_array = [];
        foreach($array as $item){
            $item = explode('_',$item);
            $style = $item[0];
            $color_code = $item[1];
            $data_array[] = array('style'=> $style,'color_code'=> $color_code);
        } 
        $orderby_style_string = implode("','",collect($data_array)->pluck('style')->toArray());
        $orderby_color_string = implode("','",collect($data_array)->pluck('color_code')->toArray());  
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                        ->whereHas('variants', function ( $query ) {
                                            $query->where('visible', '=', 'Yes');
                                    })
                                    ->with('variants')
                                    //->orderByRaw("FIELD(style ,'$orderby_style_string') ASC,FIELD(color_code ,'$orderby_color_string') ASC")
                                    ->get();
            
        $products_array = $styles->filter(function ($value, $key) use ($data_array) {
                $data=[];
                foreach($data_array as $value_array){
                        if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                            $data[] = $value;
                        }
                }
            return $data;
        });

        $products = $products_array->sortBy(function ($item, $key) use ($array) {
            foreach($array as $key=>$array_item){
                $array_item = explode('_',$array_item);
                $style = $array_item[0];
                $color_code = $array_item[1];
                if($item->style == $style && $item->color_code== $color_code){
                    return $key;
                }
            } 
        });
        
        $colour_options = $styles->unique(function ($item){
            return $item['style'].$item['color_code'];
        });

        return view( 'customer.collection_revel_3_shine',compact('colour_options','products'));
       }

       public function melts_collection(){
        $array = ['120305_177','120292_177','110316_466'];
        $data_array = [];
        foreach($array as $item){
            $item = explode('_',$item);
            $style = $item[0];
            $color_code = $item[1];
            $data_array[] = array('style'=> $style,'color_code'=> $color_code);
        } 
        $orderby_style_string = implode("','",collect($data_array)->pluck('style')->toArray());
        $orderby_color_string = implode("','",collect($data_array)->pluck('color_code')->toArray());  
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                        ->whereHas('variants', function ( $query ) {
                                            $query->where('visible', '=', 'Yes');
                                    })
                                    ->with('variants')
                                    //->orderByRaw("FIELD(style ,'$orderby_style_string') ASC,FIELD(color_code ,'$orderby_color_string') ASC")
                                    ->get();
            
        $products_array = $styles->filter(function ($value, $key) use ($data_array) {
                $data=[];
                foreach($data_array as $value_array){
                        if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                            $data[] = $value;
                        }
                }
            return $data;
        });

        $products = $products_array->sortBy(function ($item, $key) use ($array) {
            foreach($array as $key=>$array_item){
                $array_item = explode('_',$array_item);
                $style = $array_item[0];
                $color_code = $array_item[1];
                if($item->style == $style && $item->color_code== $color_code){
                    return $key;
                }
            } 
        });
        
        $colour_options = $styles->unique(function ($item){
            return $item['style'].$item['color_code'];
        });

        return view( 'customer.collection_melts_collection',compact('colour_options','products'));
       }

       public function revel3_breakthrough_collection(){
        $array = ['110314_423','110314_077','110314_121'];
        $data_array = [];
        foreach($array as $item){
            $item = explode('_',$item);
            $style = $item[0];
            $color_code = $item[1];
            $data_array[] = array('style'=> $style,'color_code'=> $color_code);
        } 
        $orderby_style_string = implode("','",collect($data_array)->pluck('style')->toArray());
        $orderby_color_string = implode("','",collect($data_array)->pluck('color_code')->toArray());  
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                        ->whereHas('variants', function ( $query ) {
                                            $query->where('visible', '=', 'Yes');
                                    })
                                    ->with('variants')
                                    //->orderByRaw("FIELD(style ,'$orderby_style_string') ASC,FIELD(color_code ,'$orderby_color_string') ASC")
                                    ->get();
            
        $products_array = $styles->filter(function ($value, $key) use ($data_array) {
                $data=[];
                foreach($data_array as $value_array){
                        if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                            $data[] = $value;
                        }
                }
            return $data;
        });

        $products = $products_array->sortBy(function ($item, $key) use ($array) {
            foreach($array as $key=>$array_item){
                $array_item = explode('_',$array_item);
                $style = $array_item[0];
                $color_code = $array_item[1];
                if($item->style == $style && $item->color_code== $color_code){
                    return $key;
                }
            } 
        });
        
        $colour_options = $styles->unique(function ($item){
            return $item['style'].$item['color_code'];
        });

        return view( 'customer.collection_revel_3_breakthrough',compact('colour_options','products'));
       }

       public function christmas_giftguide(){
            $shopher = \App\Models\Product::getProducts_array(['120296_073','120283_059','120307_142','120302_043','120292_177','120305_007']);
            $shophim = \App\Models\Product::getProducts_array(['110307_051','110296_021','110318_142','110314_423','110293_057','110316_466']);
            $gifts100 = \App\Models\Product::getProducts_array(['221202_001', '221227_472','221287_613','221337_540','220981_579','211221_422','211071_001','211212_459','211134_046']);
            $gifts50 = \App\Models\Product::getProducts_array(['7343_001', 'BROXYGEN_211','PRTM0316_167','PRTM0315_167','280413_451','280356_520']);
            $products = '';
            $colour_options ='';
            return view( 'customer.collection_christmas_giftguide',compact('shopher','shophim','gifts100','gifts50','colour_options','products'));
       }
}
