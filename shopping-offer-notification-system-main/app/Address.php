<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {
	/**
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'name', 'location', 'phone_number',
	];
}
