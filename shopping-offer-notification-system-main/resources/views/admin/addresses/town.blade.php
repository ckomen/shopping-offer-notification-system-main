@extends('layouts.admin')

@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Add Town</h1>
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
				<div class="col-md-12 alert alert-info">
					<label>Note</label>
					<p>The Town to be added are the once that mazao is able to deliver.</p>
					<p>A town must be in a county.</p>
				</div>
				<div class="col-md-6">
					<div class="card card-primary card-outline">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">
								<i class="fa fa-line-chart mr-1"></i>Add County</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0">
								<form action="{{ route('admin.post.add.town') }}" method="post">
									@csrf
									<div class="form-group">
										<label>County</label>
										<select class="form-control" name="county_id">
											@foreach($counties as $county)
												<option value="{{$county->id}}">{{$county->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" name="name" required
										       placeholder="Eg. Ruaka">
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success"><i class="fa fa-refresh"></i> Add
											Town
										</button>
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
								<i class="fa fa-line-chart mr-1"></i>Available Town</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0">
								@if($counties->count() > 0)
									<div class="box-body table-responsive no-padding">
										<table class="table table-hover">
											<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>County</th>
											</tr>
											</thead>
											<tbody>
											<?php
											$count = 1;
											?>
											@foreach($towns as $town)
												<tr>
													<th scope="row">{{ $count++ }}</th>
													<td>
														{{ $town->name }}
														<a href="{{ route('admin.delete.town',['id'=>encrypt($town->id)]) }}"
														   class="float-right btn btn-sm btn-danger text-white"> <i
																	class="fa fa-trash"></i> Delete</a>
													</td>
													<td>
														{{ $town->county ? $town->county->name : "N/A" }}
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
													<h3>Sorry. You do not have towns for now.</h3>
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

