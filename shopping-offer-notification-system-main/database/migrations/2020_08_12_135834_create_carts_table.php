<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('carts', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('delivery_address_id')->nullable();
			$table->float('total_price')->nullable();
			$table->boolean('complete')->default(false);
			$table->boolean('emailed')->default(false);
			$table->boolean('reminder_email')->default(false);
			$table->boolean('packaged')->default(false);
			$table->boolean('dispatched')->default(false);
			$table->boolean('delivered')->default(false);
			$table->dateTime('next_alert')->nullable();
			$table->dateTime('paid_on')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('carts');
	}
}
