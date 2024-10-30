<div class="brand clearfix">
	<a href="dashboard.php" style="font-size: 20px;">Admin Panel</a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> {{ Auth::user()->name }}<i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="{{route('admin.change-password')}}">Change Password</a></li>

					<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
				</ul>
			</li>
		</ul>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
	</div>
