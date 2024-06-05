@extends('layouts.admin')

@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">E-commerce Product Images</h1>
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
								<i class="fa fa-line-chart mr-1"></i>Add Images</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0">
								<div class="col-md-6 offset-md-3">
									<form action="{{ route('admin.upload.images') }}" method="post"
									      enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<center>
												<label>Product Name:</label>
												{{$product->name}}
											</center>
										</div>
										<div class="form-group">
											<label>Upload Image [png,jpg,jpeg,gif,ico]</label>
											<input name="image" type="file" class="form-control" required>
											@if(count($errors->all()) > 0)
												<span class="invalid-feedback text-danger">
                                        <strong>Wrong File Format</strong>
                                    </span>
											@endif
											<input name="product_id" type="number" value="{{ $product->id }}" hidden>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-success"><i class="fa fa-camera"></i>
												Upload Image
											</button>
											<a href="{{ route('admin.add.products') }}"
											   class="btn btn-primary float-right"><i class="fa fa-shopping-basket"></i>
												Add More Products</a>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- /.box -->
					</div>
				</div>
				@if($product->images()->get()->count() > 0)
					<div class="col-md-12">
						<div class="card card-success card-outline">
							<div class="card-header d-flex p-0">
								<h3 class="card-title p-3">
									<i class="fa fa-line-chart mr-1"></i>Uploaded Images</h3>
							</div><!-- /.card-header -->
							<div class="card-body">
								<div class="tab-content p-0">
									<div class="row">
										@foreach($product->images()->get() as $product)
											<div class="col-md-3">
												<img src="{{ asset($product->image) }}" class="image img-responsive"
												     height="200" width="300">
												<hr>
												<a href="{{ route('admin.delete.image',['id'=>$product->id]) }}"
												   class="float-right btn btn-sm btn-danger"><i class="fa fa-trash"></i>
													Delete</a>
												<br>
												<br>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</section>
	<!-- /.content -->
@endsection

