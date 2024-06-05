@extends('layouts.admin')

@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">E-commerce Sub Categories</h1>
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
				<div class="col-md-6">
					<div class="card card-primary card-outline">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">
								<i class="fa fa-line-chart mr-1"></i>Add Sub Categories</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0">
								@if($categories->count() > 0)
									<form action="{{ route('admin.post.sub.categories') }}" method="post">
										@csrf
										<div class="form-group">
											<label>Select A Category</label>
											<select class="form-control" name="category_id" required>
												@foreach($categories as $category)
													<option value="{{$category->id}}">{{ $category->name }}</option>
												@endforeach
											</select>
										</div>

										<div class="form-group">
											<label>Name</label>
											<input type="text" class="form-control" name="name" required
											       placeholder="Eg Techno">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-success"><i class="fa fa-refresh"></i>
												Add Sub-Categories
											</button>
											<a href="{{ route('admin.add.products') }}"
											   class="btn btn-primary float-right">Add Products<i
														class="fa fa-arrow-right"></i></a>
										</div>
									</form>
								@else
									<center>
										<a href="{{ route('admin.categories') }}" class="btn btn-success btn-sm"><i
													class="fa fa-refresh"></i> Add Category To proceed</a>
									</center>
								@endif
							</div>
						</div>
						<!-- /.box -->
					</div>
				</div>
				<div class="col-md-6">
					<div class="card card-success card-outline">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">
								<i class="fa fa-line-chart mr-1"></i>Available Sub-Categories</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0">
								@if($subCategories->count() > 0)
									<div class="box-body table-responsive no-padding">
										<table class="table table-hover">
											<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Category</th>
											</tr>
											</thead>
											<tbody>
											<?php
											$count = 1;
											?>
											@foreach($subCategories as $subCategory)
												<tr>

													<th scope="row">{{ $count++ }}</th>
													<td>{{ $subCategory->name }}</td>
													<td>
														{{ $subCategory->category->name }}
														<a href="{{ route('admin.sub-category.delete',['id'=>encrypt($subCategory->id)]) }}"
														   class="float-right btn btn-sm btn-danger text-white"> <i
																	class="fa fa-trash"></i> Delete</a>
													</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
									<!-- /.box-body -->
								@else
									<div class="row">
										<div class="col-md-12">
											<div class="text-danger text-center">
												<center>
													<h3>Sorry. You do not have sub-categories for now.</h3>
												</center>
												<br>
												<br>
											</div>
										</div>
									</div>
								@endif
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

