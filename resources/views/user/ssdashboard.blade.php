@extends('user.layouts.layout')

    @section('content')
 

  
    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <i class="now-ui-icons media-2_sound-wave"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons location_world"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="panel-header panel-header-sm">
            <!-- <canvas id="bigDashboardChart"></canvas> -->
        </div>
        <div class="content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h5 class="card-category">Earned Cashback</h5>
                            <h4 class="card-title">Available Gcash</h4>
                            <div class="dropdown">
                               <!--  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                    <i class="now-ui-icons loader_gear"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <a class="dropdown-item text-danger" href="#">Remove Data</a>
                                </div> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area-custom text-center" style="padding-top: 15%;">
                                <span style="padding-top: 360px;font-size: 4em;font-weight: bold;color: #82030d;">{{$userDetail->gcash}}</span>
                                <!-- <canvas id="lineChartExample"></canvas> -->
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h5 class="card-category">Orders</h5>
                            <h4 class="card-title">Running Order</h4>
                            <div class="dropdown">
                                <!-- <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                    <i class="now-ui-icons loader_gear"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <a class="dropdown-item text-danger" href="#">Remove Data</a>
                                </div> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area-custom table-bordered text-center">
                                <table border="1" class="text-center table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <td>OrderID</td>
                                            <td>Gold Weight</td>
                                            <td>Period</td>
                                            <td>pending Installment</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($RunningOrders as $Order)
                                        <tr>
                                            <td>{{$Order->order_id}}</td>
                                            <td>{{$Order->weight}}g</td>
                                            <td>{{$Order->tenure}}M</td>
                                            <td>{{$Order->pending_installment}} term</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="100%">No Orders Yet</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h5 class="card-category">Email Statistics</h5>
                            <h4 class="card-title">24 Hours Performance</h4>
                        </div>
                        <div class="card-body">
                            <div class="chart-area-custom">
                                <canvas id="barChartSimpleGradientsNumbers"></canvas>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- custom comment start -->
<?php
/*

<div class="col-md-6">
<div class="card  card-tasks">
    
    <div class="card-header ">
    <h5 class="card-category">Backend development</h5>
                        <h4 class="card-title">Tasks</h4>
    </div>
    
    <div class="card-body ">
        

            <div class="table-full-width table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                          
                                            <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>     
    </div>
    
    <div class="card-footer ">
        <hr>
                        <div class="stats">
                            <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                        </div>
    </div>
</div>
  </div>
  <!-- custom comment end -->
  */
  ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-category">All Persons List</h5>
                            <h4 class="card-title">Notifications</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th width="20%">
                                            Title
                                        </th>
                                        <th width="50%">
                                            Description
                                        </th>
                                        <th width="20%">
                                            Short Info
                                        </th>
                                        <th class="text-right">
                                            prioraty
                                        </th>
                                    </thead>
                                    <tbody>
                                      {{Date('d-m-Y')}}  - {{Date('d-m-Y', strtotime('+7 day',strtotime($userDetail->created_at)))}}
                        @if(Date('d-m-Y') < Date('d-m-Y', strtotime('+7 day',strtotime($userDetail->created_at))))
                                        <tr>
                                            <td>
                                                reminder
                                            </td>
                                            <td>
                                                Next upcomming payment Date for 5 gram gold coin 12 month Installment
                                            </td>
                                            <td>
                                                rs.3000 [13/3/19]
                                            </td>
                                            <td class="text-right">
                                                Important
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class=" container-fluid ">
                <nav>
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com/">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com/">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com/">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright" id="copyright">
                    &copy; <script>
                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))

                    </script>, Designed by <a href="https://www.invisionapp.com/" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a>.
                </div>
            </div>
        </footer>
    </div>


@endsection