@php
	$unreadNotifications = \App\Notif::query()->where('user_id',0)->get();

@endphp
		<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin :: {{ env('APP_NAME') }}</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{--Laravel CSRF--}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('plugins/adminlte/adminlte.min.css') }}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
{{--<link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}
<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand bg-dark navbar-light border-bottom">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="{{ route('admin.home') }}" class="nav-link">Home</a>
			</li>
		</ul>

		<!-- SEARCH FORM -->
		<form class="form-inline ml-3" action="{{ route('admin.view.user.results') }}" method="get">
			<div class="input-group input-group-sm">
				<input class="form-control form-control-navbar" type="search" placeholder="Search user"
				       aria-label="Search" name="identifier" required>
				<div class="input-group-append">
					<button class="btn  btn-success" type="submit">
						<i class="fa fa-search"></i>
						Search
					</button>
				</div>
			</div>
		</form>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a class="nav-link" href="{{ route('admin.notifs.show') }}">
					<i class="fa fa-bell-o"></i>
					<span class="badge badge-warning navbar-badge">{{ number_format($unreadNotifications->where('read',false)->count()) }}</span>
				</a>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="{{ route('admin.home') }}" class="brand-link">
			<img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image elevation-3"
			     style="opacity: .8; background-color: white">
			<span class="brand-text font-weight-light">Admin Panel</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="{{ asset('images/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="{{ route('admin.home') }}" class="d-block">{{ auth()->user()->name }}</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
				    data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
					<li class="nav-item has-treeview">
						<a href="{{ route('admin.home') }}" class="nav-link">
							<i class="nav-icon fa fa-dashboard text-warning"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-shopping-basket"></i>
							<p>
								Products
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('admin.department') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Department</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('admin.categories') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Categories</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('admin.sub.categories') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Sub-Categories</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('admin.add.products') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Add Product</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('admin.view.products') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>View Products</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-address-book"></i>
							<p>
								Addresses
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('admin.add.county') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Counties</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('admin.add.town') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Towns</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="{{ route('admin.home') }}" class="nav-link">
							<i class="nav-icon fa fa-list"></i>
							<p>Shopping Lists</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="{{ route('admin.home') }}" class="nav-link">
							<i class="nav-icon fa fa-gift"></i>
							<p>Special Offers</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="{{ route('admin.home') }}" class="nav-link">
							<i class="nav-icon fa fa-users"></i>
							<p>User Management</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-database"></i>
							<p>
								Records
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('admin.sold.records',['period'=>'all','source'=>'Sales Records']) }}"
								   class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Sales Records</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('admin.sold.records',['period'=>'all','source'=>'Unpaid Orders Records']) }}"
								   class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Unpaid Orders Records</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
							<i class="nav-icon fa fa-lock"></i>
							<p>Logout</p>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</a>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@yield('content')
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer text-center">
		<strong>Copyright &copy; {{ date('Y') }} <a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>.</strong>
		All rights reserved.
	</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('plugins/adminlte/adminlte.min.js') }}"></script>
{{--sweet allert--}}
<script src="{{asset('js/sweetalert.js')}}"></script>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
<script>
	$('#editor').ckeditor();
	// $('.textarea').ckeditor(); // if class is prefered.
</script>

@yield('scripts')
<script>
	function processing() {
		$('#processor').addClass('hide');
		$('#processing').removeClass('hide');
	}


	// confirm the withdrawal process
	document.querySelector('#form').addEventListener('submit', function (e) {
		e.preventDefault();

		processing();
		swal({
			title: 'Confirm Action',
			text: 'Are you sure you want to complete this action?',
			showCancelButton: true
		}).then((willPromote) => {
			e.preventDefault();
			if (willPromote.value) {
				this.submit();
			} else {
				swal(
					'Action Cancelled',
					'Your action has been cancelled.',
					'success'
				);
				location.reload();
				e.preventDefault();
				return false;
			}
		});
	});
</script>
@include('sweetalert::alert')
@yield('scripts')
</body>
</html>
