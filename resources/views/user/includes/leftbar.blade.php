<?php 

    $activePage = Request::segment(1);

 ?>
    <div class="sidebar" data-color="orange"><!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
        <div class="logo">
            <a href="http://www.sai-jewellers.com/" class="simple-text logo-mini">SJ</a>
            <a href="http://www.sai-jewellers.com/" class="simple-text logo-normal">Sai Jewellers</a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li @if($activePage == 'Dashboard') class="active" @endif>
                    <a href="{{route('user.home')}}">
                        <i class="now-ui-icons business_chart-bar-32"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li @if($activePage == 'MyOrders') class="active" @endif>
                    <a href="{{route('user.order')}}">
                        <i class="now-ui-icons shopping_cart-simple"></i>
                        <p>My Orders</p>
                    </a>
                </li>
                <li @if($activePage == 'Wallet') class="active" @endif>
                    <a href="{{route('user.wallet')}}">
                        <i class="now-ui-icons business_money-coins"></i>
                        <p>Wallet</p>
                    </a>
                </li>
               <!--  <li @if($activePage == 'Notification') class="active" @endif>
                    <a href="notifications.html">
                        <i class="now-ui-icons ui-1_bell-53"></i>
                        <p>Notifications</p>
                    </a>
                </li> -->
                <li @if($activePage == 'Profile') class="active" @endif>
                    <a href="{{route('user.profile')}}">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>My Profile</p>
                    </a>
                </li>
                <!-- <li>
                    <a href="tables.html">
                        <i class="now-ui-icons arrows-1_refresh-69"></i>
                        <p>Change Password</p>
                    </a>
                </li> -->
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="now-ui-icons arrows-1_share-66"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <li class="active-pro">
                    <a href="upgrade.html">
                        <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
