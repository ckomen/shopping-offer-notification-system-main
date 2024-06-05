<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		$user = auth()->user();
		$address = Address::query()->where('user_id', $user->id)->first();
		return view('home', [
			'user' => $user,
			'address' => $address,
		]);
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function address(Request $request) {
		$address = null;
		if (isset($request->address_id)) {
			$address = Address::query()->where('id', $request->address_id)->first();
		}

		return view('user.address', [
			'address' => $address,
		]);
	}

	/**
	 * @param Request $request
	 * @param $user_id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postAddress(Request $request, $user_id) {
		$address = Address::query()->where('user_id', $user_id)->first();
		if (!$address) {
			Address::query()->create([
				'user_id' => $user_id,
				'name' => $request->name,
				'location' => $request->location,
				'phone_number' => $request->phone_number,
			]);
		} else {
			$address->name = $request->name;
			$address->location = $request->location;
			$address->phone_number = $request->phone_number;
			$address->update();
		}

		toast()->success("Success", "Address added successfully")->autoClose();
		return redirect()->back();
	}


	/**
	 * return the name of a user id
	 * @param int $identifier
	 * @return mixed
	 */
	public static function userData($identifier) {
		$user = User::query()->with('membership')->where('id', $identifier)->orWhere('phone_number', (new PageController())->alignPhoneNumber07($identifier))->first();

		if (!$user) {
			return false;
		}

		$status = 0;
		$time = Carbon::now();

		if ($user) {
			$time = PageController::elapsedTime($user->created_at);
		}

		return (object)[
			"name" => $user->name,
			'phone_number' => $user->phone_number,
			'status' => $status,
			'time' => $time,
			'username' => $user->username,
			'active' => $user->membership ? true : false,
			'source' => $user->source,
		];
	}


	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function logout() {
		auth()->logout();
		Session::flush();
		return redirect()->route('index');
	}
}
