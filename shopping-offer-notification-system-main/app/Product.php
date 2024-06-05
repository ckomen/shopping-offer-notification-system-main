<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $fillable = [
		'department_id', 'category_id', 'sub_category_id', 'name', 'sku', 'price', 'commission', 'discount', 'total', 'sold', 'display', 'short_description', 'description',
	];

	public function department() {
		return $this->belongsTo(Department::class);
	}

	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function subCategory() {
		return $this->belongsTo(SubCategory::class);
	}

	public function images() {
		return $this->hasMany(ProductImage::class);
	}
}
