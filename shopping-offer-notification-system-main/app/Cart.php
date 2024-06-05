<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
	protected $fillable = [
		'user_id', 'delivery_address_id', 'complete', 'emailed', 'reminder_email', 'next_alert', 'packaged', 'dispatched', 'total_price', 'delivered', 'paid_on',
	];

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function cartContents() {
		return $this->hasMany(CartContents::class);
	}

	public function address() {
		return $this->hasOne(DeliveryAddress::class);
	}
}
