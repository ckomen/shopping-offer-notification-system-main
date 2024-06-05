@extends('layouts.admin')

@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">E-commerce Products Search Results</h1>
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
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0">
								<center>
									Showing <strong>{{$products->count()}} </strong> records of
									<strong>{{ $products->total() }}</strong>
								</center>
								<div class="row">
									@foreach($products as $product)
										<div class="col-md-3">
											<center>
												<img src=" {{ $product->images()->first()? asset($product->images()->first()->image) : asset('images/Product-Image-Coming-Soon.jpg') }}"
												     height="200" width="200">
												<br>
												<br>
												{{ $product->name }}
											</center>
											<hr>
											<a href="{{ route('admin.add.products.images',['id'=>$product->id]) }}"
											   class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>
											<a href="{{ route('admin.add.products.images',['id'=>$product->id]) }}"
											   class="btn btn-sm btn-warning"><i class="fa fa-camera"></i> Images
												({{number_format($product->images()->count())}})</a>
											<a href="{{ route('admin.delete.product',['id'=>$product->id]) }}"
											   class="btn btn-sm btn-danger float-right"><i class="fa fa-trash"></i>
												Delete</a>
										</div>
									@endforeach
								</div>
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

