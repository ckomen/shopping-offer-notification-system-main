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
		<ol class="breadcrumb">
			<li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Mailbox</li>
		</ol>
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
			<div class="col-md-9">
				<div class="card card-success card-outline">
					<div class="card-header">
						<h3 class="card-title">Inbox</h3>
						<div class="pull-right">
							{{$allNotifs->links() }}
						</div>
					</div>
					<!-- /.box-header -->
					<div class="card-body no-padding">
						<div class="table-responsive mailbox-messages">
							@if($all->count() >  0)
								<table class="table table-hover table-striped">
									<tbody>
									@foreach($allNotifs as $notif)
										<tr>
											<td>
												<i class="fa {{ $notif->read ? 'fa-envelope-open text-success' : 'fa-envelope text-primary' }}"></i>
											</td>
											<td class="mailbox-name"><a
														href="{!! route('admin.notifs.read',['id'=>$notif->id])  !!} ">{!! $notif->sender_id == 0 ? "Customer Support" : \App\Http\Controllers\HomeController::userData($notif->sender_id)  !!} </a>
											</td>
											<td class="mailbox-subject"><b>{{$notif->subject}}</b>
												- {!!  (strlen($notif->message) > 60) ? substr($notif->message, 0, 60).'...' : $notif->message  !!}
											</td>
											<td class="mailbox-date">{{ \App\Http\Controllers\PageController::elapsedTime($notif->created_at) }}</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							@else
								<div class="col-md-12">
									<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
											&times;
										</button>
										<h5><i class="icon fa fa-ban"></i> Empty Inbox!</h5>
										You you have not received a message for now.
									</div>
								</div>
						@endif
						<!-- /.table -->
						</div>
						<!-- /.mail-box-messages -->
					</div>
					<!-- /.box-body -->
					<div class="card-footer">
						<div class="mailbox-controls">
							<div class="pull-right">
								<div class="btn-group">
									{{$allNotifs->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /. box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
@endsection