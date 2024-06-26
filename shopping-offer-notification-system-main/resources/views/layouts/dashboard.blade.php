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
	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}">
	<!-- Preload Font -->

	<link rel="preload" href="{{ asset('vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}" as="font"
	      type="font/woff2"
	      crossorigin="anonymous">
	<link rel="preload" href="{{ asset('vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}" as="font"
	      type="font/woff2"
	      crossorigin="anonymous">

	<script>
		WebFontConfig = {
			google: {families: ['Josefin Sans:300,400,500,600,700']}
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

	<!-- Main CSS File -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.min.css') }}">
</head>

<body>
<div class="page-wrapper">
	<header class="header">
		<div class="header-top">
			<div class="container">
				<div class="header-left">
					<a href="tel:#" class="call">
						<i class="p-icon-phone-solid"></i>
						<span>+{{ \App\Http\Controllers\PageController::alignPhoneNumber(env('CONTACT_PHONE'),false) }}</span>
					</a>
					<span class="divider"></span>
					<a href="contact.html" class="contact">
						<i class="p-icon-map"></i>
						<span>{{ env('CONTACT_LOCATION') }}</span>
					</a>
				</div>
				<div class="header-right">
					<div class="dropdown switcher">
						<a href="#currency">USD</a>
						<ul class="dropdown-box">
							<li><a href="#USD">USD</a></li>
							<li><a href="#EUR">EUR</a></li>
						</ul>
					</div>
					<!-- End DropDown Menu -->
					<div class="dropdown switcher">
						<a href="#language"><img src="images/flagus.jpg" width="14" height="10" class="mr-1"
						                         alt="flagus">ENG</a>
						<ul class="dropdown-box">
							<li>
								<a href="#USD"><img src="images/flagus.jpg" width="14" height="10" class="mr-1"
								                    alt="flagus">ENG</a>
							</li>
							<li>
								<a href="#EUR"><img src="images/flagfr.jpg" width="14" height="10" class="mr-1"
								                    alt="flagfr">FRH</a>
							</li>
						</ul>
					</div>
					<span class="divider"></span>
					<!-- End DropDown Menu -->
					<div class="social-links">
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
			<div class="container">
				<div class="header-left">
					<a href="#" class="mobile-menu-toggle" title="Mobile Menu">
						<i class="p-icon-bars-solid"></i>
					</a>
					<a href="{{ route('index') }}" class="logo">
						<img src="{{ asset('images/logo.png') }}" alt="logo" width="171" height="41">
					</a>
					<!-- End of Divider -->
				</div>
				<div class="header-center">
					<nav class="main-nav">
						<ul class="menu">
							<li>
								<a href="demo1.html">Home</a>
							</li>
							<li>
								<a href="shop.html">Shop</a>
								<div class="megamenu">
									<div class="row">
										<div class="col-6 col-sm-4">
											<h4 class="menu-title title-underline"><span>Shop Layouts</span>
											</h4>
											<ul>
												<li><a href="shop-list.html">Shop list</a></li>
												<li><a href="shop-3-cols.html">3 Columns mode</a>
												</li>
												<li><a href="shop-4-cols.html">4 Columns mode</a></li>
												<li><a href="shop-5-cols.html">5 Columns mode</a>
												</li>
												<li><a href="shop-6-cols.html">6 Columns mode</a></li>
											</ul>
											<h4 class="menu-title title-underline"><span>Shop
                                                        Variations</span></h4>
											<ul>
												<li><a href="shop-left-sidebar.html">With left sidebar</a>
												</li>
												<li><a href="shop-full-width.html">Full width</a>
												</li>
												<li><a href="shop-horizontal-filter.html">Horizontal filter</a>
												</li>
											</ul>
										</div>
										<div class="col-6 col-sm-4">
											<h4 class="menu-title title-underline"><span>Product
                                                        Details</span></h4>
											<ul>
												<li><a href="product-simple.html">Default</a></li>
												<li><a href="product-gallery.html">Gallery</a></li>
												<li><a href="product-sticky.html">Sticky info</a></li>
												<li><a href="product-full.html">Full width</a></li>
											</ul>
											<h4 class="menu-title title-underline"><span>Woo Subpages</span>
											</h4>
											<ul>
												<li><a href="cart.html">Cart</a></li>
												<li><a href="checkout.html">Checkout</a></li>
												<li><a href="wishlist.html">Wishlist</a></li>
												<li><a href="compare.html">Compare</a></li>
											</ul>
										</div>
										<div class="col-6 col-sm-4 menu-banner banner banner-fixed">
											<figure>
												<img src="images/shop-menu.jpg" alt="Menu banner" width="224"
												     height="425"/>
											</figure>
											<div class="banner-content">
												<h4 class="banner-subtitle text-body mb-2 text-uppercase">
													New
													Arrivals
												</h4>
												<h3 class="banner-title text-capitalize">Fresh
													Fruits<br>collection
												</h3>
												<p class="banner-descri text-dim font-weight-light ls-normal mb-4">
													From<span
															class="text-primary font-weight-normal  pl-1">$24.00</span>
												</p>
												<a href="shop.html"
												   class="btn btn-outline btn-primary-dark font-weight-normal">shop
													now</a>
											</div>
										</div>
										<!-- End Megamenu -->
									</div>
								</div>
							</li>
							<li>
								<a href="#">Elements</a>
								<div class="megamenu">
									<div class="row">
										<div class="col-md-3">
											<h4 class="menu-title title-underline"><span>Elements 1</span>
											</h4>
											<ul>
												<li><a href="element-accordions.html">Accordion</a></li>
												<li><a href="element-alerts.html">Alert & Notification</a></li>
												<li><a href="element-banner.html">Banner
													</a></li>
												<li><a href="element-banner-effect.html">Banner Effect
													</a></li>
												<li><a href="element-blog.html">Blog</a></li>
												<li><a href="element-button.html">Button</a></li>
												<li><a href="element-columns.html">Columns
													</a></li>
												<li><a href="element-countdown.html">Countdown</a></li>
											</ul>
										</div>
										<div class="col-md-3">
											<h4 class="menu-title title-underline"><span>Elements 2</span>
											</h4>
											<ul>
												<li><a href="element-creative-grid.html">Creative Grid</a></li>
												<li><a href="element-counter.html">Counter
													</a></li>
												<li><a href="element-entrance-effect.html">Entrance Effect
													</a></li>
												<li><a href="element-mouse-tracking.html">Mouse Tracking Effect
													</a></li>
												<li><a href="element-hotspot.html">Hotspot
													</a></li>
												<li><a href="element-icon-box.html">Icon Box</a></li>
												<li><a href="element-icons.html">Icon Library</a></li>
												<li><a href="element-image-box.html">Image box
													</a></li>
											</ul>
										</div>
										<div class="col-md-3">
											<h4 class="menu-title title-underline"><span>Elements 3</span>
											</h4>
											<ul>
												<li><a href="element-image-gallery.html">Image Gallery</a></li>
												<li><a href="element-categories.html">Category</a></li>
												<li><a href="element-products.html">Products
													</a></li>
												<li><a href="element-product-banner.html">Products + Banner
													</a></li>
												<li><a href="element-product-tabs.html">Product Tab
													</a>
												</li>
												<li><a href="element-section.html">Section Divider

													</a></li>
												<li><a href="element-slider.html">Slider
													</a></li>
												<li><a href="element-social.html">Social Icons
													</a></li>
											</ul>
										</div>
										<div class="col-md-3">
											<h4 class="menu-title title-underline"><span>Elements 4</span>
											</h4>
											<ul>
												<li><a href="element-tabs.html">Tabs
													</a></li>
												<li><a href="element-testimonial.html">Testimonial

													</a></li>
												<li><a href="element-title.html">Title</a></li>
												<li><a href="element-typography.html">Typography
													</a></li>
												<li><a href="element-video.html">Video</a></li>
											</ul>
										</div>
									</div>
								</div>
							</li>
							<li>
								<a href="blog.html">Blog</a>
								<ul>
									<li><a href="blog.html">Classic</a></li>
									<li><a href="blog-single.html">Single Post</a></li>
									<li><a href="blog-2-grid.html">Grid 2 Columns</a></li>
									<li><a href="blog-3-grid.html">Grid 3 Columns</a></li>
									<li><a href="blog-4-grid.html">Grid 4 Columns</a></li>
									<li><a href="blog-sidebar.html">Grid Sidebar</a></li>
								</ul>
							</li>
							<li class="active">
								<a href="#">pages</a>
								<ul>
									<li><a href="about.html">About Us</a></li>
									<li><a href="contact.html">Contact Us</a></li>
									<li><a href="account.html">My Account</a></li>
									<li><a href="faq.html">Faqs</a></li>
									<li><a href="error.html">Error 404</a></li>
									<li><a href="coming.html">Coming Soon</a></li>
								</ul>
							</li>
							<li>
								<a href="https://d-themes.com/buynow/pandahtml/">buy panda!</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="header-right">
					<div class="header-search hs-toggle">
						<a class="search-toggle" href="#">
							<i class="p-icon-search-solid"></i>
						</a>
						<form action="#" class="form-simple">
							<input type="search" autocomplete="off" placeholder="Search in..." required>
							<button class="btn btn-search" type="submit">
								<i class="p-icon-search-solid"></i>
							</button>
						</form>
					</div>
					<div class="dropdown login-dropdown off-canvas">
						<!-- End Login Toggle -->
						<div class="canvas-overlay"></div>
						<a href="#" class="btn-close"></a>
						<div class="dropdown-box scrollable">
							<div class="login-popup">
								<div class="form-box">
									<div class="tab tab-nav-underline tab-nav-boxed">
										<ul class="nav nav-tabs nav-fill mb-4">
											<li class="nav-item">
												<a class="nav-link active lh-1 ls-normal" href="#signin">Login</a>
											</li>
											<li class="nav-item">
												<a class="nav-link lh-1 ls-normal" href="#register">Register</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="signin">
												<form action="#">
													<div class="form-group">
														<input type="text" id="singin-email" name="singin-email"
														       placeholder="Username or Email Address" required="">
														<input type="password" id="singin-password"
														       name="singin-password" placeholder="Password"
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
												<div class="form-choice text-center">
													<label>or Login With</label>
													<div class="social-links social-link-active ">
														<a href="#" title="Facebook"
														   class="social-link social-facebook fab fa-facebook-f"></a>
														<a href="#" title="Twitter"
														   class="social-link social-twitter fab fa-twitter"></a>
														<a href="#" title="Linkedin"
														   class="social-link social-linkedin fab fa-linkedin-in"></a>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="register">
												<form action="#">
													<div class="form-group">
														<input type="text" id="register-user" name="register-user"
														       placeholder="Username" required="">
														<input type="email" id="register-email"
														       name="register-email" placeholder="Your Email Address"
														       required="">
														<input type="password" id="register-password"
														       name="register-password" placeholder="Password"
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
												<div class="form-choice text-center">
													<label class="ls-m">or Register With</label>
													<div class="social-links social-link-active ">
														<a href="#" title="Facebook"
														   class="social-link social-facebook fab fa-facebook-f"></a>
														<a href="#" title="Twitter"
														   class="social-link social-twitter fab fa-twitter"></a>
														<a href="#" title="Linkedin"
														   class="social-link social-linkedin fab fa-linkedin-in"></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<button title="Close (Esc)" type="button" class="mfp-close"><span>×</span></button>
							</div>
						</div>
						<!-- End Dropdown Box -->
					</div>
					<a href="{{ route('home') }}#shopping_list" class="wishlist" title="Shopping List">
						<i class="p-icon-heart-solid"></i>
					</a>
					<div class="dropdown cart-dropdown off-canvas mr-0 mr-lg-2">
						<a href="#" class="cart-toggle link">
							<i class="p-icon-cart-solid">
								<span class="cart-count">2</span>
							</i>
						</a>
						<div class="canvas-overlay"></div>
						<div class="dropdown-box">
							<div class="canvas-header">
								<h4 class="canvas-title">Shopping Cart</h4>
								<a href="#" class="btn btn-dark btn-link btn-close">close<i
											class="p-icon-arrow-long-right"></i><span class="sr-only">Cart</span></a>
							</div>
							<div class="products scrollable">
								<div class="product product-mini">
									<figure class="product-media">
										<a href="product-simple.html">
											<img src="images/cart/product-1.jpg" alt="product" width="84"
											     height="105"/>
										</a>
										<a href="#" title="Remove Product" class="btn-remove">
											<i class="p-icon-times"></i><span class="sr-only">Close</span>
										</a>
									</figure>
									<div class="product-detail">
										<a href="product.html" class="product-name">Peanuts</a>
										<div class="price-box">
											<span class="product-quantity">7</span>
											<span class="product-price">$12.00</span>
										</div>
									</div>

								</div>
								<!-- End of Cart Product -->
								<div class="product product-mini">
									<figure class="product-media">
										<a href="product-simple.html">
											<img src="images/cart/product-2.jpg" alt="product" width="84"
											     height="105"/>
										</a>
										<a href="#" title="Remove Product" class="btn-remove">
											<i class="p-icon-times"></i><span class="sr-only">Close</span>
										</a>
									</figure>
									<div class="product-detail">
										<a href="product.html" class="product-name">Prime Beef</a>
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
						<!-- End Dropdown Box -->
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- End Header -->
	<main class="main account-page">
		<div class="page-header" style="background-color: #f9f8f4">
			<h1 class="page-title">@yield('title')</h1>
		</div>
		<nav class="breadcrumb-nav has-border">
			<div class="container">
				<ul class="breadcrumb">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li>@yield('title')</li>
				</ul>
			</div>
		</nav>
		<div class="page-content mt-4 mb-10 pb-6">
			<div class="container">
				<div class="tab tab-vertical gutter-lg">
					<ul class="nav nav-tabs mb-8 col-lg-3 col-md-4">
						<li class="nav-item">
							<a class="nav-link active" href="#dashboard">Dashboard</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#orders">Orders</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#shopping_list">Shopping List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#address">Addresses</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#account">Account details</a>
						</li>
						<li class="nav-item">
							<a class="nav-link no-tab-item" href="{{ route('c.logout') }}">Logout</a>
						</li>
					</ul>
					<div class="tab-content col-lg-9 col-md-8">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- End Main -->
	<footer class="footer">
		<div class="container">
			<div class="footer-top">
				<ul class="menu menu-type2">
					<li>
						<a href="about.html">About us</a>
					</li>
					<li>
						<a href="#">our team</a>
					</li>
					<li>
						<a href="faq.html">faq</a>
					</li>
					<li>
						<a href="account.html">my account</a>
					</li>
					<li>
						<a href="contact.html">contact us</a>
					</li>
				</ul>
			</div>
			<!-- End FooterTop -->
			<div class="footer-middle">
				<div class="footer-left">
					<ul class="widget-body">
						<li>
							<a href="tel:{{\App\Http\Controllers\PageController::alignPhoneNumber(env('CONTACT_PHONE'),false)}}"
							   class="footer-icon-box">
								<i class="p-icon-phone-solid"></i>
								<span>{{env('CONTACT_PHONE')}}</span>
							</a>
						</li>
						<li>
							<a href="#" class="">
								<i class="p-icon-map"></i>
								<span>{{env('CONTACT_LOCATION')}}</span>
							</a>
						</li>
						<li>
							<a href="mailto:mail@panda.com" class="">
								<i class="p-icon-message"></i>
								<span>{{env('CONTACT_EMAIL')}}</span>
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
				<div class="footer-center">
					<a href="demo1.html" class="logo-footer">
						<img src="{{ asset('images/logo.png') }}" alt="logo-footer" width="171" height="41">
					</a>
					<div class="social-links">
						<a href="#" class="social-link fab fa-facebook-f" title="Facebook"></a>
						<a href="#" class="social-link fab fa-twitter" title="Twitter"></a>
						<a href="#" class="social-link fab fa-pinterest" title="Pinterest"></a>
						<a href="#" class="social-link fab fa-linkedin-in" title="Linkedin"></a>
					</div>
					<!-- End of Social Links -->
				</div>
				<div class="footer-right">
					<div class="widget-newsletter">
						<h4 class="widget-title">Subscribe Newsletter</h4>
						<p>Subscribe to the {{ env('APP_NAME_IN_FULL') }} Newsletter<br> updates from your favourite
							products.
						</p>
						<form action="#" class="form-simple">
							<input type="email" name="email" id="email" placeholder="Email address here..."
							       required="">
							<button class="btn btn-link" type="submit">sign up</button>
						</form>
					</div>
				</div>
			</div>
			<!-- End FooterMiddle -->
			<div class="footer-bottom">
				<p class="copyright">Panda eCommerce © 2022. All Rights Reserved</p>
				<figure>
					<img src="images/payment.png" alt="payment" width="159" height="29">
				</figure>
			</div>
			<!-- End FooterBottom -->
		</div>
	</footer>
	<!-- End Footer -->
</div>
<!-- Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
	<a href="demo1.html" class="sticky-link">
		<i class="p-icon-home"></i>
		<span>Home</span>
	</a>
	<a href="shop.html" class="sticky-link">
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

<!-- MobileMenu -->
<div class="mobile-menu-wrapper">
	<div class="mobile-menu-overlay">
	</div>
	<!-- End Overlay -->
	<a class="mobile-menu-close" href="#"><i class="p-icon-times"></i></a>
	<!-- End CloseButton -->
	<div class="mobile-menu-container scrollable">
		<form action="#" class="inline-form">
			<input type="search" name="search" autocomplete="off" placeholder="Search your keyword..." required/>
			<button class="btn btn-search" type="submit">
				<i class="p-icon-search-solid"></i>
			</button>
		</form>
		<!-- End Search Form -->
		<ul class="mobile-menu mmenu-anim">
			<li>
				<a href="demo1.html">Home</a>
			</li>
			<li>
				<a href="shop.html" class="active">Shop</a>
				<ul>
					<li>
						<a href="#">
							Shop Layouts
						</a>
						<ul>
							<li><a href="shop-list.html">Shop list</a></li>
							<li><a href="shop-3-cols.html">3 Columns mode</a>
							</li>
							<li><a href="shop-4-cols.html">4 Columns mode</a></li>
							<li><a href="shop-5-cols.html">5 Columns mode</a>
							</li>
							<li><a href="shop-6-cols.html">6 Columns mode</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							Shop Variations
						</a>
						<ul>
							<li><a href="shop-left-sidebar.html">With left sidebar</a>
							</li>
							<li><a href="shop-full-width.html">Full width</a>
							</li>
							<li><a href="shop-horizontal-filter.html">Horizontal filter</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">
							Product Details
						</a>
						<ul>
							<li><a href="product-simple.html">Default</a></li>
							<li><a href="product-gallery.html">Gallery</a></li>
							<li><a href="product-sticky.html">Sticky info</a></li>
							<li><a href="product-full.html">Full width</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							Woo Subpages
						</a>
						<ul>
							<li><a href="cart.html">Cart</a></li>
							<li><a href="checkout.html">Checkout</a></li>
							<li><a href="wishlist.html">Wishlist</a></li>
							<li><a href="account.html">My account</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Elements</a>
				<ul>
					<li>
						<a href="#">Elements 1</a>
						<ul>
							<li><a href="element-accordions.html">Accordion</a></li>
							<li><a href="element-alerts.html">Alert & Notification</a></li>
							<li><a href="element-banner.html">Banner
								</a></li>
							<li><a href="element-banner-effect.html">Banner Effect
								</a></li>
							<li><a href="element-blog.html">Blog</a></li>
							<li><a href="element-button.html">Button</a></li>
							<li><a href="element-columns.html">Columns
								</a></li>
							<li><a href="element-countdown.html">Countdown</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Elements 2</a>
						<ul>
							<li><a href="element-creative-grid.html">Creative Grid</a></li>
							<li><a href="element-counter.html">Counter
								</a></li>
							<li><a href="element-entrance-effect.html">Entrance Effect
								</a></li>
							<li><a href="element-mouse-tracking.html">Mouse Tracking Effect
								</a></li>
							<li><a href="element-hotspot.html">Hotspot
								</a></li>
							<li><a href="element-icon-box.html">Icon Box</a></li>
							<li><a href="element-icons.html">Icon Library</a></li>
							<li><a href="element-image-box.html">Image box
								</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Elements 3</a>
						<ul>
							<li><a href="element-image-gallery.html">Image Gallery</a></li>
							<li><a href="element-categories.html">Category</a></li>
							<li><a href="element-products.html">Products
								</a></li>
							<li><a href="element-product-banner.html">Products + Banner
								</a></li>
							<li><a href="element-product-tabs.html">Product Tab
								</a>
							</li>
							<li><a href="element-section.html">Section Divider

								</a></li>
							<li><a href="element-slider.html">Slider
								</a></li>
							<li><a href="element-social.html">Social Icons
								</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Elements 4</a>
						<ul>
							<li><a href="element-tabs.html">Tabs
								</a></li>
							<li><a href="element-testimonial.html">Testimonial

								</a></li>
							<li><a href="element-title.html">Title</a></li>
							<li><a href="element-typography.html">Typography
								</a></li>
							<li><a href="element-video.html">Video</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				<a href="blog.html">Blog</a>
				<ul>
					<li><a href="blog.html">Classic</a></li>
					<li><a href="blog-single.html">Single Post</a></li>
					<li><a href="blog-2-grid.html">Grid 2 Columns</a></li>
					<li><a href="blog-3-grid.html">Grid 3 Columns</a></li>
					<li><a href="blog-4-grid.html">Grid 4 Columns</a></li>
					<li><a href="blog-sidebar.html">Grid Sidebar</a></li>
				</ul>
			</li>
			<li>
				<a href="#">Pages</a>
				<ul>
					<li><a href="about.html">About Us</a></li>
					<li><a href="contact.html">Contact Us</a></li>
					<li><a href="account.html">My Account</a></li>
					<li><a href="faq.html">Faqs</a></li>
					<li><a href="error.html">Error 404</a></li>
					<li><a href="coming.html">Coming Soon</a></li>
				</ul>
			</li>
			<li><a href="https://d-themes.com/buynow/pandahtml/">Buy Panda!</a></li>
		</ul>
		<!-- End MobileMenu -->
	</div>
</div>
@include('sweetalert::alert')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/main.min.js') }}"></script>
</body>
</html>