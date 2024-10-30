@extends('admin.layouts.layout')

	@section('content')
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Registered Users</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Reg Users</div>
							<div class="panel-body">
							
								<table id="zctb" class="display table-responsive table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
									<?php $cnt = 0 ?>
									@if($view == 'pending')
										<tr>
										<th>#</th>
										<th>OrderID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Contact no</th>
										<!-- <th>DOB</th> -->
										<th>Gold Weight(gms)</th>
										<th>Total Price</th>
										<th>Status</th>
										<th>Reg Date</th>
										
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>OrderID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Contact no</th>
										<!-- <th>DOB</th> -->
										<th>Gold Weight(gms)</th>
										<th>Total Price</th>
										<th>Status</th>
										<th>Reg Date</th>
										</tr>
									</tfoot>
									<tbody>

									@foreach($data as $PendingOrder)
									@foreach($users as $user)
										@if($user->id == $PendingOrder->uid)
									<?php $cnt++; ?>
										<tr>
											<td>{{$cnt}}</td>
											<td>{{$PendingOrder->order_id}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
											<td>{{$user->phone}}</td>
											<td>{{$PendingOrder->weight}}</td>
											<td>{{$PendingOrder->price}}</td>
											<td>Pending</td>
											<td>{{$PendingOrder->created_at}}</td>
										</tr>
										@endif
										@endforeach
										@endforeach
								@elseif($view == 'running')
										<tr>
										<th>#</th>
										<th>OrderID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Contact no</th>
										<th>Pending Installments</th>
										<th>Gold Weight(gms)</th>
										<th>Total Price</th>
										<th>Status</th>
										<th>Reg Date</th>
										
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>OrderID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Contact no</th>
										<th>Pending Installments</th>
										<th>Gold Weight(gms)</th>
										<th>Total Price</th>
										<th>Status</th>
										<th>Reg Date</th>
										</tr>
									</tfoot>
									<tbody>

									@foreach($data as $RunningOrder)
									@foreach($users as $user)
										@if($user->id == $RunningOrder->uid)
									<?php $cnt++; ?>
										<tr>
											<td>{{$cnt}}</td>
											<td>{{$RunningOrder->order_id}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
											<td>{{$user->phone}}</td>
											<td>{{$RunningOrder->pending_installment}}</td>
											<td>{{$RunningOrder->weight}}</td>
											<td>{{$RunningOrder->price}}</td>
											<td>Running</td>
											<td>{{$RunningOrder->created_at}}</td>
										</tr>
										@endif
										@endforeach
										@endforeach
								@elseif($view == 'completed')
										<tr>
										<th>#</th>
										<th>OrderID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Contact no</th>
										<!-- <th>DOB</th> -->
										<th>Gold Weight(gms)</th>
										<th>Total Price</th>
										<th>Status</th>
										<th>Reg Date</th>
										
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>OrderID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Contact no</th>
										<!-- <th>DOB</th> -->
										<th>Gold Weight(gms)</th>
										<th>Total Price</th>
										<th>Status</th>
										<th>Reg Date</th>
										</tr>
									</tfoot>
									<tbody>

									@foreach($data as $CompletedOrder)
									@foreach($users as $user)
										@if($user->id == $CompletedOrder->uid)
									<?php $cnt++; ?>
										<tr>
											<td>{{$cnt}}</td>
											<td>{{$CompletedOrder->order_id}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
											<td>{{$user->phone}}</td>
											<td>{{$CompletedOrder->weight}}</td>
											<td>{{$CompletedOrder->price}}</td>
											<td>Completed</td>
											<td>{{$CompletedOrder->created_at}}</td>
										</tr>
										@endif
										@endforeach
										@endforeach
								@endif
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	@endsection