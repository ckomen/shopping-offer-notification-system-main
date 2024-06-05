<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartContents;
use App\Category;
use App\County;
use App\DeliveryAddress;
use App\Department;
use App\Notif;
use App\Product;
use App\ProductImage;
use App\Sales;
use App\SubCategory;
use App\Town;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth:admin');
	}


	/**
	 * @return string
	 */
	public function index() {
		$user = auth()->user();
		return view('admin.home',[
			'user'=>$user,
			'data' => json_decode($this->statistics()),
		]);
	}


	/**
	 * @return object
	 */
	public function statistics()
	{
		$sales = Sales::query()->get();
		$products = Product::query()->get();
		$cart_contents = CartContents::query()->get();
		$carts = Cart::query()->get();

		$sold_amount = $sales->where('complete', true)->sum('total_price') + $cart_contents->where('complete', true)->sum('total_price');
		$sold_products = $sales->where('complete', true)->sum('quantity') + $cart_contents->where('complete', true)->sum('quantity');
		$open_carts = Cart::query()->where('complete', false)->count();

		$sold_orders = $carts->where('complete', true)->count();
		$unpaid_orders = $carts->where('complete', false)->count();

		$dispatch = $carts->where('complete', true)->where('delivered', false)->where('dispatched', false)->count();
		$ready_for_pickup = $carts->where('complete', true)->where('delivered', false)->count();
		$delivered = $carts->where('delivered', true)->count();

		$data = [
			'sales' => [
				'sold_amount' => $sold_amount,
				'sold_products' => $sold_products,
				'open_carts' => $open_carts,
			],
			'products' => [
				'all' => $products->count(),
			],
			'orders' => [
				'sold' => $sold_orders,
				'unpaid' => $unpaid_orders,
				'dispatch' => $dispatch,
				'ready_for_pickup' => $ready_for_pickup,
				'delivered' => $delivered,
			],
		];
		return json_encode($data);
	}




	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getDepartment()
	{
		$department = Department::query()->orderByDesc('created_at')->get();
		return view('admin.product.department', [
			'departments' => $department,
		]);
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postDepartment(Request $request)
	{
		Department::query()->create([
			'name' => $request->name,
		]);

		alert()->success("Success",'Department added successfully!');
		return redirect()->back();
	}

	/**
	 * @param string $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function deleteDepartment($id)
	{
		Department::query()->where('id', decrypt($id))->first()->delete();
		alert()->success("Success",'Department DELETED successfully!');
		return redirect()->back();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getAddProduct()
	{
		$subCategories = SubCategory::query()->orderBy('name', 'asc')->get();
		return view('admin.product.add_product', [
			'subCategories' => $subCategories,
		]);
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postAddProduct(Request $request)
	{
		$subCategory = SubCategory::query()->find($request->sub_category_id)->with('category', 'category.department')->first();
		$commission = $request->commission / 100;

		$product = Product::query()->create([
			'department_id' => $subCategory->category->department->id,
			'category_id' => $subCategory->category->id,
			'sub_category_id' => $subCategory->id,
			'name' => $request->name,
			'total' => $request->total,
			'price' => $request->price,
			'commission' => $commission,
			'sold' => $request->sold,
			'display' => true,
			'short_description' => $request->short_description,
			'description' => $request->description,
		]);

		//update SKU
		$sku = $subCategory->category->department->id . '_' . $subCategory->category->id . "_" . $subCategory->id . "_" . $product->id;
		$product->update([
			'sku' => $sku,
		]);

		alert()->success('Success',"$product->name added successfully. Kindly add some pictures to the product!")->persistent('okay');
		return redirect()->route('admin.add.products.images', ['id' => $product->id]);
	}


	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getCategory()
	{
		$categories = Category::query()->orderByDesc('created_at')->with('department')->get();
		$departments = Department::query()->orderByDesc('created_at')->get();
		return view('admin.product.categories', [
			'categories' => $categories,
			'departments' => $departments,
		]);
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postCategory(Request $request)
	{
		Category::query()->create([
			'department_id' => $request->department_id,
			'name' => $request->name,
		]);

		alert()->success("Success",'Category added successfully!');
		return redirect()->back();
	}

	/**
	 * @param string $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function deleteCategory($id)
	{
		Category::query()->where('id', decrypt($id))->first()->delete();
		alert()->success("Success",'Category DELETED successfully!');
		return redirect()->back();
	}


	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getSubCategory()
	{
		$categories = Category::query()->orderByDesc('created_at')->get();
		$subCategories = SubCategory::query()->orderByDesc('created_at')->with('category')->get();
		return view('admin.product.sub_categories', [
			'categories' => $categories,
			'subCategories' => $subCategories,
		]);
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postSubCategory(Request $request)
	{
		$category = Category::query()->with('department')->find($request->category_id);
		SubCategory::query()->create([
			'department_id' => $category->department->id,
			'category_id' => $request->category_id,
			'name' => $request->name,
		]);

		alert()->success("Success",'Sub-Category added successfully!');
		return redirect()->back();
	}

	/**
	 * @param string $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function deleteSubCategory($id)
	{
		$subCategory = SubCategory::query()->where('id', decrypt($id))->first();
		$subCategory->delete();
		alert()->success("Success",'Sub category DELETED successfully!');
		return redirect()->back();
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postEditProduct(Request $request)
	{
		$subCategory = SubCategory::query()->find($request->sub_category_id)->with('category', 'category.department')->first();
		$commission = $request->commission / 100;

		//update SKU
		$sku = $subCategory->category->department->id . '_' . $subCategory->category->id . "_" . $subCategory->id . "_" . $request->product_id;

		$product = Product::query()->find($request->product_id)->update([
			'department_id' => $subCategory->category->department->id,
			'category_id' => $subCategory->category->id,
			'sub_category_id' => $subCategory->id,
			'name' => $request->name,
			'total' => $request->total,
			'price' => $request->price,
			'commission' => $commission,
			'sold' => $request->sold,
			'display' => true,
			'sku' => $sku,
			'short_description' => $request->short_description,
			'description' => $request->description,
		]);

		alert()->success("Success","$request->name EDITTED successfully. Kindly add some pictures to the product!")->persistent('okay');
		return redirect()->route('admin.view.products');
	}

	/**
	 * @param int $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getProductImages($id)
	{
		$product = Product::query()->with('images')->find($id);
		return view('admin.product.product_image', [
			'product' => $product,
		]);
	}


	/**
	 * @param string $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getEditProducts($id)
	{
		$product = Product::query()->with('images', 'subCategory')->find(decrypt($id));
		$subCategories = SubCategory::query()->get();
		return view('admin.product.edit_product', [
			'product' => $product,
			'subCategories' => $subCategories,
		]);
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function uploadImages(Request $request)
	{
		try {
			$file = $request->file('image');

			$fileType = $file->getMimeType();
			if (explode('/', $fileType)['0'] !== 'image') {
				\alert()->error("Wrong Format!","Wrong file format. Please use png,jpg,jpeg,gif,ico formats alone.")->persistent('Okay');
				return redirect()->back();
			}

			//upload file
			$this->validate($request, [
				'image' => 'mimes:png,jpg,jpeg,gif,ico',
			]);

			//Display File Name
			$fileName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
			$fileExtension = $file->getClientOriginalExtension();
			$fileRealPath = $file->getRealPath();
			$fileSize = $file->getSize();
			$fileType = $file->getMimeType();
			$fileToStore = 'images/e-commerce/' . Str::slug($fileName) . '-' . time() . '.' . $fileExtension;


			//Move Uploaded File
			$file->move(public_path('images/e-commerce/'), Str::slug($fileName) . '-' . time() . '.' . $fileExtension);

			ProductImage::query()->create([
				'product_id' => $request->product_id,
				'image' => $fileToStore,
			]);

			\alert()->success("Success",'Image added successfully');
			return redirect()->back();
		} catch (\Exception $exception) {
			\alert()->error('An error occurred!',"Error occurred -> " . $exception->getMessage());
			return redirect()->back();
		}
	}

	/**
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function deleteImage($id)
	{
		$image = ProductImage::query()->find($id);
		$image->delete();
		try {
			unlink($image->image);
		} catch (\Exception $exception) {
		};

		\alert()->success("Success",'Image DELETED successfully');
		return redirect()->back();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function viewProducts()
	{
		$products = Product::query()->orderByDesc('created_at')->paginate(16);
		return view('admin.product.products', [
			'products' => $products,
		]);
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function searchProducts(Request $request)
	{
		return view('admin.product.search_products_results', [
			'products' => (new PageController())->searchProducts($request->identifier),
		]);
	}

	/**
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function deleteProduct($id)
	{
		$product = Product::query()->with('images')->find($id);

		foreach ($product->images()->get() as $image) {
			if (file_exists($image->image)) {
				unlink($image->image);
			}
			$image->delete();
		}

		$product->delete();

		\alert()->success("$product->name DELETED successfully", 'Success');
		return redirect()->route('admin.view.products');
	}

	/**
	 * @param string $period
	 * @param string $source
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function sales_items_records( $period,  $source)
	{

		//browse distinct records
		$status = null;
		if ($source == 'Sales Records') {
			$transactions = Cart::query()->where('complete', true)->orderByDesc('created_at')->orderByDesc('complete')->with('user', 'cartContents', 'cartContents.images', 'cartContents.product', 'user.addresses');
		}

		if ($source == 'Unpaid Orders Records') {
			$transactions = Cart::query()->where('complete', false)->orderByDesc('created_at')->orderByDesc('complete')->with('user', 'cartContents', 'cartContents.images', 'cartContents.product', 'user.addresses');
		}

		if ($source == 'Package Orders to be Delivered') {
			$transactions = Cart::query()->where('complete', true)->where('delivered', false)->where('dispatched', false)->with('user', 'cartContents', 'cartContents.images', 'cartContents.product', 'user.addresses');
		}

		if ($source == 'Ready For Pick-up') {
			$transactions = Cart::query()->where('complete', true)->where('delivered', false)->where('dispatched', true)->with('user', 'cartContents', 'cartContents.images', 'cartContents.product', 'user.addresses');
		}

		if ($source == 'Delivered') {
			$transactions = Cart::query()->where('complete', true)->where('delivered', true)->where('dispatched', true)->with('user', 'cartContents', 'cartContents.images', 'cartContents.product', 'user.addresses');
		}


		//sort by dates
		if ($period != 'all') {
			$transactions = $transactions->where('created_at', 'like', "%$period%");
		}
		return \view('admin.records.purchase_records', [
			'transactions' => $transactions->paginate(100),
			'source' => $source,
			'period' => $period,
		]);
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function sortSales(Request $request)
	{
		return $this->sales_items_records($request->period, $request->source);
	}



	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function addressesCounty()
	{
		$counties = County::query()->orderByDesc('created_at')->get();
		return view('admin.addresses.county', [
			'counties' => $counties,
		]);
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postAddressesCounty(Request $request)
	{
		County::query()->create([
			'name' => $request->name,
		]);
		alert()->success("Success",'County added successfully');
		return redirect()->back();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function addressesTown()
	{
		$counties = County::query()->orderByDesc('created_at')->get();
		$towns = Town::query()->orderByDesc('created_at')->get();
		return view('admin.addresses.town', [
			'counties' => $counties,
			'towns' => $towns,
		]);
	}


	/**
	 * @param string $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function addressesCountyDelete($id)
	{
		$county = County::query()->find(decrypt($id));
		Town::query()->where('county_id', $county->id)->delete();
		DeliveryAddress::query()->where('county_id', $county->id)->delete();
		$county->delete();
		alert()->success("Success",'County deleted successfully');
		return redirect()->back();
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postAddressesTown(Request $request)
	{
		Town::query()->create([
			'name' => $request->name,
			'county_id' => $request->county_id,
		]);
		alert()->success("Success",'Town added successfully');
		return redirect()->back();
	}



	/**
	 * @param string $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function addressesTownDelete($id)
	{
		Town::query()->find(decrypt($id))->delete();
		DeliveryAddress::query()->where('town_id', decrypt($id))->delete();
		alert()->success("Success",'Town deleted successfully');
		return redirect()->back();
	}


	/**
	 * @param string $field
	 * @param int $status
	 * @param int $cartID
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function changeOrderStatus($field, $status, $cartID)
	{
		$cart = Cart::query()->find($cartID);
		if ($field == 'dispatched') {
			$cart->dispatched = $status;
			$cart->packaged = $status;
			$cart->update();
			return redirect()->back();
		}

		if ($field == 'delivered') {
			$cart->delivered = $status;
			$cart->update();
			return redirect()->back();
		}
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\RedirectResponse|null|object
	 */
	public function postViewUser(Request $request)
	{
		$user = User::query()
			->where('phone_number', $request->identifier)
			->orWhere('username', $request->identifier)
			->first();
		if (!$user) {
			alert()->error('No User Found!','The user does not exist')->persistent('Okay');
			return redirect()->back();
		}

		return $this->userSearchResults($user->id);
	}

	/**
	 * @param int $user_id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function userSearchResults($user_id)
	{
		$user = User::query()->find($user_id);
	}





	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function allNotifs()
	{
		$all = Notif::query()->where('user_id', 0)->paginate(100);
		return view('admin.notifs.all', [
			'allNotifs' => $all,
		]);
	}

	/**
	 * Show the user notifications created by the system as notifications.
	 * Shows only the auth user notifs.F
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showUserInbox()
	{
		// Get all the unread notifications
		$unreadNotifs = Notif::query()->where('user_id', 0)->where('read', false)->get();

		// Get count of all the user notifs
		$allNotifs = Notif::query()->where('user_id', 0)->count();

		return view('admin.notifs.notifs', [
			'unreadNotifs' => $unreadNotifs,
			'allNotifs' => $allNotifs,
		]);
	}

	/**
	 * Fetch a notif to be read.
	 * Gets only the auth user notifs
	 * @param string $id
	 * @return string
	 */
	public function readNotif($id)
	{
		$notif = Notif::query()->find($id);
		$notif->read = true;
		$notif->update();
		return view('admin.notifs.read', [
			'notif' => $notif,
		]);
	}

}
