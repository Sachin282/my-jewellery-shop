<?php

	$common = new App\library\CommonUtilities();
	// $usr = $common->getUser
	
	?>

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
							<form method="post" action="{{route('redeem.update')}}">
								@csrf
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<?php $cnt = '0' ?>
										<tr>
										<th>#</th>
										<th>code</th>
										<th>Name</th>
										<th>Email </th>
										<th>Contact no</th>
										<th>Available Gcash</th>
										<th>Requested amount</th>
										<th>Requested Date</th>
										<th>Status</th>
										<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>code</th>
										<th>Name</th>
										<th>Email </th>
										<th>Contact no</th>
										<th>Available Gcash</th>
										<th>Requested amount</th>
										<th>Requested Date</th>
										<th>Status</th>
										<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
									@foreach($Redeems as $Redeem)
										@foreach($users as $user)
											@if($user->id == $Redeem->uid)
												<?php $cnt++; ?>
												@if($Redeem->status == $status)
													<tr>
														<td>{{$cnt}}</td>
														<td>{{$user->code}}</td>
														<td>{{$user->name}}</td>
														<td>{{$user->email}}</td>
														<td>{{$user->phone}}</td>
														<td>{{$user->gcash}}</td>
														<td>{{$Redeem->amount}}</td>
														<td>{{date('d-m-Y H:i:s',strtotime($Redeem->created_at))}}</td>
														<td>{{$Redeem->status}}</td>
														@if($Redeem->status == 'pending')
															<td>
																<select class="selectpicker" name="redeem_status_{{$Redeem->id }}" required>
					                                                <option value="pending" @if($Redeem->status=='pending') selected @endif>Pending</option>
					                                                <option value="approved" @if($Redeem->status=='approved') selected @endif>Approved</option>
					                                                <option value="rejected" @if($Redeem->status=='rejected') selected @endif>Rejected</option>
					                                            </select>
					                                        </td>
					                                        <input type="hidden" name="redeem_id" value="{{$Redeem->id}}">
														@else
															<td>N/A</td>
														@endif
													</tr>
											@elseif($status == 'all')
												<tr>
														<td>{{$cnt}}</td>
														<td>{{$user->code}}</td>
														<td>{{$user->name}}</td>
														<td>{{$user->email}}</td>
														<td>{{$user->phone}}</td>
														<td>{{$user->gcash}}</td>
														<td>{{$Redeem->amount}}</td>
														<td>{{date('d-m-Y H:i:s',strtotime($Redeem->created_at))}}</td>
														<td>{{$Redeem->status}}</td>
														<td>
														@if($Redeem->status == 'pending')
															<select class="selectpicker" name="redeem_status_{{$Redeem->id }}" required>
					                                                <option value="pending" @if($Redeem->status=='pending') selected @endif>Pending</option>
					                                                <option value="approved" @if($Redeem->status=='approved') selected @endif>Approved</option>
					                                                <option value="rejected" @if($Redeem->status=='rejected') selected @endif>Rejected</option>
					                                           </select>
					                                       <input type="hidden" name="redeem_id_{{$Redeem->id}}" value="{{$Redeem->id}}">
														@else
															N/A
														@endif
														</td>
													</tr>
												@endif
											@endif
										@endforeach
									@endforeach
									<tbody>
								</tbody>
								</table>
								@if($status == 'all' || $status == 'pending')
								<div class="text-center">
									<button class="btn btn-primary">Update</button>
								</div>
								@endif
						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	@endsection