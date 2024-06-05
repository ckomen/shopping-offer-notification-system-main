@extends('layouts.admin')
<?php
$count = 1;
?>
@section('content')

	<section class="content-header">
		<h1 class="text-center">
			{{ $source }}
			<strong class="font-weight-bold text-success">{{ $period != 'all' ? " For $period":''  }}</strong>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-success">
					@if(count($transactions) > 0)
						<div class="card-header">
							<h3 class="text-center">
								<div class="float-right">
									<form method="post" action="{{ route('admin.sort.sales') }}">
										@csrf
										<div class="row">
											<div class="form-group col-md-8">
												<input class="date form-control"
												       placeholder="Choose date"
												       type="text"
												       autocomplete="off"
												       name="period"
												       id="date"
												       required>
												<input name="source" value="{{$source}}" hidden>
											</div>
											<div class="form-group col-md-4">
												<button type="submit" class="btn btn-primary" onclick="loading()">
													<i class="fa fa-refresh"></i> Get Records
												</button>
											</div>
										</div>
									</form>
								</div>
								Showing <strong>{{ count($transactions) }}</strong> transactions of
								<strong>{{ $transactions->total() }}</strong>
							</h3>

							<div class="card-tools">
								<div class="pull-right">{{ $transactions->links() }}</div>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="card-body table-responsive">
							<table class="table table-hover">
								<thead>
								<tr>
									<th></th>
									<th>Buyer</th>
									<th>Cart Number</th>
									<th>Products</th>
									<th>Total Price</th>
									@if($source != 'Sales Records')
									<th>Status</th>
									@endif
									<th>Date</th>
								</tr>
								</thead>
								<tbody>
								@foreach($transactions as $transaction)
									<tr>
										<th scope="row">
											{{ $count++ }}
										</th>
										<td>
											<a href="{{ route('admin.user.by.id',['id'=>$transaction->user->id]) }}">
												{{$transaction->user->name}} - {{$transaction->user->phone_number}}
											</a>
											<?php
											$address = $transaction->user->addresses()->where('default', true)->first();
											?>
											@if($address)
												<hr>
												<p class="font-weight-bold"> Delivery Details</p>
												<span class="font-weight-bold">{{$address->first_name}} {{ $address->last_name }}</span>
												<br>
												<span>
											{{$address->address}}{{ $address->town}} {{ $address->county ? ", ".$address->county->name."." : "" }}
													<br>
													{{$address->phone_number}}

										</span>
											@else
												<br>
												<br>
												<p class="text-danger font-weight-bold">No delivery address found!</p>
											@endif
										</td>
										<th>MCBO#{{$transaction->id}}</th>
										<th>
											<a href="#" class="btn btn-primary btn-sm"
											   onclick="viewProducts({{$transaction->id}})">
												<i class="fa fa-eye"></i> View Products
											</a>
										</th>
										<td>
											KES {{number_format($transaction->total_price)}}
										</td>
										@if($source != 'Sales Records')
											<td>
												@if($source == "Package Orders to be Delivered")
													<a href="{{ route('admin.change.order.status',['field'=>'dispatched','status'=>1,'cartID'=>$transaction->id]) }}"
													   class="btn btn-sm btn-primary">
														<i class="fa fa-car"></i> Send For Delivery
													</a>
												@elseif($source == "Unpaid Orders Records")
												<span class="badge badge-primary">
													<i class="fa fa-spin fa-spinner"></i> Payment Pending
												</span>
												@elseif($source == "Delivered")
													<span class="badge badge-success">
													<i class="fa fa-check"></i> Order Delivered and Completed
												</span>
												@elseif($source == "Ready For Pick-up")
													<a href="{{ route('admin.change.order.status',['field'=>'delivered','status'=>1,'cartID'=>$transaction->id]) }}"
													   class="btn btn-sm btn-primary">
														<i class="fa fa-car"></i> Mark As Delivered
													</a>
											@endif
										</td>
										@endif
										<td>{{ \App\Http\Controllers\PageController::elapsedTime($transaction->created_at) }}</td>
									</tr>
									<div class="modal fade" id="cartContent{{$transaction->id}}" tabindex="-1"
									     role="dialog"
									     aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
									     data-backdrop="static" data-keyboard="false">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-body"
												     style="width: 100%!important; background-size: contain; background-repeat:no-repeat;">
													<div class="col-md-12">
														<button type="button" class="btn btn-danger float-right"
														        style="padding: 5px!important;"
														        data-dismiss="modal"
														        aria-label="Close">

															<span aria-hidden="true">&times;</span> Close
														</button>
														<br><br>
													</div>
													<center>
														<div class="col-md-12">
															<h3 class="font-weight-bold"> {{$transaction->user->name}}'s
																Order.</h3>
															<br>
														</div>

														@foreach($transaction->cartContents as $content)
															@if(!$content->product)
																@continue
															@endif
															<div class="row">
																<div class="col-md-6">
																	<img src="{{ $content->images()->first() ? asset($content->images()->first()->image) : asset('images/Product-Image-Coming-Soon.jpg') }}"
																	     class="img-responsive"
																	     style="height: 100px!important;">
																</div>
																<div class="col-md-6">
																	<br>
																	<p>{{ $content->product->name }}</p>
																	<p class="text-success">
																		KES {{ number_format($content->product->price) }}
																		<span style="color: black!important;">||  Quantity: {{ number_format($content->quantity) }}</span>
																	</p>
																	<p class="text-success font-weight-bold">Total:
																		KES {{ number_format($content->total_price) }}</p>
																</div>
															</div>
															<div class="col-md-12">
																<hr>
															</div>
														@endforeach
													</center>
												</div>
											</div>
										</div>
									</div>
								@endforeach
								</tbody>
							</table>
							<!-- /.box-body -->
							@else
								<div class=" text-danger text-center">
									<center>
										<br>
										<br>
										<br>
										<h3>Sorry. You do not have purchase transactions for now.</h3>
										<a href="{{ route('admin.home') }}" class="btn btn-success"
										   style="padding-top: -120px">Go Back</a>
									</center>
									<br>
									<br>
								</div>
							@endif
						</div>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript">
		$('.date').datepicker({
			format: 'yyyy-mm-dd'
		});

		function viewProducts(id) {
			$(document).ready(function () {
				$("#cartContent" + id).modal('show');
			});
		}
	</script>
@endsection

@section('scripts')
	{{--date chooser--}}

@endsection