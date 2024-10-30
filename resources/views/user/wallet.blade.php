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
                                <h4 class="card-title">Total Available Gcash</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart-area-custom text-center"style="padding-top: 15%;">
                                <span style="padding-top: 360px;font-size: 4em;font-weight: bold;color: #82030d;">{{$AvailableGcash}}</span>
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
                                <h5 class="card-category">Redeemable</h5>
                                <h4 class="card-title">Redeemable Gcash</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart-area-custom text-center"style="padding-top: 15%;">
                                <span style="padding-top: 360px;font-size: 4em;font-weight: bold;color: #82030d;">{{$RedeemableGcash}}</span>
                                <button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#exampleModal"><span style="font-size:1.2em;">Redeem</span><br><span style="font-size: 0.9em;">(Request to transfer in your bank account)</span></button>
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
                                <h5 class="card-category">Referred Users</h5>
                                <h4 class="card-title">{{count($ReferredUsers)}} Referred User</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart-area-custom table-bordered text-center">
                                    <table border="1" class="text-center table-bordered table-striped">
                                    <thead>
                                        <tr width="100%">
                                            <td>Code</td>
                                            <td>User Name</td>
                                            <td>City</td>
                                            <td>Joining Date</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($ReferredUsers as $referred)
                                        <tr>
                                            <td>{{$referred->code}}</td>
                                            <td>{{$referred->name}}</td>
                                            <td>{{$referred->city}}</td>
                                            <td>{!! Date('d-m-Y',strtotime($referred->created_at)) !!}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="100%">Oops, No Referred Users Yet</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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




                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Redeem G-Cash
                        <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="myTabContent">
                   <div class="tab-pane active" id="booking" role="tabpanel" aria-labelledby="booking-tab">
                            <form id="payment-form" method="post" action="{{route('user.gcash.redeem')}}">
                                @csrf
                                <div class="form-group">
                                    <?php 
                                    // $limit = $installment->amount*5/100;
                                    // if($limit < $Gcash) 
                                    //     $redeemable = floor($limit);
                                    // else
                                    //     $redeemable = $GCash
                                    ?>
                                    <input id="redeem_gcash" type="number" min="0" max="{{floor($RedeemableGcash)}}" name="redeem_gcash" class="form-control" placeholder="Enter the Gcash value to redeem your gcash for discount" value="0" autofocus>
                                    <br>
                                    <span>You can use upto {{$RedeemableGcash}} G-Cash</span>
                                    <br>
                                    <br>
                                    <span class="form-group">Please provide bank details</span>
                                                <input type="text" name="UserName_in_bank" class="form-control mt-3" placeholder="Enter your Name provided in Bank" value="@if(isset($BankDetail->name_in_bank)){{$BankDetail->name_in_bank}}@endif" required autofocus>
                                                
                                                <input type="number" name="AccountNumber" class="form-control col-lg-12 mt-3" placeholder="Account Number" value="@if(isset($BankDetail->account_no)){{$BankDetail->account_no}}@endif" required autofocus> 

                                                <input type="text" name="IFSC" class="form-control col-lg-12 mt-3" placeholder="IFSC Code" value="@if(isset($BankDetail->ifsc)){{$BankDetail->ifsc}}@endif" required autofocus>                                    
                                </div>
                                <button type="submit" id="booking-submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>


                <div class="row">
                    <?php /*
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
                */ ?>
                </div>
            </div>

@endsection