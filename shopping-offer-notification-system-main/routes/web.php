<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('admin/login', [PageController::class, 'adminLogin'])->name('admin.login');
Route::post('post/admin/login', [PageController::class, 'postAdminLogin'])->name('post.admin.login');
Route::get('c/logout', [HomeController::class, 'logout'])->name('c.logout');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group([
	'as' => 'user.',
], function () {
	Route::get('/address', [HomeController::class, 'address'])->name('address');
	Route::post('post/address/{user_id}', [HomeController::class, 'postAddress'])->name('post.address');
});

Route::group([
	'prefix' => 'admin',
	'as' => 'admin.',
], function () {
	Route::get('/home', [AdminController::class, 'index'])->name('home');
	Route::get('/departments', [AdminController::class,'getDepartment'])->name('department');
	Route::post('/departments', [AdminController::class,'postDepartment'])->name('post.department');
	Route::get('/departments/delete/{id}', [AdminController::class,'deleteDepartment'])->name('department.delete');

	Route::get('/categories', [AdminController::class,'getCategory'])->name('categories');
	Route::post('/categories', [AdminController::class,'postCategory'])->name('post.categories');
	Route::get('/categories/delete/{id}', [AdminController::class,'deleteCategory'])->name('categories.delete');

	Route::get('/sub-category', [AdminController::class,'getSubCategory'])->name('sub.categories');
	Route::post('/sub-category', [AdminController::class,'postSubCategory'])->name('post.sub.categories');
	Route::get('/sub-category/delete/{id}', [AdminController::class,'deleteSubCategory'])->name('sub-category.delete');

	Route::get('/add/product', [AdminController::class,"getAddProduct"])->name('add.products');
	Route::post('/add/product', [AdminController::class,"postAddProduct"])->name('post.add.products');
	Route::post('/edit/products', [AdminController::class,"postEditProduct"])->name('edit.products');
	Route::get('/add/product/images/{id}', [AdminController::class,"getProductImages"])->name('add.products.images');
	Route::get('/add/product/edit/{id}', [AdminController::class,"getEditProducts"])->name('add.products.edit');
	Route::post('/upload/product/images', [AdminController::class,"uploadImages"])->name('upload.images');
	Route::get('/product/image/delete/{id}', [AdminController::class,"deleteImage"])->name('delete.image');
	Route::get('/view/products', [AdminController::class,"viewProducts"])->name('view.products');
	Route::get('/search/products', [AdminController::class,"searchProducts"])->name('search.products');
	Route::get('/product/delete/{id}', [AdminController::class,"deleteProduct"])->name('delete.product');
	Route::get('/product/sales/records/{period}/{source}', [AdminController::class,"sales_items_records"])->name('sold.records');
	Route::post('/post/sort/sold/product/records/', [AdminController::class,"sortSales"])->name('sort.sales');

	//addresses
	Route::get('/address/county', [AdminController::class,"addressesCounty"])->name('add.county');
	Route::get('/address/county/delete/{id}', [AdminController::class,"addressesCountyDelete"])->name('delete.county');
	Route::post('/address/county', [AdminController::class,"postAddressesCounty"])->name('post.add.county');

	Route::get('/address/town', [AdminController::class,"addressesTown"])->name('add.town');
	Route::get('/address/town/delete/{id}', [AdminController::class,"addressesTownDelete"])->name('delete.town');
	Route::post('/address/town', [AdminController::class,"postAddressesTown"])->name('post.add.town');

	Route::get('/order/change/status/{field}/{status}/{cartID}', [AdminController::class,"changeOrderStatus"])->name('change.order.status');

	Route::get('view/user/results', [AdminController::class,"postViewUser"])->name('view.user.results');


	Route::group([
		'prefix' => 'notifs',
		'as' => 'notifs.',
	], function () {
		// Unread notifs route
		Route::get('/', [AdminController::class,"showUserInbox"])->name('show');


		// Read a particular notif
		Route::get('/read/{id}', [AdminController::class,"readNotif"])->name('read');

		// Read a particular notif
		Route::get('all', [AdminController::class,"allNotifs"])->name('all');
	});
});
