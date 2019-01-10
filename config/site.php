<?php

return [
    'SHIPPING_SET_LIMIT' => env('SHIPPING_SET_LIMIT'),
	'SHIPPING_SET_PRICE'=> env('SHIPPING_SET_PRICE'),
	'SHIPPING_NZ_PRICE'=> env('SHIPPING_NZ_PRICE'),
    'notify_email' => env('CLIENT_NOTIFY_EMAIL'),
	'syg_notify_email' => env('SYG_NOTIFY_EMAIL'),
	'image_url'=> [
		'base' => env('BASE_IMAGE_URL'),
		'base_banefit' => env('BASE_MEDIA_BENEFITS_IMAGES_URL'),
		'base_shoe_new' => env('SHOE_PAGE_URL').'pages/',
		'base_shoe_new_exp' => env('SHOE_PAGE_URL').'experience/',
		'base_category_img' => env('SHOE_PAGE_URL').'category/',
		'base_shoe_img_thumb' => env('SHOE_PAGE_URL').'thumbnail-images/',

        'products' => [
			'original' => env('BASE_PRODUCT_IMAGES_URL').'orig/' ,
			'thumbnail' => env('BASE_PRODUCT_IMAGES_URL').'t/',
			'small' => env('BASE_PRODUCT_IMAGES_URL') .'u/',
			'medium' => env('BASE_PRODUCT_IMAGES_URL').'v/',
			'mediumx' => env('BASE_PRODUCT_IMAGES_URL').'x/',
			'large' => env('BASE_PRODUCT_IMAGES_URL') .'y/',
			'zoom' => env('BASE_PRODUCT_IMAGES_URL') .'z/',
        ],
    ],
 	'image_extensions' => [
		'original' => "",
		'thumbnail' => "_t",
		'small' => "_u",
		'medium' => "_v",
		'mediumx' => "_x",
		'large' => "_y",
		'zoom' => "_z",
	],
	'featured_categories' => [
    	['id' => 1, 'name' => 'Featured Skates'],
     	['id' => 109, 'name' => 'Featured Sticks'],
     	['id' => 85, 'name' => 'Featured Gloves'],
	],
];
