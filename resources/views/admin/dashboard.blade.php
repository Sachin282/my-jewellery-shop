@extends('admin.layouts.layout')

	@section('content')
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">{{$userCount}}</div>
													<div class="stat-panel-title text-uppercase">Reg Users</div>
												</div>
											</div>
											<a href="{{route('admin.users')}}" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">{{$pendingOrderCount}}</div>
													<div class="stat-panel-title text-uppercase">Pending Orders</div>
												</div>
											</div>
											<a href="manage-vehicles.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">{{$totalBooking}}</div>
													<div class="stat-panel-title text-uppercase">Total Bookings</div>
												</div>
											</div>
											<a href="manage-bookings.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
<?php 
// $sql3 ="SELECT id from tblbrands ";
// $query3= $dbh -> prepare($sql3);
// $query3->execute();
// $results3=$query3->fetchAll(PDO::FETCH_OBJ);
// $brands=$query3->rowCount();
?>												
													<div class="stat-panel-number h1 "><?php
													 // echo htmlentities($brands);?></div>
													<div class="stat-panel-title text-uppercase">Listed Brands</div>
												</div>
											</div>
											<a href="manage-brands.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>



<div class="row">
					<div class="col-md-12">

						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
// $sql4 ="SELECT id from tblsubscribers ";
// $query4 = $dbh -> prepare($sql4);
// $query4->execute();
// $results4=$query4->fetchAll(PDO::FETCH_OBJ);
// $subscribers=$query4->rowCount();
?>
													<div class="stat-panel-number h1 "><?php 
													// echo htmlentities($subscribers);?></div>
													<div class="stat-panel-title text-uppercase">Subscibers</div>
												</div>
											</div>
											<a href="manage-subscribers.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
// $sql6 ="SELECT id from tblcontactusquery ";
// $query6 = $dbh -> prepare($sql6);;
// $query6->execute();
// $results6=$query6->fetchAll(PDO::FETCH_OBJ);
// $query=$query6->rowCount();
?>
													<div class="stat-panel-number h1 "><?php
													 // echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Queries</div>
												</div>
											</div>
											<a href="manage-conactusquery.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php 
// $sql5 ="SELECT id from tbltestimonial ";
// $query5= $dbh -> prepare($sql5);
// $query5->execute();
// $results5=$query5->fetchAll(PDO::FETCH_OBJ);
// $testimonials=$query5->rowCount();
?>

													<div class="stat-panel-number h1 "><?php
													 // echo htmlentities($testimonials);?></div>
													<div class="stat-panel-title text-uppercase">Testimonials</div>
												</div>
											</div>
											<a href="testimonials.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection