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
									@if($id == '')
										<tr>
										<th>#</th>
										<th>UserCode</th>
										<th>Name</th>
										<th>Email</th>
										<th>Contact no</th>
										<!-- <th>DOB</th> -->
										<th>GCash</th>
										<th>view</th>
										<th>Status</th>
										<th>Reg Date</th>
										
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>CodeID</th>
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

									@foreach($data as $user)
									<?php $cnt++; ?>
										<tr>
											<td>{{$cnt}}</td>
											<td>{{$user->code}}</td>
											<td><a href="{{Route('admin.user', $user->id)}}">{{$user->name}}</a></td>
											<td>{{$user->email}}</td>
											<td>{{$user->phone}}</td>
											<td>{{$user->gcash}}</td>
											<td><a href="#">view</a></td>
											<td>{{$user->status}}</td>
											<td>{{$user->created_at}}</td>
										</tr>
										@endforeach
								@elseif($id == 'running')
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
									<?php $cnt++; ?>
										<tr>
											<td>{{$cnt}}</td>
											<td>{{$RunningOrder->order_id}}</td>
											<td>{{$RunningOrder->name}}</td>
											<td>{{$RunningOrder->email}}</td>
											<td>{{$RunningOrder->phone}}</td>
											<td>{{$RunningOrder->pending_installment}}</td>
											<td>{{$RunningOrder->weight}}</td>
											<td>{{$RunningOrder->price}}</td>
											<td>Running</td>
											<td>{{$RunningOrder->created_at}}</td>
										</tr>
										@endforeach
								@elseif($id == 'completed')
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
									<?php $cnt++; ?>
										<tr>
											<td>{{$cnt}}</td>
											<td>{{$CompletedOrder->order_id}}</td>
											<td>{{$CompletedOrder->name}}</td>
											<td>{{$CompletedOrder->email}}</td>
											<td>{{$CompletedOrder->phone}}</td>
											<td>{{$CompletedOrder->weight}}</td>
											<td>{{$CompletedOrder->price}}</td>
											<td>Completed</td>
											<td>{{$CompletedOrder->created_at}}</td>
										</tr>
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