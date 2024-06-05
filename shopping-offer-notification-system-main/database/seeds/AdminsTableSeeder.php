<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$data = [
			[
				'name' => "Baraka Shop",
				'email' => "barakashop@gmail.com",
				'password' => Hash::make('barakashop@gmail.com'),
				'created_at' => now(),
				'updated_at' => now(),
			],
		];
		DB::table('admins')->insert($data);
	}
}
