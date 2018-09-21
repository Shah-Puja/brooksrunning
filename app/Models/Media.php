<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
	protected const VALID_SIZES = ['original', 'thumbnail', 'small', 'medium', 'large', 'zoom'];

    public function __call($method, $arguments) {
    	$explodedMethodName = explode( "-", kebab_case($method) );
		if ( count($explodedMethodName) == 2 && in_array($explodedMethodName[1], self::VALID_SIZES) ) {
			if ( isset($this->{$explodedMethodName[0]}) ) {
				return $this->handleImageRequest($explodedMethodName[0], $explodedMethodName[1]);
			}
			return null;
		}
    	return parent::__call($method, $arguments);
    }

    public static function addImagePathsForProducts($products)
    {
		return $products->each(function($option) {
				for ($num=1; $num < 7; $num++) {
					$option->{"image" . $num} = $option->media->{"image" . $num . "Original"}();
					$option->{"image" . $num . "thumbnail"} = $option->media->{"image" . $num . "Thumbnail"}();
				}
			});	
    }

    private function handleImageRequest($image, $size)
    {
		$fullImageName = $this->{$image};
		$imageName = substr( $fullImageName, 0, strrpos($fullImageName, ".") );
		$imageExtension = substr( $fullImageName, strrpos($fullImageName, ".") );
		return config('site.image_url.products.' . $size) . 
				$imageName . 
				config('site.image_extensions.' . $size) .
				$imageExtension;
    }
}
