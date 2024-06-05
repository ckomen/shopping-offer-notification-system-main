@extends('layouts.admin')

@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">E-commerce Add Product</h1>
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
								<i class="fa fa-line-chart mr-1"></i>Add product</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0">
								<div>
									@if($subCategories->count() > 0)
										<form action="{{ route('admin.post.add.products') }}" method="post">
											@csrf
											<div class="row">
												<div class="form-group col-md-6">
													<label>Product Name</label>
													<input type="text" class="form-control" name="name" required
													       placeholder="Eg Camon 11">
												</div>
												<div class="form-group col-md-6">
												<label>Select A Subcategory</label>
												<select class="form-control selectpicker" name="sub_category_id"
												        required data-live-search="true">
													@foreach($subCategories as $subCategory)
														<option value="{{$subCategory->id}}">{{ $subCategory->name }}</option>
													@endforeach
												</select>
											</div>
											</div>


											<div class="row">
												<div class="form-group col-md-3">
													<label>Price</label>
													<input type="number" class="form-control" name="price" required
													       placeholder="eg 10000">
												</div>
												<div class="form-group col-md-3">
													<label>Commission in Percentage (%)</label>
													<input type="text" class="form-control" name="commission" required
													       value="3">
												</div>
												<div class="form-group col-md-3">
													<label>Total Products</label>
													<input type="number" class="form-control" name="total" required
													       placeholder="">
												</div>
												<div class="form-group col-md-3">
													<label>Sold Products</label>
													<input type="number" class="form-control" name="sold" required
													       value="0">
												</div>
											</div>

											<div class="form-group">
												<label>Short Description</label>
												<textarea name="short_description" class="form-control" required
												          placeholder="Product Description"></textarea>
											</div>
											<div class="form-group">
												<label>Full Description and Features [-- optional --]</label>
												<textarea name="description" class="form-control"
												          id="editor"></textarea>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-success"><i
															class="fa fa-refresh"></i> Add Product And Proceed
												</button>
											</div>
										</form>
									@else
										<center>
											<a href="{{ route('admin.sub.categories') }}"
											   class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Add Sub
												Category To proceed</a>
										</center>
									@endif
								</div>
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

