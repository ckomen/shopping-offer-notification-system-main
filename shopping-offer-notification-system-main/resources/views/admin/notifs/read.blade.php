@extends('layouts.admin')
@php
	$notifs = \App\Notif::where('user_id',0);
		$unreadNotifications = $notifs->where('read',false);
		$all = \App\Notif::query()->where('user_id',0)->get();
@endphp
@section('content')
	<section class="content-header">
		<h1>
			Mailbox
			@if($unreadNotifications->count() > 0)
				<small>{{$unreadNotifications->count()}} new messages</small>
			@endif
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-3">
				<div class="card card-outline card-primary">
					<div class="card-header with-border">
						<h3 class="card-title">Folders</h3>
					</div>
					<div class="card-body">
						<ul class="nav nav-pills flex-column">
							<li class="nav-link">
								<a href="{{ route('admin.notifs.show') }}"><i class="fa fa-bell"></i> Inbox
									@if($unreadNotifications->count() > 0)
										<span class="badge badge-primary pull-right">{{$unreadNotifications->count()}}</span>
									@endif
								</a></li>
							<li class="nav-link">
								<a href="{{ route('admin.notifs.all') }}"><i class="fa fa-inbox"></i> All
									@if($all->count() > 0)
										<span class="badge-primary badge pull-right">{{$all->count()}}</span>
									@endif
								</a></li>
							<li>
						</ul>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
			<!-- /.col -->

			<!-- /.col -->
			<div class="col-md-9">
				<div class="card card-success card-outline">
					<div class="card-header">
						<h3 class="card-title">Read Mail</h3>
					</div>
					<!-- /.box-header -->
					<div class="card-body">
						<div class="mailbox-read-info">
							<h3><strong>{{ $notif->subject }}</strong></h3>
							<h5>
								From: {{ $notif->sender_id == 0 ? "Customer Support":\App\Http\Controllers\HomeController::userData($notif->sender_id)->username}}
								<span class="mailbox-read-time pull-right">{{ \App\Http\Controllers\PageController::elapsedTime($notif->created_at) }}</span>
							</h5>
						</div>
						<!-- /.mailbox-read-info -->
						<!-- /.mailbox-controls -->
						<div class="mailbox-read-message">
							<p>Hello {{ auth()->user()->name }},</p>

							{!! $notif->message !!}

							<p>
								<br>
								Thanks,<br>{{ $notif->sender_id == 0 ? "Customer Support" : \App\Http\Controllers\HomeController::userData($notif->sender_id)->username}}
							</p>
						</div>
						<!-- /.mailbox-read-message -->
					</div>
					<!-- /.box-footer -->
					<div class="card-footer">
						{{--<div class="pull-right">--}}
						{{--<button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>--}}
						{{--<button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>--}}
						{{--</div>--}}
						{{--<button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>--}}
						{{--<button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>--}}
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /. box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
@endsection