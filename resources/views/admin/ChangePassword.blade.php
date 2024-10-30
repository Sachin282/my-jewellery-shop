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

						<h2 class="page-title">Password Management</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Change Password</div>
							<div class="panel-body">
								@if(isset($success) && !empty($success))
									<div class="alert alert-success">{{$success}}</div>
								@elseif(isset($error) && !empty($error))
									<div class="alert alert-danger">{{$error}}</div>
								@endif
							
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									
										
									<tbody>
									<form method="post" action="{{route('admin.password.update')}}">
											@csrf
										<tr><td width="20%">Old Password: </td><td><input type="text" class="form-control" name="opassword" ></td></tr>
										<tr><td width="20%">New Password: </td><td><input type="text" class="form-control" name="password" ></td></tr>
										<tr><td width="20%">Confirm Old Password: </td><td><input type="text" class="form-control" name="cpassword" ></td></tr>
										<tr><td colspan="100%"><button class="form-control btn btn-primary">Update</button></td></tr>
									</form>	
								</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	@endsection