@extends('layouts.admin')

@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">E-commerce Categories</h1>
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
								<i class="fa fa-line-chart mr-1"></i>Add Categories</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0">
								@if($departments->count() > 0)
									<form action="{{ route('admin.post.categories') }}" method="post">
										@csrf
										<div class="form-group">
											<label>Select A Department</label>
											<select class="form-control" name="department_id" required>
												@foreach($departments as $department)
													<option value="{{$department->id}}">{{ $department->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<label>Name</label>
											<input type="text" class="form-control" name="name" required
											       placeholder="Eg Smart phones ">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-success"><i class="fa fa-refresh"></i>
												Add Categories
											</button>
											<a href="{{ route('admin.sub.categories') }}"
											   class="btn btn-primary float-right">Add Sub-Categories <i
														class="fa fa-arrow-right"></i></a>
										</div>
									</form>
								@else
									<center>
										<a href="{{ route('admin.department') }}" class="btn btn-success btn-sm"><i
													class="fa fa-refresh"></i> Add Departments To proceed</a>
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
								<i class="fa fa-line-chart mr-1"></i>Available Categories</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0">
								@if($categories->count() > 0)
									<div class="box-body table-responsive no-padding">
										<table class="table table-hover">
											<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Department</th>
											</tr>
											</thead>
											<tbody>
											<?php
											$count = 1;
											?>
											@foreach($categories as $category)
												<tr>
													<th scope="row">{{ $count++ }}</th>
													<td>
														{{ $category->name }}
													</td>
													<td>
														{{ $category->department->name }}
														<a href="{{ route('admin.categories.delete',['id'=>encrypt($category->id)]) }}"
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
													<h3>Sorry. You do not have categories for now.</h3>
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

