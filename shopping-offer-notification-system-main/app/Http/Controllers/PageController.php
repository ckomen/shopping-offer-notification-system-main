<?php

namespace App\Http\Controllers;


use App\Department;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller {

	public static $highlightType = ["Trending", "New Arrivals", "Hot Deal", "Best Seller", "Amazing", "Just Arrived", "Discounted", "Time To Buy"];
	public static $minimumPrices = ["50", "75", "40", "150", "200", "15", "300", "50", "35", "20", "90"];

	/**
	 * @param $raw_phone_number
	 * @param bool $format_07
	 * @return string
	 */
	public static function alignPhoneNumber($raw_phone_number, $format_07 = true) {
		$prefix = $format_07 ? "0" : "254";
		$phoneNumber = $raw_phone_number;

		if (strlen($raw_phone_number) == 10) {
			$phoneNumber = ltrim($raw_phone_number, '0');
		}
		if (strlen($raw_phone_number) == 12) {
			$phoneNumber = ltrim($raw_phone_number, '254');
		}
		if (strlen($raw_phone_number) == 13) {
			$phoneNumber = ltrim($raw_phone_number, '+254');
		}
		return $prefix . $phoneNumber;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function index() {
		$departments = Department::query()
//			->inRandomOrder('id')
			->with('categories')
			->get();
		return view('welcome', [
			'departments' => $departments,
		]);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function adminLogin() {
		return view('auth.admin_login');
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function postAdminLogin(Request $request) {
		$credentials = [
			'email' => $request->email,
			'password' => $request->password,
		];

		if (!auth("admin")->attempt($credentials)) {
			return redirect()->back()->with('error', "Wrong credentials");
		}
		return redirect()->route('admin.home');
	}


	/**
	 * returns the elapsed time
	 * @param $expires_at
	 * @return false|string
	 */
	public static function elapsedTime($expires_at) {
		$date = Carbon::parse($expires_at);
		$now = Carbon::now();
		$days = $date->diffInDays($now);
		$hours = $date->diffInHours($now);

		if ($hours > 12) {
			return date("d M Y - h:i a ", strtotime($date));
		}
		return Carbon::parse($date)->diffForHumans();
	}


	/**
	 * @param $department_id
	 * @return mixed
	 */
	public static function getProductsFromCategories($department_id) {
		return Product::query()
			->where("department_id", $department_id)
			->with("department", "category", "subCategory", "images")
			->get()
			->take(6);
	}

	/**
	 * @param $discount
	 * @param $price
	 * @return float|int
	 */
	public static function calculateOriginalPrice($discount, $price) {
		return 100 * $price / (100 - $discount);
	}
}
