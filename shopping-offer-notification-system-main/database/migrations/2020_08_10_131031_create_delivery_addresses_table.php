<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryAddressesTable extends Migration {
	/**
	 * Run the migrations.
	 *'', '', '', '','',''
	 * @return void
	 */
	public function up() {
		Schema::create('delivery_addresses', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('phone_number');
			$table->text('address');
			$table->integer('county_id');
			$table->integer('town_id')->nullable();
			$table->string('town')->nullable();
			$table->boolean('default')->default(false);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('delivery_addresses');
	}
}
