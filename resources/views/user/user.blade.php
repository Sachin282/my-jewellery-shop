@extends('user.layouts.layout')
    @section('content')
    @if(isset($success))
    Success : {{dump($success)}}<br>
    @endif
    @if(isset($error))
    Error : {{dump($error)}}<br>
    @endif
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Edit Profile</h5>
                                @if(isset($success))
                                <div class="alert alert-info">
                    <button type="button" aria-hidden="true" class="close">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <span><b> Notification - </b> {!! $messege !!}</span>
                </div>
                @endif
                @if(isset($error))
                                <div class="alert alert-info">
                    <button type="button" aria-hidden="true" class="close">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <span><b> Notification - </b> {!! $messege !!}</span>
                </div>
                @endif

                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('user.profile.update')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3 pr-1">
                                            <div class="form-group">
                                                <label>Company Code</label>
                                                <input type="text" class="form-control" name="code" disabled="" placeholder="Company" value="{{$userDetail->code}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="name" placeholder="Username" value="{{$userDetail->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-5 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" value="{{$userDetail->email}}" name="email" class="form-control" readonly="" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input type="number" class="form-control" placeholder="Phone Number" value="{{$userDetail->phone}}" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Joining Date</label>
                                                <input type="text" class="form-control" disabled="" placeholder="Joining Date" name="joining" value="{{$userDetail->created_at->format('d-m-Y')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="{{$userDetail->address}}" name="address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" value="{{$userDetail->city}}" name="city">
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                            </div>
                                        </div> -->
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" name="zip" class="form-control" placeholder="ZIP Code" value="{!!$userDetail->zip!!}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <input type="submit" class="form-control" style="background-color: orange;" value="Update">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>
                                        </div>
                                    </div> -->
                                </form>
                                
                            </div>
                        </div>
                    </div>
                   <!--  <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="../assets/img/bg5.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
                                        <h5 class="title">Mike Andrew</h5>
                                    </a>
                                    <p class="description">
                                        michael24
                                    </p>
                                </div>
                                <p class="description text-center">
                                    "Lamborghini Mercy <br>
                                    Your chick she so thirsty <br>
                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="button-container">
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-google-plus-g"></i>
                                </button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <button style="display: none;" id="update-alert" onclick="nowuiDashboard.showNotification('top','right')"></button>
            <script type="text/javascript">
                (document).ready(function(){
                    $('#update-alert').click();
                })
            </script>
        @endsection