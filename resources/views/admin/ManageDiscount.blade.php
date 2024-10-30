@extends('admin.layouts.layout')
@section('content')
<?php
    $error = '';
    $msg = '';
    $requestedFor = request()->segment(4);
    $id = $requestedFor - 1;
    // dd($data);
    // request()->segment(count(request()->segments()))
    ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Manage Jewellery</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Basic Info</div>
                            <?php if($error){?>
                            <div class="errorWrap"><strong>ERROR</strong>:
                                <?php echo htmlentities($error); ?>
                            </div>
                            <?php } 
                else if($msg){?>
                            <div class="succWrap"><strong>SUCCESS</strong>:
                                <?php echo htmlentities($msg); ?>
                            </div>
                            <?php }?>
                            <div class="panel-body">
                                <form method="post" action="http://sai-jewellers.com/admin/Discount/Manage" class="form-horizontal" enctype="multipart/form-data">

                                    <div class="hr-dashed"></div>

@csrf
<table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Discount_type</th>
        <th>Discount</th>
        <th>Status</th>
        <th>Upto</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Discount_type</th>
        <th>Discount</th>
        <th>Status</th>
        <th>Upto</th>
    </tr>
</tfoot>
<tbody>
    @foreach($data as $discount)
    <tr>
    <td>
        <input type="text" name="name_{{$discount->id }}" readonly="" value="{{$discount->name }}" class="form-control" required>
    </td>
    <td>
        <input type="text" name="type_{{$discount->id }}" readonly="" value="{{$discount->type }}" class="form-control" required>
    </td>
    <td>
        <select class="selectpicker" name="discount_type_{{$discount->id }}" required>
                                                <option value="flat" @if($discount->discount_type=='flat') selected @endif>flat</option>
                                                <option value="percentage" @if($discount->discount_type=='percentage') selected @endif>percentage</option>
                                            </select>
    </td>
    <td width="10%">
        <input type="number" name="discount_{{$discount->id }}" value="{{$discount->discount }}" class="form-control" required>
    </td>
    <td>
            <input type="checkbox" style="font-size: 20px;" name="upto_{{$discount->id }}" @if($discount->upto=='1') checked @endif>
    </td>
    <td>
        <select class="selectpicker" name="status_{{$discount->id }}" required>
                                                <option value="active" @if($discount->status=='active') selected @endif>active</option>
                                                <option value="inactive" @if($discount->status=='inactive') selected @endif>inactive</option>
                                            </select>
    </td>
    @endforeach
</tr>
</form>
</tbody>
</table>

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-4">
                                            <button class="btn btn-default" type="reset">Cancel</button>
                                            <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                                        </div>
                                    </div>
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
