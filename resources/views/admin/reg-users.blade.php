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
							
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<?php $cnt = '1' ?>
										@if($type == 'multiple')
										<tr>
										<th>#</th>
										<th> Name</th>
										<th>Email </th>
										<th>Contact no</th>
										<th>Refference</th>
										<!-- <th>DOB</th> -->
										<th>Address</th>
										<th>City</th>
										<th>Reg Date</th>
										<th>Action</th>
										
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>Name</th>
										<th>Email </th>
										<th>Contact no</th>
										<th>Refference</th>
										<th>Address</th>
										<th>City</th>
										<th>Reg Date</th>
										<th>Action</th>
										</tr>
									</tfoot>
									<tbody>

									@foreach($users as $user)
										<tr>
											<td>{{$cnt}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
											<td>{{$user->phone}}</td>
											<td>{{$user->referred_by}}</td>
											<td>{{$user->address}}</td>
											<td>{{$user->city}}</td>
											<td>{{$user->created_at}}</td>
											<td><a class="btn btn-primary" href="{{route('admin.user',$user->id)}}">edit</a></td>
										</tr>
										@endforeach
									@else
										
									<tbody>
									@foreach($users as $user)
									<form method="post" action="{{route('admin.user.update',$user->id)}}">
											@csrf
										<tr><td width="20%">Code: </td><td><input readonly="" type="text" class="form-control" name="code" value="{{$user->code}}"></td></tr>
										<tr><td>Name: </td><td><input type="text" class="form-control" name="name" value="{{$user->name}}"> </td></tr>
										<tr><td>Email: </td><td><input type="text" class="form-control" name="email" value="{{$user->email}}"> </td></tr>
										<tr><td>Phone Number: </td><td><input type="text" class="form-control" name="phone" value="{{$user->phone}}"></td></tr>
										<tr><td>Referred By : </td><td><input type="text" class="form-control" name="referred_by" value="{{$user->referred_by}}"></td></tr>
										<tr><td>Address: </td><td><input type="text" class="form-control" name="address" value="{{$user->address}}"> </td></tr>
										<tr><td>City: </td><td><input type="text" class="form-control" name="city" value="{{$user->city}}"> </td></tr>
										<tr><td>Zip: </td><td><input type="text" class="form-control" name="zip" value="{{$user->zip}}"> </td></tr>
										<tr><td>GCash: </td><td><input type="text" class="form-control" name="gcash" value="{{$user->gcash}}"> </td></tr>
										<tr><td>Status</td>
											<td>
												<select class="form-control" name="status" required>
													<option value="active" @if($user->status =='active') selected @endif>active</option>
													<option value="inactive" @if($user->status =='inactive') selected @endif>inactive</option>
												</select>
											</td>
										</tr>

										<tr><td>Reg Date : </td><td><input type="text" readonly="" class="form-control" name="created_at" value="{{$user->created_at}}"> </td></tr>
										<tr><td colspan="100%"><button class="form-control btn btn-primary">Update</button></td></tr>
									</form>
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