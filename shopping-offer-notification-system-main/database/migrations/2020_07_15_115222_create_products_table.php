<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('department_id');
			$table->integer('category_id');
			$table->integer('sub_category_id');
			$table->string('name');
			$table->float('price');
			$table->float('total');
			$table->float('sold')->default(0);
			$table->float('commission')->default(3);
			$table->float('discount')->default(10);
			$table->string('sku')->nullable();
			$table->text('short_description')->nullable();
			$table->longText('description')->nullable();
			$table->boolean('display')->default(false);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('products');
	}
}
