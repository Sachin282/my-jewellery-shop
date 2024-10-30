@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Manage Jewellery</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Basic Info</div>

                            @if(!empty(Session::get('message')))
                                <div class="alert alert-success">{{Session::get('message')}}</div>
                                <?php Session::forget('message') ?>
                                @elseif(!empty(Session::get('error')))
                                <div class="alert alert-danger">{{Session::get('error')}}</div>
                                @endif

                            <div class="panel-body">
                                <form method="post" action="{{url()->full()}}" class="form-horizontal" enctype="multipart/form-data">

                                    <table id="zctb" class="display table-responsive table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    @if($status == 'Incomming')
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer Code</th>
                                            <th>OrderId</th>
                                            <th>Paid For</th>
                                            <th>amount</th>
                                            <th>TransactionId</th>
                                            <th>Status</th>
                                            <th>Payment Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer Code</th>
                                            <th>OrderId</th>
                                            <th>Paid For</th>
                                            <th>amount</th>
                                            <th>TransactionId</th>
                                            <th>Status</th>
                                            <th>Payment Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php $cnt = 0; $totalAmount = 0; ?>
                                    @foreach($data as $d)
                                    <?php $cnt++; ?>
                                        <tr>
                                            <td>{{$cnt}}</td>
                                            <td>{{$d->code}}</td>
                                            <td>{{$d->PaymentOrderId}}</td>
                                            <td>{{$d->paid_for}}</td>
                                            <td>{{$d->amount}}</td>
                                            <td>{{$d->transaction_id}}</td>
                                            <td>{{$d->status}}</td>
                                            <td>{{$d->created_at}}</td>
                                        </tr>
                                        <?php  $totalAmount = $totalAmount+$d->amount; ?>
                                        @endforeach 
                                        <tr>
                                            <td>{{++$cnt}}</td>
                                            <td></td>
                                            <td></td>
                                            <td>Total Amount</td>
                                            <td>{{$totalAmount}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    @elseif($status == 'Outgoing')
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer Code</th>
                                            <th>amount</th>
                                            <th>Status</th>
                                            <th>Requested Date</th>
                                            <th>Approval Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer Code</th>
                                            <th>amount</th>
                                            <th>Status</th>
                                            <th>Requested Date</th>
                                            <th>Approval Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php $cnt = 0; $totalAmount = 0; ?>
                                    @foreach($data as $d)
                                    <?php $cnt++; ?>
                                        <tr>
                                            <td>{{$cnt}}</td>
                                            <td>{{$d->code}}</td>
                                            <td>{{$d->amount}}</td>
                                            <td>{{$d->status}}</td>
                                            <td>{{$d->created_at}}</td>
                                            <td>{{$d->updated_at}}</td>
                                        </tr>
                                        <?php  $totalAmount = $totalAmount+$d->amount; ?>
                                        @endforeach 

                                        <tr>
                                            <td>{{++$cnt}}</td>
                                            <td>Total Amount</td>
                                            <td>{{$totalAmount}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                        @endif
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
