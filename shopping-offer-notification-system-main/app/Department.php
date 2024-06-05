<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {
	protected $fillable = [
		'name', 'image',
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function categories(){
		return $this->hasMany(Category::class);
	}
}
