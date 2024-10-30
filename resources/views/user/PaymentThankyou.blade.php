
@extends('user.layouts.layout')
    @section('content')
    
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Payment Confirmation</h4>
                            </div>
                            <div class="card-body">

                                @if(!isset($parameter) || empty($parameter))
                                        <script>
                                        document.getElementById('logout-form').submit();
                                    // window.location = window.location.origin;
                                </script>
                                        @endif
                                        @if($parameter['STATUS'] == 'TXN_FAILURE')

                                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="places-buttons">
                                    <div class="row">
                                        <div class="col-md-8 ml-auto mr-auto text-center">
                                            <div class="alert alert-info">
                                            <h4 align="center">Transaction has been cancelled or not completed due to some reason</h4>
                                            <h3>Please complete your Order</h3> 
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($parameter['STATUS'] == 'TXN_SUCCESS')

                                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="places-buttons">
                                    <div class="row">
                                        <div class="col-md-8 ml-auto mr-auto text-center">
                                            <div class="alert alert-success">
                                            <h4 align="center">Payment Done, Thank You !</h4>
                                            <h3>Check your email for order confirmation</h3> 
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                                    <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-8 ml-auto mr-auto">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a class="btn btn-primary btn-block" href="{{route('user.home')}}">My Dashboard</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a class="btn btn-primary btn-block" href="{{route('user.order')}}">Check My Orders</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a class="btn btn-primary btn-block" href="{{route('landing-page')}}">Back to Home</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<br>
<span>Below are the transaction Detail : </span>
                                <div class="table-responsive">
                                    <table class="table">
                                            <thead class="text-primary">
                                            <th>
                                                Parameter
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    ORDER ID
                                                </td>
                                                <td>
                                                    :&nbsp;&nbsp;&nbsp;{{$parameter['ORDERID']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    TRANSACTION ID
                                                </td>
                                                <td>
                                                    :&nbsp;&nbsp;&nbsp;{{$parameter['TXNID']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    TRANSACTION AMOUNT
                                                </td>
                                                <td>
                                                    :&nbsp;&nbsp;&nbsp;{{$parameter['TXNAMOUNT']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    STATUS
                                                </td>
                                                <td>
                                                    :&nbsp;&nbsp;&nbsp;{{$parameter['STATUS']}}
                                                </td>
                                            </tr>
                                            @if($parameter['STATUS'] == 'TXN_SUCCESS')
                                            <tr>
                                                <td>
                                                    CURRENCY
                                                </td>
                                                <td>
                                                    :&nbsp;&nbsp;&nbsp;{{$parameter['CURRENCY']}}
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
 @endsection