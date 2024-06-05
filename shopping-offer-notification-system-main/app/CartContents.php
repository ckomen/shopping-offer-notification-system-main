<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartContents extends Model {
	//
	protected $fillable = [
		'cart_id', 'product_id', 'quantity', 'price', 'total_price', 'complete',
	];

	public function cart() {
		return $this->belongsTo(Cart::class);
	}

	public function product() {
		return $this->belongsTo(Product::class);
	}

	public function images() {
		return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
	}
}
