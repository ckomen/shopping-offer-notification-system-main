<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		$department = [
			[
				'name' => "Groceries",
				'image' => 'images/categories/groceries.png',
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'name' => "Electronics",
				'image' => 'images/categories/electronics.png',
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'name' => "Fashion & Beauty",
				'image' => 'images/categories/fashion_and_beauty.png',
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'name' => "Baby Products",
				'image' => 'images/categories/baby_products.png',
				'created_at' => now(),
				'updated_at' => now(),
			],
		];
		DB::table('departments')->insert($department);

		$categories = [
			[
				'department_id' => 1,
				'name' => "Fruits",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 1,
				'name' => "Vegetables",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 1,
				'name' => "Flour",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 2,
				'name' => "Smartphones",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 2,
				'name' => "TV",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 2,
				'name' => "Computer",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 3,
				'name' => "Hair Beauty",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 3,
				'name' => "Make Up",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 3,
				'name' => "Skincare",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 3,
				'name' => "Clothes",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 3,
				'name' => "Shoes",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 3,
				'name' => "Accessories",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 4,
				'name' => "Diapers",
				'created_at' => now(),
				'updated_at' => now(),
			],
		];
		DB::table('categories')->insert($categories);

		$subCategories = [
			[
				'department_id' => 1,
				'category_id' => 1,
				'name' => "Mangoes",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 1,
				'category_id' => 1,
				'name' => "Oranges",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 2,
				'category_id' => 4,
				'name' => "Techno",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 2,
				'category_id' => 4,
				'name' => "Sumsang",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 3,
				'category_id' => 10,
				'name' => "Long Pants",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 4,
				'category_id' => 10,
				'name' => "Hair Care",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 3,
				'category_id' => 10,
				'name' => "Tshirts",
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'department_id' => 4,
				'category_id' => 13,
				'name' => "Sosoft",
				'created_at' => now(),
				'updated_at' => now(),
			],
		];
		DB::table('sub_categories')->insert($subCategories);
	}
}
