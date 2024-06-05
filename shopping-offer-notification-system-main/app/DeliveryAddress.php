<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model {
	protected $fillable = [
		'user_id', 'first_name', 'last_name', 'phone_number', 'address', 'county_id', 'town_id', 'town', 'default',
	];

	public function county() {
		return $this->belongsTo(County::class);
	}

	public function town() {
		return $this->belongsTo(Town::class);
	}
}
