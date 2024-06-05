<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model {
	protected $fillable = [
		'department_id', 'category_id', 'name',
	];

	public function category() {
		return $this->belongsTo(Category::class);
	}
}
