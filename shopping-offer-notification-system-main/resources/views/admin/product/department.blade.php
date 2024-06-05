@extends('layouts.admin')

@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">E-commerce Departments</h1>
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
								<i class="fa fa-line-chart mr-1"></i>Add Department</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0">
								<form action="{{ route('admin.post.department') }}" method="post">
									@csrf
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" name="name" required
										       placeholder="Eg. Electronics">
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success"><i class="fa fa-refresh"></i> Add
											Department
										</button>
										<a href="{{ route('admin.categories') }}"
										   class="btn btn-primary float-right"> Add Categories <i
													class="fa fa-arrow-right"></i></a>
									</div>
								</form>
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
								@if($departments->count() > 0)
									<div class="box-body table-responsive no-padding">
										<table class="table table-hover">
											<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
											</tr>
											</thead>
											<tbody>
											<?php
											$count = 1;
											?>
											@foreach($departments as $department)
												<tr>
													<th scope="row">{{ $count++ }}</th>
													<td>
														{{ $department->name }}
														<a href="{{ route('admin.department.delete',['id'=>encrypt($department->id)]) }}"
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

