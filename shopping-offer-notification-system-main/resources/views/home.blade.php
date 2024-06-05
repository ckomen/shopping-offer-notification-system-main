@extends('layouts.dashboard')

@section('title')
	My Account
@endsection
@section('content')
	<div class="tab-pane active" id="dashboard">
		<p class="mb-0">
			Hello <span class="font-weight-bold text-secondary">{{ $user->name }}</span>
		</p>
		<p class="">
			From your account dashboard you can view your
			<a href="#orders" class="link-to-tab text-primary">recent orders</a>, manage your <a
					href="#address" class="link-to-tab text-primary"> shipping and billing
				addresses</a>, and <a href="#account" class="link-to-tab text-primary">edit your
				password and account details</a>.
		</p>
		<div class="row cols-lg-3 cols-xs-2 cols-1 nav">
			<div class="ib-wrapper mb-4">
				<div class="icon-box text-center ib-border"><a href="#orders">
                                                <span class="icon-box-icon">
                                                    <i class="p-icon-orders"></i>
                                                </span>
						<div class="icon-box-content">
							<p>ORDERS</p>
						</div>
					</a>
				</div>
			</div>
			<div class="ib-wrapper mb-4">
				<div class="icon-box text-center ib-border">
					<a href="#shopping_list">
						<span class="icon-box-icon">
							<i class="p-icon-cart"></i>
						</span>
						<div class="icon-box-content">
							<p>SHOPPING LIST</p>
						</div>
					</a>
				</div>
			</div>
			<div class="ib-wrapper mb-4">
				<div class="icon-box text-center ib-border">
					<a href="#address">
						<span class="icon-box-icon">
							<i class="p-icon-map"></i>
						</span>
						<div class="icon-box-content">
							<p>ADDRESSES</p>
						</div>
					</a>
				</div>
			</div>
			<div class="ib-wrapper mb-4">
				<div class="icon-box text-center ib-border">
					<a href="#account">
						<span class="icon-box-icon">
							<i class="p-icon-user-solid"></i>
						</span>
						<div class="icon-box-content">
							<p>ACCOUNT DETAILS</p>
						</div>
					</a>
				</div>
			</div>
			<div class="ib-wrapper mb-4">
				<div class="icon-box text-center ib-border">
					<a href="{{ route('c.logout') }}" class="no-tab-item">
						<span class="icon-box-icon">
							<i class="p-icon-logout"></i>
						</span>
						<div class="icon-box-content">
							<p>LOGOUT</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="orders">
		<table class="order-table">
			<thead>
			<tr>
				<th>Order</th>
				<th>Date</th>
				<th>Status</th>
				<th>Total</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td class="order-number"><a href="#">#3596</a></td>
				<td class="order-date"><span>September 23, 2021</span></td>
				<td class="order-status"><span>On hold</span></td>
				<td class="order-total"><span>$147.00 for 4 items</span></td>
				<td class="order-action"><a href="#orders-view"
				                            class="btn btn-secondary btn-outline btn-block btn-rounded btn-sm">View</a>
				</td>
			</tr>
			<tr>
				<td class="order-number"><a href="#">#3593</a></td>
				<td class="order-date"><span>February 21, 2021</span></td>
				<td class="order-status"><span>On hold</span></td>
				<td class="order-total"><span>$290.00 for 2 items</span></td>
				<td class="order-action"><a href="#orders-view"
				                            class="btn btn-secondary btn-outline btn-block btn-rounded btn-sm">View</a>
				</td>
			</tr>
			<tr>
				<td class="order-number"><a href="#">#2547</a></td>
				<td class="order-date"><span>January 4, 2021</span></td>
				<td class="order-status"><span>On hold</span></td>
				<td class="order-total"><span>$480.00 for 8 items</span></td>
				<td class="order-action"><a href="#orders-view"
				                            class="btn btn-secondary btn-outline btn-block btn-rounded btn-sm">View</a>
				</td>
			</tr>
			<tr>
				<td class="order-number"><a href="#">#2549</a></td>
				<td class="order-date"><span>January 19, 2021</span></td>
				<td class="order-status"><span>On hold</span></td>
				<td class="order-total"><span>$680.00 for 5 items</span></td>
				<td class="order-action"><a href="#orders-view"
				                            class="btn btn-secondary btn-outline btn-block btn-rounded btn-sm">View</a>
				</td>
			</tr>
			<tr>
				<td class="order-number"><a href="#">#4523</a></td>
				<td class="order-date"><span>Jun 6, 2021</span></td>
				<td class="order-status"><span>On hold</span></td>
				<td class="order-total"><span>$564.00 for 3 items</span></td>
				<td class="order-action"><a href="#orders-view"
				                            class="btn btn-secondary btn-outline btn-block btn-rounded btn-sm">View</a>
				</td>
			</tr>
			<tr>
				<td class="order-number"><a href="#">#4526</a></td>
				<td class="order-date"><span>Jun 19, 2021</span></td>
				<td class="order-status"><span>On hold</span></td>
				<td class="order-total"><span>$123.00 for 8 items</span></td>
				<td class="order-action"><a href="#orders-view"
				                            class="btn btn-secondary btn-outline btn-block btn-rounded btn-sm">View</a>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
	<div class="tab-pane order" id="orders-view">
		<h2 class="title text-left pb-1">Order Details</h2>
		<div class="order-details">
			<table class="order-details-table">
				<thead>
				<tr class="summary-subtotal">
					<td>
						<h3 class="summary-subtitle">Your Order</h3>
					</td>
					<td></td>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td class="product-subtitle">Product</td>
					<td></td>
				</tr>
				<tr>
					<td class="product-name">Juice <span><i class="p-icon-times"></i>
                                                        1</span></td>
					<td class="product-price">$129.99</td>
				</tr>
				<tr>
					<td class="product-name">Greenhouse Cherry <span><i
									class="p-icon-times"></i>
                                                        2</span></td>
					<td class="product-price">$98.00</td>
				</tr>
				<tr class="summary-subtotal">
					<td>
						<h4 class="summary-subtitle">Subtotal:</h4>
					</td>
					<td class="summary-value font-weight-normal">$325.99</td>
				</tr>
				<tr class="summary-subtotal">
					<td>
						<h4 class="summary-subtitle">Payment method:</h4>
					</td>
					<td class="summary-value">Cash on delivery</td>
				</tr>
				<tr class="summary-subtotal">
					<td>
						<h4 class="summary-subtitle">Total:</h4>
					</td>
					<td>
						<p class="summary-total-price">$325.99</p>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<div class="row mt-9">
			<div class="col-sm-6">
				<div class="card card-address">
					<div class="card-body">
						<h5 class="card-title lh-2 mb-2">Billing Address</h5>
						<p>John Doe<br>
							Panda Company<br>
							Steven street<br>
							El Carjon, CA 92020
						</p>
						<p>nicework125@gmail.com</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card card-address">
					<div class="card-body">
						<h5 class="card-title lh-2 mb-2">Shipping Address</h5>
						<p>You have not set up this type of address yet.</p>
					</div>
				</div>
			</div>
		</div>

		<hr class="mt-0 mb-6">
		<a href="#orders" class="btn btn-dark btn-sm back-order"><i
					class="p-icon-arrow-long-left ml-0 mr-1"></i>Back to list</a>
	</div>
	<div class="tab-pane" id="shopping_list">
		<div class="">
			<h2 class="mb-5">My Shopping List</h2>
			<table class="shop-table wishlist-table mt-7 mb-3">
				<thead>
				<tr>
					<th><span>Product</span></th>
					<th></th>
					<th class="product-price"><span>Price</span></th>
					<th class="product-stock-status"><span>Stock status</span></th>
					<th class="product-add-to-cart">Actions</th>
					<th class="product-remove"></th>
				</tr>
				</thead>
				<tbody class="wishlist-items-wrapper">
				<tr>
					<td class="product-thumbnail">
						<a href="product-simple.html">
							<figure>
								<img src="images/subpage/wishlist/1.jpg" width="100" height="125"
								     alt="product">
							</figure>
						</a>
					</td>
					<td class="product-name">
						<a href="product-simple.html">Chocolate Cake</a>
					</td>
					<td class="product-price">
						<span class="amount">$84.00</span>
					</td>
					<td class="product-stock-status">
						<span class="wishlist-in-stock">In Stock</span>
					</td>
					<td class="product-add-to-cart">
						<a href="#" class="btn-product btn-quickview btn btn-dim btn-outline mr-1">QUICK
							VIEW</a>
						<a href="#" class="btn-product btn-cart btn btn-dim">ADD TO CART</a>
					</td>
					<td class="product-remove">
						<div>
							<a href="#" class="btn-remove" title="Remove this product"><i
										class="p-icon-times"></i></a>
						</div>
					</td>
				</tr>
				<tr>
					<td class="product-thumbnail">
						<a href="product-simple.html">
							<figure>
								<img src="images/subpage/wishlist/2.jpg" width="100" height="125"
								     alt="product">
							</figure>
						</a>
					</td>
					<td class="product-name">
						<a href="product-simple.html">Greenhouse Cherry</a>
					</td>
					<td class="product-price">
						<span class="amount">$84.00</span>
					</td>
					<td class="product-stock-status">
						<span class="wishlist-in-stock">In Stock</span>
					</td>
					<td class="product-add-to-cart">
						<a href="#" class="btn-product btn-quickview btn btn-dim btn-outline mr-1">QUICK
							VIEW</a>
						<a href="#" class="btn-product btn-cart btn btn-dim">ADD TO CART</a>
					</td>
					<td class="product-remove">
						<div>
							<a href="#" class="btn-remove" title="Remove this product"><i
										class="p-icon-times"></i></a>
						</div>
					</td>
				</tr>
				<tr>
					<td class="product-thumbnail">
						<a href="product-simple.html">
							<figure>
								<img src="images/subpage/wishlist/3.jpg" width="100" height="125"
								     alt="product">
							</figure>
						</a>
					</td>
					<td class="product-name">
						<a href="product-simple.html">Nescafe Coffee</a>
					</td>
					<td class="product-price">
						<span class="amount">$84.00</span>
					</td>
					<td class="product-stock-status">
						<span class="wishlist-out-stock">In Stock</span>
					</td>
					<td class="product-add-to-cart">
						<a href="#" class="btn-product btn-quickview btn btn-dim btn-outline mr-1">QUICK
							VIEW</a>
						<a href="#" class="btn-product btn-cart btn btn-dim">ADD TO CART</a>
					</td>
					<td class="product-remove">
						<div>
							<a href="#" class="btn-remove" title="Remove this product"><i
										class="p-icon-times"></i></a>
						</div>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="tab-pane" id="address">
		<p>The following addresses will be used on the checkout page by default.
		</p>
		<div class="row">
			<div class="col-sm-6 mb-4">
				<div class="card card-address">
					<div class="card-body">
						<h5 class="card-title lh-2 mb-2">Billing Address</h5>
						<form method="post" action="{{ route('user.post.address',['user_id' => $user->id]) }}">
							@csrf

							<div class="form-group">
								<label>Name</label>
								<input class="form-control" value="{{ $address->name }}" type="text" name="name"
								       required>
							</div>

							<div class="form-group">
								<label>Location</label>
								<input class="form-control" value="{{ $address->location }}" type="text" name="location"
								       required>
							</div>

							<div class="form-group">
								<label>Phone number</label>
								<input class="form-control" value="{{ $address->phone_number }}" type="text"
								       name="phone_number" required>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">
									Save
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-6 mb-4">
				<div class="card card-address">
					<div class="card-body">
						<h5 class="card-title lh-2 mb-2">Available Address</h5>
						<h4>
							{{ $address->name }} <br>
							{{ $address->location }}<br>
							{{ $address->phone_number }}
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="account">
		<form action="#">
			<div class="row">
				<div class="col-sm-6 mb-4">
					<label>First Name *</label>
					<input type="text" name="first_name" placeholder="John" value="{{$user->first_name}}" required>
				</div>
				<div class="col-sm-6 mb-4">
					<label>Last Name *</label>
					<input type="text" name="last_name" placeholder="Doe" value="{{$user->last_name}}" required>
				</div>
			</div>

			<label>Display Name *</label>
			<input type="text" name="display_name" value="{{$user->name}}" required="" placeholder="John Doe"
			       class="mb-4">
			<span>
				<small class="d-block mb-4">
					This will be how your name will be displayed in the account section and in reviews
				</small>
			</span>

			<label>Email Address *</label>
			<input type="email" name="email" required="" value="{{ $user->email }}">
			<fieldset>
				<legend>Password Change</legend>
				<label>Current password (leave blank to leave unchanged)</label>
				<input type="password" name="current_password">

				<label>New password (leave blank to leave unchanged)</label>
				<input type="password" name="new_password">

				<label>Confirm new password</label>
				<input type="password" name="confirm_password">
			</fieldset>

			{{--<button type="submit" class="btn btn-primary">SAVE CHANGES</button>--}}
		</form>
	</div>


	@include('inc.modals')
@endsection
