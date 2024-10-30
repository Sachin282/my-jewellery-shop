@extends('user.layouts.layout')
    @section('content')
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Simple Table</h4>
                                @if(!empty(Session::get('message')))
                                <div class="alert alert-success">{{Session::get('message')}}</div>
                                <?php Session::forget('message') ?>
                                @elseif(!empty(Session::get('error')))
                                <div class="alert alert-danger">{{Session::get('error')}}</div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive">
                                        @if(isset($installments) && !empty($installments))
                                            <thead class=" text-primary">
                                            <th>
                                                OrderId
                                            </th>
                                            <th>
                                                weight
                                            </th>
                                            <th>
                                                tenure
                                            </th>
                                            <th class="text-right">
                                                Pending Installment
                                            </th>   
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{$RunningOrders->order_id}}
                                                </td>
                                                <td>
                                                    {{$RunningOrders->weight}}
                                                </td>
                                                <td>
                                                    {{$RunningOrders->tenure}}
                                                </td>
                                                <td class="text-right">
                                                    {{$RunningOrders->pending_installment}}
                                                </td>
                                            </tr>
                                        </tbody>



                                        <thead class=" text-primary">
                                            <th>
                                                installment No.
                                            </th>
                                            <th>
                                                Installment Amount
                                            </th>
                                            <th>
                                                Payment Date
                                            </th>
                                            <th>
                                                Paying Date
                                            </th>
                                            <th class="text-right">
                                                Status
                                            </th>
                                            <th class="text-right">
                                                Delay Fine
                                            </th>
                                            <th class="text-right">
                                                Action
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php $inst_no = 1; ?>
                                            @foreach($installments as $installment)
                                            @if($installment->status == 'paid' && $installment->inst_no == $inst_no)
                                            <tr>
                                                <td>
                                                    {{$installment->inst_no}}
                                                </td>
                                                <td>
                                                    {{$installment->amount}}
                                                </td>
                                                <td>
                                                    {{Date('d-m-Y',strtotime($installment->inst_date))}}
                                                </td>
                                                <td>
                                                    {{Date('d-m-Y',strtotime($installment->updated_at))}}
                                                </td>
                                                <td class="text-right">
                                                    {{$installment->status}}
                                                </td>
                                                <td class="text-right">
                                                    {{$installment->delay_fine}}
                                                </td>
                                                <td class="text-center">
                                                    N/A
                                                </td>
                                            </tr>
                                            <?php $inst_no++ ?>
                                            @endif
                                            @endforeach
                                            @foreach($installments as $installment)
                                            @if($installment->inst_no == $inst_no)
                                            <tr>
                                                <td>
                                                    {{$installment->inst_no}}
                                                </td>
                                                <td>
                                                    {{$installment->amount}}
                                                </td>
                                                <td>
                                                    {{Date('d-m-Y',strtotime($installment->inst_date))}}
                                                </td>
                                                <td>
                                                    &nbsp;
                                                </td>
                                                <td class="text-right">
                                                    Next to pay
                                                </td>
                                                <td class="text-right">
                                                    {{$installment->delay_fine}}
                                                </td>
                                                <td class="text-right">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Pay Now</button>
                                                </td>
                                            </tr>


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
                            <form id="payment-form" method="post" action="{{route('payment.Installment.pay')}}">
                                @csrf
                                <div class="form-group">
                                    <?php 
                                    $limit = $installment->amount*5/100;
                                    if($limit < $Gcash) 
                                        $redeemable = floor($limit);
                                    else
                                        $redeemable = $Gcash
                                    ?>
                                    <input id="redeem_gcash" type="number" min="0" max="{{floor($redeemable)}}" name="redeem_gcash" class="form-control" placeholder="Enter the Gcash value to redeem your gcash for discount" value="0" autofocus>
                                    <input type="hidden" name="id" value="{{$installment->id}}">
                                    <br>
                                    
                                    <span>You can use upto {{$redeemable}} G-Cash</span>
                                </div>
                                <div class="form-group" id="ABS-calc">
                                    <!-- <label for="Register-CPassword">Confirm Password</label> -->
                                </div>
                                <button button="button" id="booking-submit" class="btn btn-primary">Submit</button>
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

                                            <?php $inst_no = 0 ?>
                                            @endif
                                            @endforeach

                                        </tbody>
                                        @else
                                        <thead class=" text-primary">
                                            <th>
                                                OrderId
                                            </th>
                                            <th>
                                                weight
                                            </th>
                                            <th>
                                                tenure
                                            </th>
                                            <th class="text-right">
                                                Installment Amount
                                            </th>
                                            <th class="text-right">
                                                Pending Installment
                                            </th>
                                            <th class="text-right">
                                                status
                                            </th>
                                            <th class="text-right">
                                                Action
                                            </th>
                                        </thead>
                                        <tbody>
                                            @forelse($RunningOrders as $RunningOrder)
                                            <tr>
                                                <td>
                                                    {{$RunningOrder->order_id}}
                                                </td>
                                                <td>
                                                    {{$RunningOrder->weight}}
                                                </td>
                                                <td>
                                                    {{$RunningOrder->tenure}}
                                                </td>
                                                <td class="text-right">
                                                    {{$RunningOrder->installment_amount}}
                                                </td>
                                                <td class="text-right">
                                                    {{$RunningOrder->pending_installment}}
                                                </td>
                                                <td class="text-right">
                                                    {{$RunningOrder->status}}
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{route('user.order.manage',$RunningOrder->id)}}" class="btn btn-info">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            @forelse($PendingOrders as $PendingOrder)
                                             <tr>
                                                <td>
                                                    {{$PendingOrder->order_id}}
                                                </td>
                                                <td>
                                                    {{$PendingOrder->weight}}
                                                </td>
                                                <td>
                                                    {{$PendingOrder->tenure}}
                                                </td>
                                                <td class="text-right">
                                                    {{$PendingOrder->installment_amount}}
                                                </td>
                                                <td class="text-right">
                                                    {{$PendingOrder->pending_installment}}
                                                </td>
                                                <td class="text-right">
                                                    {{$PendingOrder->status}}
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{route('order.replace.pay',$PendingOrder->id)}}" class="btn btn-primary">
                                                        Pay Now
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="100%">
                                                    No Running Order
                                                </td>
                                            </tr>
                                            @endforelse
                                            @endforelse
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