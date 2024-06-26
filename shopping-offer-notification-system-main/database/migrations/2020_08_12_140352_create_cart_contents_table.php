<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartContentsTable extends Migration {
	/**
	 * Run the migrations.
	 *'', '', '', '', '', 'complete',
	 * @return void
	 */
	public function up() {
		Schema::create('cart_contents', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('cart_id');
			$table->integer('product_id');
			$table->integer('quantity');
			$table->float('price');
			$table->float('total_price');
			$table->boolean('complete')->default(false);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('cart_contents');
	}
}
