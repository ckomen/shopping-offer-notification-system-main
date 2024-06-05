<?php
$user = auth()->user();
$departments = \App\Department::query()->get();
?>


		<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

	<title>{{ env('APP_NAME') }} - E-commerce</title>

	<meta name="keywords" content="HTML5 Template"/>
	<meta name="description" content="Panda - Ultimate eCommerce Template">
	<meta name="author" content="D-THEMES">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
	<!-- Preload Font -->

	<link rel="preload" href="{{ asset('vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}" as="font"
	      type="font/woff2"
	      crossorigin="anonymous">
	<link rel="preload" href="{{ asset('vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}" as="font"
	      type="font/woff2"
	      crossorigin="anonymous">

	<script>
		WebFontConfig = {
			google: {families: ['Josefin Sans:300,400,600,700']}
		};
		(function (d) {
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = 'js/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore(wf, s);
		})(document);
	</script>


	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/owl-carousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/magnific-popup/magnific-popup.min.css') }}">

	<!-- Main CSS File -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/demo6.min.css') }}">
</head>

<body class="home">
<div class="page-wrapper with-sidebar">
	<aside class="main-sidebar sidebar sidebar-fixed sticky-sidebar-wrapper">
		<div class="sidebar-overlay">
		</div>
		<a class="sidebar-close" href="#"><i class="p-icon-times"></i></a>
		<a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
		<div class="sidebar-content">
			<div class="sticky-sidebar pb-lg-8" data-sticky-options="{'top': 10}">

				<a href="{{ route('index') }}" class="logo d-lg-show d-inline-block pb-2 mb-8 mt-8 mt-lg-0">
					<img src="{{ asset('images/logo.png') }}" alt="logo">
				</a>
				<nav>
					<h4 class="title mt-lg-0 mt-10 mb-2">Special Offers</h4>
					<ul class="menu toggle-menu mb-8">
						<li class="submenu">
							<a href="#">Special Offers</a>
						</li>
						@if($user)
							<li class="submenu">
								<a href="#">My Shopping List</a>
							</li>
						@endif
					</ul>
					<h4 class="title mb-2">Departments</h4>
					<ul class="menu toggle-menu mb-8">
						@foreach($departments as $department)
							<?php
							$categories = \App\Category::query()->where("department_id",$department->id)->get();
							?>
							<li class="@if($categories) submenu @endif">
								<a href="">{{ $department->name }}</a>
								@if($categories->count() > 0)
									<ul>
										@foreach($categories as $category)
											<li>
												<a href="">{{ $category->name }}</a>
											</li>
										@endforeach
									</ul>
								@endif
							</li>
						@endforeach
					</ul>
				</nav>
			</div>
		</div>
	</aside>
	<div class="page-content">
		<header class="header">
			<div class="header-top">
				<div class="container-fluid">
					<div class="header-left">
						<p class="welcome-msg">Welcome to {{ env('APP_NAME_IN_FULL') }}!</p>
					</div>
					<div class="header-right">
						<span class="divider d-xl-show"></span>
						<a href="#" class="ml-3 order d-flex d-xl-show align-items-center lh-1">
							<i class="mr-2 p-icon-shipping-solid"></i>
							<span class="text-uppercase">Order Tracking</span>
						</a>
						<span class="divider"></span>
						<!-- End DropDown Menu -->
						<div class="social-links mb-1">
							<a href="#" class="social-link fab fa-facebook-f" title="Facebook"></a>
							<a href="#" class="social-link fab fa-twitter" title="Twitter"></a>
							<a href="#" class="social-link fab fa-pinterest" title="Pinterest"></a>
							<a href="#" class="social-link fab fa-linkedin-in" title="Linkedin"></a>
						</div>
						<!-- End of Social Links -->
					</div>
				</div>
			</div>
			<!-- End HeaderTop -->
			<div class="header-middle has-center sticky-header fix-top sticky-content">
				<div class="container-fluid">
					<div class="header-left flex-1">
						<a href="{{ route('index') }}" class="logo d-block d-lg-none mr-4">
							<img src="{{ asset('images/demos/demo6/logo.png') }}" alt="logo" width="171">
						</a>
						<div class="header-search hs-expanded mr-8">
							<form action="#" method="get" class="inline-form form-simple">
								<div class="select-box">
									<select id="category" name="category">
										<option value="">All Categories</option>
										<option value="4">- Fruits &amp; Vegetables</option>
										<option value="12">- Eggs &amp; Dairy</option>
										<option value="13">- Snacks &amp; Candy</option>
										<option value="66">- Fish</option>
										<option value="67">- Alcohol</option>
										<option value="21">- Coffee</option>
										<option value="22">- Beverage &amp; Drinks</option>
										<option value="63">- Oil &amp; Spices</option>
									</select>
								</div>
								<input type="text" name="search" id="search" placeholder="Search Product..."
								       required="" autocomplete="off">
								<button class="btn btn-search" type="submit" title="submit-button"><i
											class="p-icon-search-solid"></i></button>
							</form>
						</div>
					</div>
					<div class="header-right flex-auto">
						<a class="call d-xl-show" href="tel:{{env('CONTACT_PHONE')}}">
							<i class="p-icon-phone-solid"></i>
							<span>
                                    Call us now:
                                    <span class="d-block number font-weight-normal">+{{ \App\Http\Controllers\PageController::alignPhoneNumber(env('CONTACT_PHONE'),false) }}</span>
                                </span>
						</a>
						<span class="divider d-xl-show ml-xl-6 mr-xl-6 ml-4 mr-4"></span>
						<div class="@if(!$user) dropdown  login-dropdown off-canvas @endif">
							<a class="@if(!$user) login-toggle @endif"
							   href="@if($user) {{ route('home') }} @else #! @endif"
							   @if(!$user)data-toggle="login-modal"@endif>
								@if(!$user)
									<span class="sr-only">login</span>
									<i class="p-icon-user-solid"></i>
								@else
									{{$user->username}}
									&nbsp;&nbsp;&nbsp;
								@endif
							</a>
							<!-- End Login Toggle -->
							<div class="canvas-overlay"></div>
							<a href="#" class="btn-close"></a>
							<div class="dropdown-box scrollable">
								<div class="login-popup">
									<div class="form-box">
										<div class="tab tab-nav-underline tab-nav-boxed">
											<ul class="nav nav-tabs nav-fill mb-4">
												<li class="nav-item">
													<a class="nav-link active lh-1 ls-normal"
													   href="#signin">Login</a>
												</li>
												<li class="nav-item">
													<a class="nav-link lh-1 ls-normal" href="#register">Register</a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="signin">
													<form action="{{ route('login') }}" method="post">
														@csrf
														<div class="form-group">
															<input type="text" id="singin-email" name="email"
															       placeholder="Username or Email Address" required="">
															<input type="password" id="singin-password"
															       name="password" placeholder="Password"
															       required="">
														</div>
														<div class="form-footer">
															<div class="form-checkbox">
																<input type="checkbox" id="signin-remember"
																       name="signin-remember">
																<label for="signin-remember">Remember
																	me</label>
															</div>
															<a href="#" class="lost-link">Lost your password?</a>
														</div>
														<button class="btn btn-dark btn-block"
														        type="submit">Login
														</button>
													</form>
												</div>
												<div class="tab-pane" id="register">
													<form action="{{ route('register') }}" autocomplete="off"
													      method="post">
														@csrf
														<div class="form-group">
															<input type="text" id="register-user"
															       name="name" placeholder="Full name"
															       autocomplete="off"
															       required="">
															<input type="text" id="register-username"
															       name="username" placeholder="User name"
															       autocomplete="off"
															       required="">
															<input type="email" id="register-email"
															       name="email"
															       placeholder="Your Email Address"
															       autocomplete="off"
															       required="">
															<input type="password"
															       id="register-password"
															       name="password"
															       placeholder="Password"
															       autocomplete="off"
															       required="">
														</div>
														<div class="form-footer mb-5">
															<div class="form-checkbox">
																<input type="checkbox" id="register-agree"
																       name="register-agree" required="">
																<label for="register-agree">I
																	agree to the
																	privacy policy</label>
															</div>
														</div>
														<button class="btn btn-dark btn-block"
														        type="submit">Register
														</button>
													</form>
												</div>
											</div>
										</div>
									</div>
									<button title="Close (Esc)" type="button"
									        class="mfp-close"><span>×</span></button>
								</div>
							</div>
							<!-- End Dropdown Box -->
						</div>
						<a href="{{ route('home') }}#shopping_list" class="wishlist wishlist-toggle"
						   title="Shopping List">
							<i class="p-icon-heart-solid"></i>
						</a>
						<div class="dropdown cart-dropdown off-canvas">
							<a href="#" class="cart-toggle link">
								<i class="p-icon-cart-solid">
								</i>
								<span class="cart-label">
                                        My Cart
                                        <span>
                                            <span class="cart-count not-badge">2</span> Items:
                                            <span class="cart-price">$148.00</span>
                                        </span>
                                    </span>
							</a>
							<div class="canvas-overlay"></div>
							<div class="dropdown-box">
								<div class="canvas-header">
									<h4 class="canvas-title">Shopping Cart</h4>
									<a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">close<i
												class="p-icon-arrow-long-right"></i><span
												class="sr-only">Cart</span></a>
								</div>
								<div class="products scrollable">
									<div class="product product-mini">
										<figure class="product-media">
											<a href="demo6-product.html">
												<img src="images/cart/product-1.jpg" alt="product" width="84"
												     height="105"/>
											</a>
											<a href="#" title="Remove Product" class="btn-remove">
												<i class="p-icon-times"></i><span class="sr-only">Close</span>
											</a>
										</figure>
										<div class="product-detail">
											<a href="demo6-product.html" class="product-name">Peanut</a>
											<div class="price-box">
												<span class="product-quantity">7</span>
												<span class="product-price">$12.00</span>
											</div>
										</div>

									</div>
									<!-- End of Cart Product -->
									<div class="product product-mini">
										<figure class="product-media">
											<a href="demo6-product.html">
												<img src="images/cart/product-2.jpg" alt="product" width="84"
												     height="105"/>
											</a>
											<a href="#" title="Remove Product" class="btn-remove">
												<i class="p-icon-times"></i><span class="sr-only">Close</span>
											</a>
										</figure>
										<div class="product-detail">
											<a href="demo6-product.html" class="product-name">Salted Beef</a>
											<div class="price-box">
												<span class="product-quantity">4</span>
												<span class="product-price">$16.00</span>
											</div>
										</div>
									</div>
									<!-- End of Cart Product -->
								</div>
								<!-- End of Products  -->
								<div class="cart-total">
									<label>Subtotal:</label>
									<span class="price">$148.00</span>
								</div>
								<!-- End of Cart Total -->
								<div class="cart-action">
									<a href="cart.html" class="btn btn-outline btn-dim mb-2">View
										Cart</a>
									<a href="checkout.html" class="btn btn-dim"><span>Go To Checkout</span></a>
								</div>
								<!-- End of Cart Action -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>


		<!-- End Header -->
		<main class="main pt-8">
			<div class="container-fluid">
				@yield('content')
			</div>
		</main>
		<!-- End Main -->


		<footer class="footer footer-dark">
			<div class="container-fluid">
				<div class="footer-middle">
					<div class="row">
						<div class="col-xl-3 col-sm-6 mb-6 mb-xl-0">
							<div class="widget widget-about pr-10">
								<a href="{{ route('index') }}" class="logo-footer mb-5">
									<img src="{{ asset('images/logo.png') }}" alt="logo-footer"/>
								</a>
								<div class="widget-body pt-0">
									<p class="mb-7">Plan your budget to live a happy life. Create a shopping list with
										us and get notified when prices changes. Shop every month and gain redeemable
										points. We will hand deliver your shopping list at you doorstep within 30
										minutes once the payment is made.</p>
									<a href="mailto:{{env('CONTACT_EMAIL')}}">{{env('CONTACT_EMAIL')}}</a>
								</div>
							</div>
							<!-- End of Widget -->
						</div>
						<div class="custom-col-xl col-sm-6 mb-6 mb-xl-0">
							<div class="widget">
								<h4 class="widget-title">Contact info</h4>
								<ul class="widget-body footer-icon-boxes">
									<li>
										<a href="tel:{{ env('CONTACT_PHONE') }}" class="footer-icon-box">
											<i class="p-icon-phone-solid"></i>
											<span>{{ \App\Http\Controllers\PageController::alignPhoneNumber(env('CONTACT_PHONE')) }}</span>
										</a>
									</li>
									<li>
										<a href="#" class="">
											<i class="p-icon-map"></i>
											<span>{{ env('CONTACT_LOCATION') }}</span>
										</a>
									</li>
									<li>
										<a href="#" class="">
											<i class="p-icon-message"></i>
											<span class="text-normal">{{ env('CONTACT_EMAIL') }}</span>
										</a>
									</li>
									<li>
										<a href="#" class="">
											<i class="p-icon-clock"></i>
											<span>24/7</span>
										</a>
									</li>
								</ul>
							</div>
							<!-- End of Widget -->
						</div>
						<div class="custom-col-xl col-sm-6 mb-6 mb-xl-0">
							<div class="widget">
								<h4 class="widget-title">Customer Service</h4>
								<ul class="widget-body">
									<li><a href="#">Money-back guarantee!</a></li>
									<li><a href="#">Returns</a></li>
									<li><a href="#">Shipping</a></li>
									<li><a href="#">Terms and conditions</a></li>
									<li><a href="{{ route('home') }}#orders">Orders</a></li>
								</ul>
							</div>
							<!-- End of Widget -->
						</div>
						<div class="col-xl-4 col-sm-6 mb-6 mb-xl-0 pt-2">
							<div class="widget widget-newsletter">
								<h4 class="widget-title">Subscribe Newsletter</h4>
								<div class="widget-body">
									<p class="text-grey">
										Subscribe to the {{ env('APP_NAME_IN_FULL') }} eCommerce Newsletter updates from
										your favourite products.
									</p>
									<form action="#" class="inline-form mt-3 mb-4">
										<input type="email" name="email" id="email" class="pl-4 border-no"
										       placeholder="Email address here..." required="">
										<button class="btn btn-primary ml-2" type="submit">subscribe</button>
									</form>
									<div class="social-links justify-content-start">
										<a href="#" class="ml-0 social-link fab fa-facebook-f" title="Facebook"></a>
										<a href="#" class="social-link fab fa-twitter" title="Twitter"></a>
										<a href="#" class="social-link fab fa-pinterest" title="Pinterest"></a>
										<a href="#" class="social-link fab fa-linkedin-in" title="Linkedin"></a>
									</div>
								</div>
							</div>
							<!-- End of Widget -->
						</div>
					</div>
				</div>
				<!-- End FooterMiddle -->
				<div class="footer-bottom">
					<div class="footer-left">
						<p class="copyright">{{ env('APP_NAME') }} eCommerce © {{date("Y")}}. All Rights Reserved</p>
					</div>
					<div class="footer-right">
						<img src="{{ asset('images/demos/demo6/payment.png') }}" alt="payment" width="184" height="23">
					</div>
				</div>
				<!-- End FooterBottom -->
			</div>
		</footer>
		<!-- End Footer -->
	</div>
</div>
<!-- Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
	<a href="demo3.html" class="sticky-link">
		<i class="p-icon-home"></i>
		<span>Home</span>
	</a>
	<a href="demo3-shop.html" class="sticky-link">
		<i class="p-icon-category"></i>
		<span>Categories</span>
	</a>
	<a href="wishlist.html" class="sticky-link">
		<i class="p-icon-heart-solid"></i>
		<span>Wishlist</span>
	</a>
	<a href="account.html" class="sticky-link">
		<i class="p-icon-user-solid"></i>
		<span>Account</span>
	</a>
	<div class="header-search hs-toggle dir-up">
		<a href="#" class="search-toggle sticky-link">
			<i class="p-icon-search-solid"></i>
			<span>Search</span>
		</a>
		<form action="#" class="form-simple">
			<input type="text" name="search" autocomplete="off" placeholder="Search your keyword..." required/>
			<button class="btn btn-search" type="submit">
				<i class="p-icon-search-solid"></i>
			</button>
		</form>
	</div>
</div>
<!-- Scroll Top -->
<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="p-icon-arrow-up"></i>
	<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
		<circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
		        r="34" style="stroke-dasharray: 108.881, 400;"></circle>
	</svg>
</a>

<!-- Plugins JS File -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendor/sticky/sticky.min.js') }}"></script>
<script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.floating/jquery.floating.min.js') }}"></script>
<!-- Main JS File -->
<script src="{{ asset('js/main.min.js') }}"></script>
</body>
</html>