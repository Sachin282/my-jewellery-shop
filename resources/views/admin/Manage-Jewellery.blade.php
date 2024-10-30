@extends('admin.layouts.layout')
@section('content')
<?php
	$error = '';
	$msg = '';
	$requestedFor = request()->segment(4);
	$id = $requestedFor - 1;
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
                                <form method="post" action="{{url()->full()}}" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Select Jewellery Type<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="selectpicker" name="brandname" onchange="window.location = '{{url('admin/Jewellery/Manage')}}/'+this.value" required>
                                                @if(empty($requestedFor))
                                                <option value=""> Select </option>
                                                @endif
                                                @foreach($jewelleryDetail as $jewellery)
                                                <option value="{{$jewellery->id}}" id="j_type_{{$jewellery->id}}" @if($requestedFor==$jewellery->id) selected @endif><a href="">{{$jewellery->name}}</a></option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- <label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control" required>
</div> -->
                                    </div>
                                    <div class="hr-dashed"></div>
                                    <!-- 
<div class="form-group">
<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="vehicalorcview" rows="3" required></textarea>
</div>
</div> -->
                                    @if(!empty($requestedFor))
                                    @foreach($jewelleryDetail as $jewellery)
                                    @if($jewellery->id == $requestedFor)
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Today's Price (per 10 gram)<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="gold_price" value="{{$jewellery->price }}" class="form-control" required>
                                        </div>
                                        <label class="col-sm-2 control-label">Making Charge<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="making_charge" value="{{$jewellery->making_charge }}" class="form-control" required>
                                            <input type="hidden" name="j_type" value="{{$jewellery->id }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
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
