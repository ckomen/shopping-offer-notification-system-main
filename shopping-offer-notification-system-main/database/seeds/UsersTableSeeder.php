<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$data = [
			[
				'name' => "Simon Njenga",
				'username' => "simonNjenga",
				'email' => "makuno.biz@gmail.com",
				'password' => Hash::make('makuno.biz@gmail.com'),
				'created_at' => now(),
				'updated_at' => now(),
			],
		];
		DB::table('users')->insert($data);
	}
}
