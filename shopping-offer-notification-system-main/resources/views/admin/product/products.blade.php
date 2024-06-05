@extends('layouts.admin')

@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">E-commerce Available Products</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->
	<div class="row">
		<div class="col-md-6 offset-md-3">
			@include('inc.messages')
		</div>
	</div>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary card-outline">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">
								<i class="fa fa-line-chart mr-1"></i>Products</h3>
							<form class="form-inline ml-3 float-right" action="{{ route('admin.search.products') }}"
							      method="get">
								@csrf
								<div class="input-group input-group-sm">
									<input class="form-control form-control-navbar" type="search"
									       placeholder="Search Products"
									       aria-label="Search" name="identifier" required>
									<div class="input-group-append">
										<button class="btn  btn-success" type="submit">
											<i class="fa fa-search"></i>
											Search
										</button>
									</div>
								</div>
							</form>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0 row">
								@foreach($products as $product)
									<div class="col-md-3">
										<center>
											@if($product->images()->first())
												<img src="{{ asset($product->images()->first()->image) }}" height="200"
												     width="200">
											@endif
											<br>
											<br>
											{{ $product->name }}
										</center>
										<hr>
										<a href="{{ route('admin.add.products.edit',['id'=>encrypt($product->id)]) }}"
										   class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit Product</a>
										<a href="{{ route('admin.add.products.images',['id'=>$product->id]) }}"
										   class="btn btn-sm btn-warning float-right"><i class="fa fa-camera"></i>
											Edit Images
											({{number_format($product->images()->count())}})</a>
										{{--<a href="{{ route('ecommerce.delete.product',['id'=>$product->id]) }}"--}}
										{{--class="btn btn-sm btn-danger float-right"><i class="fa fa-trash"></i> Delete</a>--}}
									</div>
								@endforeach

								<center>
									{{ $products->links() }}
								</center>
							</div>
						</div>
						<!-- /.box -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
@endsection

