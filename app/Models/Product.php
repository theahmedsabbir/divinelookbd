<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\RatingWishlist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
    	return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function brand(){
    	return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function images(){
    	return $this->hasMany(ProductImage::class);
    }

    public function wishlist(){
        return $this->hasMany(RatingWishlist::class, 'product_id')
                    ->where('type', 'wishlist');
    }

    public function getColorIdsAttribute()
    {
        return json_decode($this->colors);
    }
}
