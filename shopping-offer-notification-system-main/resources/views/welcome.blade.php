@extends("layouts.app")
@section('content')
	<section class="intro-section row grid grid-float mb-6">
		<div class="grid-item col-xl-8 height-x2">
			<div class="intro-slider owl-dots-line">
				<div class="owl-carousel owl-theme banner-slider row cols-1 gutter-no" data-owl-options="{
                                'dotsContainer': '.owl-dots-container',
                                'nav': false,
                                'dots': true,
                                'loop': false,
                                'items': 1
                            }">
					<div class="banner banner-fixed intro-slide1 overlay-zoom">
						<figure>
							<img src="{{ asset('images/demos/demo6/banner/banner1.jpg') }}" width="1020"
							     height="560" alt="banner" style="background: #e4e6e7;">
						</figure>
						<div class="banner-content y-50">
							<h5 class="banner-subtitle text-uppercase text-dim lh-1 mb-4">From online
								store</h5>
							<h2 class="banner-title mb-5">Discover a snack that's made for you</h2>
							<h3 class="banner-desc mb-8 lh-1">From<span
										class="pl-3 text-primary"><sup>$</sup>32<sup>00</sup></span></h3>
							<a href="demo6-shop.html" class="btn btn-dark">Shop Now<i
										class="p-icon-arrow-long-right pl-1"></i></a>
						</div>
					</div>
					<div class="banner banner-fixed intro-slide2 overlay-zoom">
						<figure>
							<img src="images/demos/demo6/banner/banner1-2.jpg" width="1020" height="560"
							     alt="banner" style="background: #f6f5f2;">
						</figure>
						<div class="banner-content y-50 text-right">
							<h5 class="banner-subtitle text-uppercase text-primary lh-1 mb-3">Organic
								Store</h5>
							<h3 class="banner-title mb-8">Choose the<br> New healthier<br> way of life
							</h3>
							<a href="demo6-shop.html" class="btn btn-dark">Shop Now<i
										class="p-icon-arrow-long-right pl-1"></i></a>
						</div>
					</div>
				</div>
				<div class="owl-dots-container">
					<button title="dots-container" class="owl-dot active">
						01.
					</button>
					<button title="dots-container" class="owl-dot">
						02.
					</button>
				</div>
			</div>
		</div>
		<div class="grid-item col-xl-4 col-md-6 height-x1">
			<div class="banner banner-fixed intro-banner1 overlay-zoom">
				<figure>
					<img src="images/demos/demo6/banner/banner2.jpg" width="500" height="270"
					     alt="banner" style="background: #dadfce;">
				</figure>
				<div class="banner-content">
					<h2 class="banner-title lh-1 mb-2">Rich in Vitamin</h2>
					<h4 class="banner-subtitle lh-1 mb-4">From<span
								class="pl-2 text-primary"><sup>$</sup>28<sup>00</sup></span></h4>
					<a href="demo6-shop.html" class="btn btn-link btn-underline">Shop Now<i
								class="p-icon-arrow-long-right pl-1"></i></a>
				</div>
			</div>
		</div>
		<div class="grid-item col-xl-4 col-md-6 height-x1">
			<div class="banner banner-fixed intro-banner2 overlay-zoom">
				<figure>
					<img src="images/demos/demo6/banner/banner3.jpg" width="500" height="270"
					     alt="banner" style="background: #f0e5de;">
				</figure>
				<div class="banner-content">
					<h2 class="banner-title lh-1 mb-2">Nut Collection</h2>
					<h4 class="banner-subtitle lh-1 mb-4">From<span
								class="pl-2 text-primary"><sup>$</sup>17<sup>00</sup></span></h4>
					<a href="demo6-shop.html" class="btn btn-link btn-underline">Shop Now<i
								class="p-icon-arrow-long-right pl-1"></i></a>
				</div>
			</div>
		</div>
	</section>
	<section class="services-section owl-box-border mb-10">
		<div class="owl-carousel owl-theme row cols-xxl-4 cols-lg-2 cols-md-3 cols-sm-2 cols-1"
		     data-owl-options="{
                                'nav': false,
                                'dots': false,
                                'loop': true,
                                'autoplay': true,
                                'responsive': {
                                    '0': {
                                        'items': 1
                                    },
                                    '576': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3
                                    },
                                    '992': {
                                        'items': 2
                                    },
                                    '1200': {
                                        'items': 3
                                    },
                                    '1600': {
                                        'items': 4,
                                        'loop': false,
                                        'autoplay': false
                                    }
                                }
                            }">
			<div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="p-icon-shipping-solid"></i>
                                </span>
				<div class="icon-box-content">
					<h4 class="icon-box-title">FREE SHIPPING & RETURN</h4>
					<p>Free shipping on orders over $99</p>
				</div>
			</div>
			<div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="p-icon-quality"></i>
                                </span>
				<div class="icon-box-content">
					<h4 class="icon-box-title">QUALITY GUARANTEED</h4>
					<p>We offer high quality of products</p>
				</div>
			</div>
			<div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="p-icon-earphone2"></i>
                                </span>
				<div class="icon-box-content">
					<h4 class="icon-box-title">CUSTOMER SUPPORT 24/7</h4>
					<p>24 hours a day, 7 days a week</p>
				</div>
			</div>
			<div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="p-icon-fax2"></i>
                                </span>
				<div class="icon-box-content">
					<h4 class="icon-box-title">SECURE PAYMENT</h4>
					<p>We ensure secure payment!</p>
				</div>
			</div>
		</div>
	</section>
	<?php
	$count = 0;
	?>
	@foreach($departments as $department)
		<section class="products-section mb-10 pt-8 pb-8">
			<h2 class="title">{{ $department->name }}</h2>
			<div class="row">
				<div class="col-xxl-3 col-md-4 banner-wrapper mb-4 mb-md-0">
					<div class="banner banner-fixed h-100"
					     style="background-image: url({{$department->image}}); background-color: #e3eae8;">
						<div class="banner-content">
							<h5 class="banner-subtitle mb-3 text-uppercase text-body lh-1">{{ \App\Http\Controllers\PageController::$highlightType[$count] }}</h5>
							<?php
							$departmentCategories = $department->categories()->first();
							?>
							<h3 class="banner-title mb-1 lh-1 mb-4">{{ $departmentCategories ? $departmentCategories->name : "Category here"}}</h3>
							<p class="banner-desc lh-1">From<span
										class="pl-1 text-primary"><sup>Ksh</sup>{{ \App\Http\Controllers\PageController::$minimumPrices[rand(0,(count(\App\Http\Controllers\PageController::$minimumPrices)-1))] }}</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xxl-9 col-md-8 d-block">
					<div class="owl-carousel owl-nav-top row cols-xxl-4 cols-xl-3 cols-2" data-owl-options="{
                                    'items': 2,
                                    'loop': false,
                                    'nav': true,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'dots': true,
                                            'nav': false
                                        },
                                        '768': {
                                            'dots': false,
                                            'nav': true
                                        },
                                        '1200': {
                                            'items': 3
                                        },
                                        '1600': {
                                            'items': 4
                                        }
                                    }
                                }">

						@foreach(\App\Http\Controllers\PageController::getProductsFromCategories($department->id) as $product)
							<div class="product shadow-media text-center">
								<figure class="product-media">
									<a href="">
										<?php
										$image = $product->images()->first();
										?>
										<img src="{{ $image ? asset($image->image) : asset('images/image-not-found.jpg') }}"
										     alt="product" width="272" height="340">
									</a>
									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
										   data-target="#addCartModal" title="Add to Cart">
											<i class="p-icon-cart-solid"></i>
										</a>
										<a href="#" class="btn-product-icon btn-wishlist"
										   title="Add to Wishlist">
											<i class="p-icon-heart-solid"></i>
										</a>
										<a href="#" class="btn-product-icon btn-compare" title="Compare">
											<i class="p-icon-compare-solid"></i>
										</a>
										<a href="#" class="btn-product-icon btn-quickview" title="Quick View">
											<i class="p-icon-search-solid"></i>
										</a>
									</div>
								</figure>
								<div class="product-details">
									<div class="ratings-container">
										<div class="ratings-full">
											<span class="ratings" style="width:60%"></span>
											<span class="tooltiptext tooltip-top"></span>
										</div>
										<a href="#content-reviews"
										   class="rating-reviews hash-scroll">(12)</a>
									</div>
									<h5 class="product-name">
										<a href="">
											{{ $product->name }}
										</a>
									</h5>
									<span class="product-price">
                                                <del class="old-price">Ksh {{ number_format(\App\Http\Controllers\PageController::calculateOriginalPrice($product->discount,$product->price)) }}</del>
										<br>
                                                <ins class="new-price">Ksh {{ number_format($product->price) }}</ins>
                                            </span>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>
		<?php
		$count++;
		?>
	@endforeach
	<section class="products-section mb-10 pb-7 pt-8">
		<h2 class="title mb-6">Special Offers</h2>
		<div class="row">
			<div class="col-xxl-3 col-md-4 banner-wrapper mb-4 mb-md-0">
				<div class="banner banner-fixed h-100"
				     style="background-image: url(images/demos/demo6/banner/banner13.jpg); background-color: #f0edee;">
					<div class="banner-content">
						<h5 class="mb-3 text-uppercase text-body lh-1">Time to buy</h5>
						<h3 class="banner-title mb-1 lh-1 mb-4">Shock
							Offer</h3>
						<h4 class="banner-desc lh-1">From<span
									class="pl-1 text-primary"><sup>$</sup>34<sup>00</sup></span></h4>
					</div>
				</div>
			</div>
			<div class="col-xxl-9 col-md-8 d-block">
				<div class="owl-carousel owl-nav-top row cols-xxl-4 cols-xl-3 cols-2" data-owl-options="{
                                    'items': 2,
                                    'loop': false,
                                    'nav': true,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'dots': true,
                                            'nav': false
                                        },
                                        '768': {
                                            'dots': false,
                                            'nav': true
                                        },
                                        '1200': {
                                            'items': 3
                                        },
                                        '1600': {
                                            'items': 4
                                        }
                                    }
                                }">
					<div class="product shadow-media text-center">
						<figure class="product-media">
							<a href="demo6-product.html">
								<img src="images/products/11-272x340.jpg" alt="product" width="272"
								     height="340">
							</a>
							<div class="product-action-vertical">
								<a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
								   data-target="#addCartModal" title="Add to Cart">
									<i class="p-icon-cart-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-wishlist"
								   title="Add to Wishlist">
									<i class="p-icon-heart-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-compare" title="Compare">
									<i class="p-icon-compare-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-quickview" title="Quick View">
									<i class="p-icon-search-solid"></i>
								</a>
							</div>
						</figure>
						<div class="product-details">
							<div class="ratings-container">
								<div class="ratings-full">
									<span class="ratings" style="width:60%"></span>
									<span class="tooltiptext tooltip-top"></span>
								</div>
								<a href="demo6-product.html#content-reviews"
								   class="rating-reviews hash-scroll">(12)</a>
							</div>
							<h5 class="product-name">
								<a href="demo6-product.html">
									Fresh Pork
								</a>
							</h5>
							<span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
						</div>
					</div>
					<!-- End .product -->

					<div class="product shadow-media text-center">
						<figure class="product-media">
							<a href="demo6-product.html">
								<img src="images/products/3-272x340.jpg" alt="product" width="272"
								     height="340">
							</a>
							<div class="product-action-vertical">
								<a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
								   data-target="#addCartModal" title="Add to Cart">
									<i class="p-icon-cart-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-wishlist"
								   title="Add to Wishlist">
									<i class="p-icon-heart-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-compare" title="Compare">
									<i class="p-icon-compare-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-quickview" title="Quick View">
									<i class="p-icon-search-solid"></i>
								</a>
							</div>
						</figure>
						<div class="product-details">
							<div class="ratings-container">
								<div class="ratings-full">
									<span class="ratings" style="width:60%"></span>
									<span class="tooltiptext tooltip-top"></span>
								</div>
								<a href="demo6-product.html#content-reviews"
								   class="rating-reviews hash-scroll">(12)</a>
							</div>
							<h5 class="product-name">
								<a href="demo6-product.html">
									Hazelnuts
								</a>
							</h5>
							<span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
						</div>
					</div>
					<!-- End .product -->

					<div class="product shadow-media text-center">
						<figure class="product-media">
							<a href="demo6-product.html">
								<img src="images/products/19-272x340.jpg" alt="product" width="272"
								     height="340">
							</a>
							<div class="product-action-vertical">
								<a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
								   data-target="#addCartModal" title="Add to Cart">
									<i class="p-icon-cart-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-wishlist"
								   title="Add to Wishlist">
									<i class="p-icon-heart-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-compare" title="Compare">
									<i class="p-icon-compare-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-quickview" title="Quick View">
									<i class="p-icon-search-solid"></i>
								</a>
							</div>
						</figure>
						<div class="product-details">
							<div class="ratings-container">
								<div class="ratings-full">
									<span class="ratings" style="width:60%"></span>
									<span class="tooltiptext tooltip-top"></span>
								</div>
								<a href="demo6-product.html#content-reviews"
								   class="rating-reviews hash-scroll">(12)</a>
							</div>
							<h5 class="product-name">
								<a href="demo6-product.html">
									Black StrawBerry
								</a>
							</h5>
							<span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
						</div>
					</div>
					<!-- End .product -->

					<div class="product shadow-media text-center">
						<figure class="product-media">
							<a href="demo6-product.html">
								<img src="images/products/36-272x340.jpg" alt="product" width="272"
								     height="340">
							</a>
							<div class="product-action-vertical">
								<a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
								   data-target="#addCartModal" title="Add to Cart">
									<i class="p-icon-cart-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-wishlist"
								   title="Add to Wishlist">
									<i class="p-icon-heart-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-compare" title="Compare">
									<i class="p-icon-compare-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-quickview" title="Quick View">
									<i class="p-icon-search-solid"></i>
								</a>
							</div>
						</figure>
						<div class="product-details">
							<div class="ratings-container">
								<div class="ratings-full">
									<span class="ratings" style="width:60%"></span>
									<span class="tooltiptext tooltip-top"></span>
								</div>
								<a href="demo6-product.html#content-reviews"
								   class="rating-reviews hash-scroll">(12)</a>
							</div>
							<h5 class="product-name">
								<a href="demo6-product.html">
									Walnut
								</a>
							</h5>
							<span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
						</div>
					</div>
					<!-- End .product -->

					<div class="product shadow-media text-center">
						<figure class="product-media">
							<a href="demo6-product.html">
								<img src="images/products/11-272x340.jpg" alt="product" width="272"
								     height="340">
							</a>
							<div class="product-action-vertical">
								<a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
								   data-target="#addCartModal" title="Add to Cart">
									<i class="p-icon-cart-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-wishlist"
								   title="Add to Wishlist">
									<i class="p-icon-heart-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-compare" title="Compare">
									<i class="p-icon-compare-solid"></i>
								</a>
								<a href="#" class="btn-product-icon btn-quickview" title="Quick View">
									<i class="p-icon-search-solid"></i>
								</a>
							</div>
						</figure>
						<div class="product-details">
							<div class="ratings-container">
								<div class="ratings-full">
									<span class="ratings" style="width:60%"></span>
									<span class="tooltiptext tooltip-top"></span>
								</div>
								<a href="demo6-product.html#content-reviews"
								   class="rating-reviews hash-scroll">(12)</a>
							</div>
							<h5 class="product-name">
								<a href="demo6-product.html">
									Fresh Pork
								</a>
							</h5>
							<span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
						</div>
					</div>
					<!-- End .product -->
				</div>
			</div>
		</div>
	</section>
	<section class="blog-section mb-10 pb-4">
		<h2 class="title mb-6">From Our Blog
			<a class="btn btn-link btn-dim ml-auto btn-underline">View More<i
						class="p-icon-arrow-long-right"></i></a></h2>
		<div class="owl-carousel owl-theme row cols-lg-3 cols-md-2 cols-1" data-owl-options="{
                        'items': 3,
                        'margin': 20,
                        'loop': false,
                        'nav': false,
                        'dots': true,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '768': {
                                'items': 2
                            },
                            '992': {
                                'items': 3,
                                'dots': false
                            }
                        }
                    }">
			<div class="post overlay-zoom overlay-dark">
				<figure class="post-media">
					<a href="blog-single.html">
						<img src="images/blog/15-400x250.jpg" width="400" height="250" alt="post"/>
					</a>
					<div class="post-calendar">
						18 Feb 2021
					</div>
				</figure>
				<div class="post-details">
					<p class="post-cats"><a href="blog.html">Vegetable</a>,<a href="blog.html">
							Fruit</a></p>
					<h3 class="post-title"><a href="blog-single.html">Aliquam id diam
							maecenas<br>ultricies
							get mauris</a>
					</h3>
					<div class="post-meta">
						<a href="blog.html" class="post-author">
							<img src="images/agents/1.jpg" class="post-agent" width="31" height="31"
							     alt="agent">By<span>Anna</span></a>
						<a href="blog-single.html#post-comments" class="post-comments hash-scroll">
							<i class="p-icon-email"></i>0
						</a>
						<div class="post-share">
							<i class="p-icon-socials"></i>
							<div class="social-links dirVertical">
								<a href="#" class="social-link fab fa-facebook-f"></a>
								<a href="#" class="social-link fab fa-twitter"></a>
								<a href="#" class="social-link fab fa-pinterest"></a>
								<a href="#" class="social-link fab fa-linkedin-in"></a>
							</div>
						</div>
					</div>
					<p class="post-content">Lorem ipsum dolor sit amet,anadipis sed do eiusmod tempor
						incin sed doeiu smod tempo quain...<a href="blog-single.html">(read more)</a>
					</p>
				</div>
			</div>
			<div class="post overlay-zoom overlay-dark">
				<figure class="post-media">
					<a href="blog-single.html">
						<img src="images/blog/16-400x250.jpg" width="400" height="250" alt="post"/>
					</a>
					<div class="post-calendar">
						18 Feb 2021
					</div>
				</figure>
				<div class="post-details">
					<p class="post-cats"><a href="#">Vegetable</a></p>
					<h3 class="post-title"><a href="blog-single.html">Aliquam id diam
							maece</a>
					</h3>
					<div class="post-meta">
						<a href="blog.html" class="post-author">
							<img src="images/agents/2.jpg" class="post-agent" width="31" height="31"
							     alt="agent">By<span>Anna</span></a>
						<a href="blog-single.html#post-comments" class="post-comments hash-scroll">
							<i class="p-icon-email"></i>12
						</a>
						<div class="post-share">
							<i class="p-icon-socials"></i>
							<div class="social-links dirVertical">
								<a href="#" class="social-link fab fa-facebook-f"></a>
								<a href="#" class="social-link fab fa-twitter"></a>
								<a href="#" class="social-link fab fa-pinterest"></a>
								<a href="#" class="social-link fab fa-linkedin-in"></a>
							</div>
						</div>
					</div>
					<p class="post-content">Lorem ipsum dolor sit amet,anadipis sed do eiusmod tempor
						incin sed doeiu smod tempo quain...<a href="blog-single.html">(read more)</a>
					</p>
				</div>
			</div>
			<div class="post overlay-zoom overlay-dark">
				<figure class="post-media">
					<a href="blog-single.html">
						<img src="images/blog/17-400x250.jpg" width="400" height="250" alt="post"/>
					</a>
					<div class="post-calendar">
						18 Feb 2021
					</div>
				</figure>
				<div class="post-details">
					<p class="post-cats"><a href="blog.html">Vegetable</a>,<a href="blog.html">
							Fruit</a></p>
					<h3 class="post-title"><a href="blog-single.html">Aliquam id diam
							maecenas<br>ultricies
							get mauris</a>
					</h3>
					<div class="post-meta">
						<a href="blog.html" class="post-author">
							<img src="images/agents/3.jpg" class="post-agent" width="31" height="31"
							     alt="agent">By<span>Anna</span></a>
						<a href="blog-single.html#post-comments" class="post-comments hash-scroll">
							<i class="p-icon-email"></i>12
						</a>
						<div class="post-share">
							<i class="p-icon-socials"></i>
							<div class="social-links dirVertical">
								<a href="#" class="social-link fab fa-facebook-f"></a>
								<a href="#" class="social-link fab fa-twitter"></a>
								<a href="#" class="social-link fab fa-pinterest"></a>
								<a href="#" class="social-link fab fa-linkedin-in"></a>
							</div>
						</div>
					</div>
					<p class="post-content">Lorem ipsum dolor sit amet,anadipis sed do eiusmod tempor
						incin sed doeiu smod tempo quain...<a href="blog-single.html">(read more)</a>
					</p>
				</div>
			</div>
		</div>
	</section>
@endsection