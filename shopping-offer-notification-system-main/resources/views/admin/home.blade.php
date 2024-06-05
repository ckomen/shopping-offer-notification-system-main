@extends('layouts.admin')

@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
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
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-info"><i class="fa fa-money"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Sales</span>
							<span class="info-box-number">KES {{ number_format($data->sales->sold_amount) }}</span>
						</div>
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-success"><i class="fa fa-briefcase"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Products</span>
							<span class="info-box-number">{{ number_format($data->products->all) }} </span>
						</div>
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-warning"><i class="fa fa-shopping-cart"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Open Carts</span>
							<span class="info-box-number"> {{ number_format($data->sales->open_carts) }} </span>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-primary"><i class="fa fa-list"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Items Sold</span>
							<span class="info-box-number">
								{{ number_format($data->sales->sold_products) }}
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
				<div class="card card-success card-outline">
					<div class="card-header">
						<h3 class="card-title">Quick Access</h3>
					</div>
					<!-- /.box-header -->
					<div class="card-body ">
						<div class="table-responsive mailbox-messages">
							<table class="table table-hover table-striped">
								<tbody>
								<tr>
									<th>Sales Records</th>
									<td class="text-success">
										<div class="col-md-8">
											<a href="{{ route('admin.sold.records',['period'=>'all','source'=>'Sales Records']) }}"
											   class="btn btn-block btn-success btn-sm"><i class="fa fa-money"></i> View
												Sales Records ({{ number_format($data->orders->sold) }})</a>
										</div>
									</td>
								</tr>
								<tr>
									<th>Unpaid Orders</th>
									<td class="text-success">
										<div class="col-md-8">
											<a href="{{ route('admin.sold.records',['period'=>'all','source'=>'Unpaid Orders Records']) }}"
											   class="btn btn-block btn-info btn-sm"><i
														class="fa fa-shopping-basket"></i> View Unpaid Orders
												({{ number_format($data->orders->unpaid) }})</a>
										</div>
									</td>
								</tr>
								<tr>
									<th>Dispatch Orders</th>
									<td class="text-success">
										<div class="col-md-8">
											<a href="{{ route('admin.sold.records',['period'=>'all','source'=>'Package Orders to be Delivered']) }}"
											   class="btn btn-block btn-primary btn-sm"><i
														class="fa fa-cab"></i> Package Orders to be Delivered
												<strong class="text-warning">({{ number_format($data->orders->dispatch) }}
													)</strong>
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<th>Ready For Pick-up</th>
									<td class="text-success">
										<div class="col-md-8">
											<a href="{{ route('admin.sold.records',['period'=>'all','source'=>'Ready For Pick-up']) }}"
											   class="btn btn-block btn-info btn-sm">
												<i class="fa fa-shopping-basket"></i> View Orders
												({{ number_format($data->orders->ready_for_pickup) }})</a>
										</div>
									</td>
								</tr>
								<tr>
									<th>Delivered Orders</th>
									<td class="text-success">
										<div class="col-md-8">
											<a href="{{ route('admin.sold.records',['period'=>'all','source'=>'Delivered']) }}"
											   class="btn btn-block btn-sm btn-success"><i
														class="fa fa-shopping-basket"></i> view Orders
												({{ number_format($data->orders->delivered) }})</a>
										</div>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
						<!-- /.mail-box-messages -->
					</div>
				</div>
				<!-- /. box -->
			</div>
		</div>
	</section>
@endsection

