<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model {
	protected $fillable = [
		'mac', 'user_id', 'product_id', 'quantity', 'price', 'total_price', 'complete',
	];

	public function product() {
		return $this->belongsTo(Product::class);
	}

	public function images() {
		return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
	}

	public function user() {
		return $this->belongsTo(User::class);
	}
}
