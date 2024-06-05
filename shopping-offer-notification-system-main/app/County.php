<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model {
	protected $fillable = [
		'name',
	];

	public function town() {
		return $this->hasMany(Town::class);
	}
}
