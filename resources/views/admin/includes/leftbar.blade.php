
	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="{{route('admin.users')}}"><i class="fa fa-users"></i> Reg Users</a></li>
				<li><a href=""><i class="fa fa-users"></i>Manage Jewellery</a>
									<ul>
				<li><a href="{{route('jewellery.manage')}}"><i class="fa fa-users"></i>Jewellery</a>
						<li><a href="{{Route('installment.manage')}}"><i class="fa fa-users"></i>Installment</a></li>
					</ul>
									</li>
				<li><a href=""><i class="fa fa-files-o"></i> Orders</a>
					<ul>
						<li><a href="{{Route('order.pending')}}">Pending</a></li>
						<li><a href="{{Route('order.running')}}">Running</a></li>
						<li><a href="{{Route('order.completed')}}">Completed</a></li>
					</ul></li>
			
<!-- <li><a href="#"><i class="fa fa-sitemap"></i> Vehicles</a> -->
<li><a href="#"><i class="fa fa-money"></i> Gcash</a>
<ul>
<li><a href="{{Route('gcash.all')}}">User GCash</a></li>
<li><a href="{{Route('discount.manage')}}">Manage discount</a></li>
</ul>
</li>
<li><a href="#"><i class="fa fa-book"></i>Redeemed</a>
<ul>
<li><a href="{{Route('redeem','Pending')}}">Requested</a></li>
<li><a href="{{Route('redeem','Approved')}}">Approved</a></li>
<li><a href="{{Route('redeem','Rejected')}}">Rejected</a></li>
<li><a href="{{Route('redeem','All')}}">All</a></li>
</ul>
</li>
<li><a href="#"><i class="fa fa-table"></i>Passbook</a>
<ul>
<li><a href="{{Route('passbook.manage','Incomming')}}">Incomming</a></li>
<li><a href="{{Route('passbook.manage','Outgoing')}}">Outgoing</a></li>
</ul>
</li>

<!-- 					<ul>
						<li><a href="post-avehical.php">Post a Vehicle</a></li>
						<li><a href="manage-vehicles.php">Manage Vehicles</a></li>
					</ul>
				</li>
				<li><a href="manage-bookings.php"><i class="fa fa-users"></i> Manage Booking</a></li>

				<li><a href="testimonials.php"><i class="fa fa-table"></i> Manage Testimonials</a></li>
				<li><a href="manage-conactusquery.php"><i class="fa fa-desktop""></i> Manage Conatctus Query</a></li>
				
			<li><a href="manage-pages.php"><i class="fa fa-files-o"></i> Manage Pages</a></li>
			<li><a href="update-contactinfo.php"><i class="fa fa-files-o"></i> Update Contact Info</a></li>

			<li><a href="manage-subscribers.php"><i class="fa fa-table"></i> Manage Subscribers</a></li> -->
			<li><a href="{{route('admin.change-password')}}"><i class="fa fa-key"></i>Change Password</a></li>
			<!-- <li><a href="change-password.php"><i class="fa fa-table"></i>Send Mail</a></li> -->
			<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-arrow-left"></i>{{ __('Logout') }}</a></li>
			</ul>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
		</nav>