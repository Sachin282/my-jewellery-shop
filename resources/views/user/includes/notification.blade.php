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
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
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
                                        </thead>
                                        <tbody>
                                            <?php $inst_no = 0; ?>
                                            @foreach($installments as $installment)
                                            @if($installment->status == 'paid')
                                            <?php $inst_no++ ?>
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
                                            </tr>
                                            @endif
                                            @endforeach
                                            <?php $inst_no++ ?>
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
                                                    {{Date('d-m-Y',strtotime($installment->updated_at))}}
                                                </td>
                                                <td class="text-right">
                                                    Next to pay
                                                </td>
                                                <td class="text-right">
                                                    {{$installment->delay_fine}}
                                                </td>
                                            </tr>
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
                                                View
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
                                                    <a href="{{route('user.order.manage',$RunningOrder->id)}}" class="btn btn-info">
                                                        View
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