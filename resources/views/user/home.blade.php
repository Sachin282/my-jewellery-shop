@extends('user.layouts.layout')

    @section('content')
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
                            </div>
                            <div class="card-body">
                                <div class="chart-area-custom text-center"style="padding-top: 15%;">
                                <span style="padding-top: 360px;font-size: 4em;font-weight: bold;color: #82030d;">{{$userDetail->gcash}}</span>
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
                                            <td>{{$Order->pending_installment}} terms</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="100%">No Orders Yet</td>
                                        </tr>
                                        @endforelse
                                        <tr>
                                            <td colspan="100%">
                                                <a href="{{route('user.order')}}">View Full</a>
                                            </td>
                                        </tr>
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
                                <h5 class="card-category">Notification</h5>
                                <h4 class="card-title">Hey, {!! $userDetail->name !!}</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
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
                    <!-- <div class="col-md-6">
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
                    </div> -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-category">All Persons List</h5>
                                <h4 class="card-title"> Employees Stats</h4>
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
                        <?php $today = Date('d-m-Y'); ?>
                        <?php $limit = Date('d-m-Y', strtotime('+7 day',strtotime($userDetail->created_at))); ?>
                        @if( strtotime($today) < strtotime($limit))
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

@endsection