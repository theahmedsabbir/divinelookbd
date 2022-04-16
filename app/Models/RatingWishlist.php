<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingWishlist extends Model
{
    use HasFactory;
    public function product(){
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
