@extends('admin.layouts.layout')
@section('content')
<?php
	$error = '';
	$msg = '';
	$requestedFor = request()->segment(4);
	$id = $requestedFor - 1;
	// dd($data);
	// request()->segment(count(request()->segments()))
	// dd($jewelleryDetail);
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
                                <form method="post" action="{{Route('installment.manage.submit')}}" class="form-horizontal" enctype="multipart/form-data">
                                    <?php /* 
<div class="form-group">
<label class="col-sm-2 control-label">Select Jewellery Type<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brandname" onchange="window.location = 'http://localhost/sai-jewellers/admin/Jewellery/Manage/'+this.value" required>
	@if(empty($requestedFor))
		<option value=""> Select </option>
	@endif
@foreach($jewelleryDetail as $jewellery)
<option value="{{$jewellery->id}}" id="j_type_{{$jewellery->id}}" @if($requestedFor == $jewellery->id) selected @endif><a href="">{{$jewellery->name}}</a></option>
@endforeach

</select>	
</div>
<!-- <label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control" required>
</div> -->
</div>
*/
?>
                                    <div class="hr-dashed"></div>
                                    <!-- 
<div class="form-group">
<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="vehicalorcview" rows="3" required></textarea>
</div>
</div> -->
@csrf
<table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th>Name</th>
		<th>Period (Month)</th>
		<th>Locking Period (Month)</th>
		<th>Down Payment (%)</th>
		<th>Status</th>
		<th>Delay Fine (per Day)</th>
	</tr>
</thead>
<tfoot>
	<tr>
		<th>Name</th>
		<th>Period</th>
		<th>Locking Period</th>
		<th>Down Payment (%)</th>
		<th>Status</th>
		<th>Delay Fine (per Day)</th>
	</tr>
</tfoot>
<tbody>
	@foreach($data as $jewellery)
    <tr>
    <td>
    	<input type="text" name="name_{{$jewellery->id }}" value="{{$jewellery->name }}" class="form-control" required>
    </td>
    <td>
    	<input type="number" name="tenure_{{$jewellery->id }}" value="{{$jewellery->tenure }}" class="form-control" required>
    </td>
    <td>
    	<input type="number" name="locking_{{$jewellery->id }}" value="{{$jewellery->locking_period }}" class="form-control" required>
    </td>
    <td>
    	<input type="number" name="dp_{{$jewellery->id }}" value="{{$jewellery->down_payment }}" class="form-control" required>
    </td>
    <td>
    	<select class="selectpicker" name="status_{{$jewellery->id }}" required>
                                                <option value="active" @if($jewellery->status=='active') selected @endif>active</option>
                                                <option value="inactive" @if($jewellery->status=='inactive') selected @endif>inactive</option>
                                            </select>
    </td>
    <td>
        <input type="number" name="delay_{{$jewellery->id }}" value="{{$jewellery->delay_fine }}" class="form-control" required>
    </td>
    @endforeach
</tr>
</tbody>
</table>
                      <!--               <div class="form-group">
                                        <label class="col-sm-2 text-center">Name<span style="color:red">*</span></label>
                                        <label class="col-sm-2 text-center">Period (M)<span style="color:red">*</span></label>
                                        <label class="col-sm-2 text-center">Locking Period (M)<span style="color:red">*</span></label>
                                        <label class="col-sm-2 text-center">Down Payment (%)<span style="color:red">*</span></label>
                                        <label class="col-sm-2 text-center">status<span style="color:red">*</span></label>
                                    </div>
                                    @foreach($data as $jewellery)
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <input type="text" name="name_{{$jewellery->id }}" value="{{$jewellery->name }}" class="form-control" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" name="tenure_{{$jewellery->id }}" value="{{$jewellery->tenure }}" class="form-control" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" name="locking_{{$jewellery->id }}" value="{{$jewellery->locking_period }}" class="form-control" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" name="dp_{{$jewellery->id }}" value="{{$jewellery->down_payment }}" class="form-control" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="selectpicker" name="inst_{{$jewellery->id }}" required>
                                                <option value="active" @if($jewellery->status=='active') selected @endif>active</option>
                                                <option value="inactive" @if($jewellery->status=='inactive') selected @endif>inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endforeach -->
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
