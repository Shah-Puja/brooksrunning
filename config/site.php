<?php

return [
	'freight_cost' => env('CLIENT_FREIGHT_COST', 0),
	'image_url'=> [
        'base' => env('BASE_IMAGE_URL'),
        'products' => [
			'original' => env('BASE_PRODUCT_IMAGES_URL') ,
			'thumbnail' => env('BASE_PRODUCT_IMAGES_URL'),
			'small' => env('BASE_PRODUCT_IMAGES_URL') ,
			'medium' => env('BASE_PRODUCT_IMAGES_URL') ,
			'large' => env('BASE_PRODUCT_IMAGES_URL') ,
			'zoom' => env('BASE_PRODUCT_IMAGES_URL') ,
        ],
    ],
 	'image_extensions' => [
		'original' => "_LG",
		'thumbnail' => "_SM",
		'small' => "",
		'medium' => "",
		'large' => "_LG",
		'zoom' => "",
	],
	'featured_categories' => [
    	['id' => 1, 'name' => 'Featured Skates'],
     	['id' => 109, 'name' => 'Featured Sticks'],
     	['id' => 85, 'name' => 'Featured Gloves'],
	],
];