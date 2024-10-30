<?php 
// $timeToRunMaintainance = date('h:i:s',time());
// echo $timeToRunMaintainance;
// $alreadyDone =0;
// if ($alreadyDone == 0 && $timeToRunMaintainance > '09:57:24') {
//    // runTask();
//     echo "<script>alert('executed')</script>";
//    // $timeToRunMaintainance = time() + $interval;
// } 
$hallmark = "<img class=hallmark src='public/assets/images/icons/hallmark.png'>";
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Sai Jewellers</title>
    <!-- CSS -->
    <link href="{{url('public/assets/home/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/assets/home/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('public/assets/home/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('public/assets/home/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('public/assets/home/css/owl.transitions.css')}}" rel="stylesheet">
    <link href="{{url('public/assets/home/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{url('public/assets/home/css/main.css')}}" rel="stylesheet">
    <link href="{{url('public/assets/home/css/styles.css')}}" rel="stylesheet">
    <link href="{{url('public/assets/custom/css/custom.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">



<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<link href="{{url('public/assets/home/css/infinite-slider.css')}}" rel="stylesheet">

</head>
<!--/head-->
<body id="home" class="homepage">
    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="{{url('public/assets/images/logo/logo.png')}}" style="height: 57px;" alt="logo"></a>
                </div>
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Home</a></li>
                        <li class="scroll"><a href="#" data-toggle="modal" data-target="#exampleModal">Purchase Gold coin</a></li>
                        <li class="scroll"><a href="#services">Bonanza</a></li>
                        <li class="scroll"><a href="#about">About Us</a></li>
                        <li class="scroll"><a href="#get-in-touch">Contact</a></li>
                        <li class="scroll"><a href="{{route('login')}}">login/Register</a></li>
                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->
    </header>
    <!--/header-->
    <section id="main-slider">
        <div class="owl-carousel">
        	@if ($agent->isMobile())
            <!--/.item-->
            <div id="mobile_slider_1">
	            <div class="item" style="background-image: url('{{url('public/assets/home/images/slider/slider_mobile_black.png')}}');">
	                <div class="slider-inner">
	                    <div class="container">
	                        <div class="row">
	                            <div class="col-sm-6">
	                                <div class="carousel-content">
	                                    <h2><span style="color: orange;font-size: 1em;">Sai Jewellers presents</span>
	                                        <br>Har Ghar <span style="color: gold;">Sona</span>
	                                        <br>Ghar Ghar <span style="color: gold;">Sona . .</span></h2>
	                                    <p>Get Booked 916 Gold Coin & Hallmark {!!$hallmark!!} Jewellery<br> by our Advanced Booking Paymet System <br>with 3 different mode of payment and in 3 easy steps.</p>
	                                    <a class="btn btn-primary btn-lg" href="#features">Know more</a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
            <!--/.item-->
            <div id="mobile_slider_2">
	            <div class="item" style="background-image: url('{{url('public/assets/home/images/slider/banner_ad.jpeg')}}');">
	                <div class="slider-inner">
	                    <div class="container">
	                        <div class="row">
	                            <div class="col-sm-6">
	                                <div class="carousel-content">
	                                    
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        @else
	        <!--/.item-->
            <div id="desktop_slider_1">
	            <div class="item" style="background-image: url('{{url('public/assets/home/images/slider/hgsggs_right_r.png')}}');">
	                <div class="slider-inner">
	                    <div class="container">
	                        <div class="row">
	                            <div class="col-sm-6">
	                                <div class="carousel-content">
	                                   <h2><span style="color: orange;font-size: 1em;">Sai Jewellers presents</span>
	                                        <br>Har Ghar <span style="color: gold;">Sona</span>
	                                        <br>Ghar Ghar <span style="color: gold;">Sona . .</span></h2>
	                                    <p>Get Booked 916 Gold Coin & Hallmark {!!$hallmark!!} Jewellery<br> by our Advanced Booking Paymet System <br>with 3 different mode of payment and in 3 easy steps.</p>
	                                    <a class="btn btn-primary btn-lg" href="#features">Know more</a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
            </div>
            <!--/.item-->
            <div id="desktop_slider_2">
	            <div class="item" style="background-image: url('{{url('public/assets/home/images/slider/sone_pe_suhaga.png')}}');">
	                <div class="slider-inner">
	                    <div class="container">
	                        <div class="row">
	                            <div class="col-sm-6">
	                                <div class="carousel-content">
	                                    <h2><span style="color: orange;font-size: 1em;">Sai Jewellers presents</span>
	                                        <br>Har Ghar <span style="color: gold;">Sona</span>
	                                        <br>Ghar Ghar <span style="color: gold;">Sona . .</span></h2>
	                                    <p>Get Booked 916 Gold Coin & Hallmark {!!$hallmark!!} Jewellery<br> by our Advanced Booking Paymet System <br>with 3 different mode of payment and in 3 easy steps.</p>
	                                    <a class="btn btn-primary btn-lg" href="#features">Know more</a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
            </div>
           @endif
            <!--/.item-->
        </div>
        <!--/.owl-carousel-->
    </section>
    <!--/#main-slider-->
    <!-- <div class="container" style="background-image: url('{{url('public/assets/home/images/imgs/falling_gold_coins.png')}}'); opacity: 0.8;"> -->
    <section id="get-in-touch" style="padding: 50px 0 50px;" class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h1 style="color: orange;">Hurry up! Its a limited time offer</h1>
                    <p>
                        <h4 style="color: #fff;">Har Ghar Sona Ghar Ghar Sona is an limited time offer. It is our mission to make gold coin available in each and every home, we are continuously trying to make gold purchase as easy as possible.<br>First 50 customer will get huge special discount on first purchase of gold</h4>
                    </p>
                </div>
                <div class="col-sm-3">

                    <div id="rate">{{(int)($GoldRate * 0.916)}}</div>
                    <!-- <div id="Goldrate" style="margin-top: 30px;">
                        <div class="Goldrate-content gradient">
                            <div class="info">
                                <br>
                                <span class="blink">{{(int)($GoldRate * 0.916)}}</span>
                                <br>
                                <br>
                                <span style="color: white;">Today's Gold Rate</span>
                                <br>
                                <span>&nbsp;</span>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div id="countdown" style="margin-top: 30px;">
                    <div class="clock">      
                        <div class="info">
                        <span id="days">8</span>
                        <span id="hours">4</span>
                        <span id="minutes">12</span>
                        <span id="seconds">22</span>
                        <br>
                        <br>    
                        <span>Remaining</span>
                    </div>
                </div>
            </div> -->
                    <!-- <iframe src="https://www.goldratetoday.com/wg-00005.php" style="top:0px; left:0px; bottom:0px; right:0px; width:100%; height:280px; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;"></iframe> -->
                </div>
            </div>
        </div>
    </section>
    <!--/#cta-->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active" id="login-tab">
                            <!-- <a class="nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true" aria-expanded="true">Login</a> -->
                            <a class="nav-link" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item" id="signup-tab">
                            <a class="nav-link" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false" aria-expanded="false">Signup</a>
                        </li>
                        <li class="nav-item" id="booking-tab">
                            <a class="nav-link" data-toggle="tab" href="#booking" role="tab" aria-controls="booking" aria-selected="false" aria-expanded="false">Book Advance Gold Coin</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <?php
/*
          <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
              <form method="POST" action="{{ route('login') }}" id="home-login-form">
                 @csrf
                  <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="L_Email" placeholder="Enter email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="L_Password" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <small id="login-error" class="form-text text-muted"></small>
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="L_Remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label"  for="remember">Remember Me</label>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
            <form>
                <div class="form-group">
                    <label for="Register-Name">Name</label>
                    <input class="form-control" id="R_Name" placeholder="Enter Full Name">
                </div>
                <div class="form-group">
                    <label for="Register-Email">Email address</label>
                    <input type="email" class="form-control" id="R_Email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="Register-Phone">Phone</label>
                    <input class="form-control" id="R_Phone" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <label for="Register-Name">Address</label>
                    <textarea class="form-control" id="R_Address" placeholder="Enter Full Name"></textarea>
                </div>
                <div class="form-group">
                    <label for="Register-Password">Password</label>
                    <input type="password" class="form-control" id="R_Password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="Register-CPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="R_CPassword" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        */
        ?>
                        <div class="tab-pane fade active in" id="booking" role="tabpanel" aria-labelledby="booking-tab">
                            <form id="booking-form">
                                <div class="form-group">
                                    <label for="gold-weight">Weight of gold (grams)</label>
                                    <input type="number" min="1" name="weight" class="form-control @error('email') is-invalid @enderror" id="booking-weight" placeholder="weight of gold in grams" value="{{ old('weight') }}" autofocus>
                                </div>
                                <div class="form-group" id="ABS-calc">
                                    <!-- <label for="Register-CPassword">Confirm Password</label> -->
                                </div>
                                <button button="button" id="booking-submit" class="btn btn-primary">Submit</button>
                                <button button="button" id="booking-recheck" class="btn btn-primary">Recheck</button>
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

    <div class="divider"></div>
    
     <section id="cta">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">Sai Jewellers is Trustful and Reliable Company</span></h2>
                <p class="text-center wow fadeInDown" style="font-weight: bold;font-size: 1.2em;">In India, jewellery design has an infinite development potential and humongous customer appetite for the uniqueness. Among all other jewellery disciplines, gold jewellery is eternal in its appeal. It is incredible work of our Indian artisans that relentlessly develops and produces newer designs to satiate Indian consumer. Although they are the workforce behind the curtain, they are seldom celebrated. It is them that needs to be given a platform to showcase their ideas and to encourage them to take their art to a higher level by finding appreciative customers. This benefits the trade as a whole.</p>
            </div>
        </div>
    </section>
    <!--     <section id="cta2" class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h1>Sed ut perspiciatis unde omnis iste</h1>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima.</p>
                </div>
                <div class="col-sm-3 text-right">
                    <a class="btn btn-primary btn-lg" href="#">Buy now</a>
                </div>
            </div>
        </div>
    </section> -->
    <!--/#cta-->
    <!-- <section id="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Sai Jewellers is Trustful and Reliable Company</h2>
                <p class="text-center wow fadeInDown" style="font-weight: bold;font-size: 1.2em;">In India, jewellery design has an infinite development potential and humongous customer appetite for the uniqueness. Among all other jewellery disciplines, gold jewellery is eternal in its appeal. It is incredible work of our Indian artisans that relentlessly develops and produces newer designs to satiate Indian consumer. Although they are the workforce behind the curtain, they are seldom celebrated. It is them that needs to be given a platform to showcase their ideas and to encourage them to take their art to a higher level by finding appreciative customers. This benefits the trade as a whole.</p>
                <p class="text-left wow fadeInDown"></p>
            </div>
        </div>
    </section> -->
    <section id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown custom-heading">Har Ghar Sona Ghar Ghar Sona</h2>
                <p class="text-center wow fadeInDown custom-heading-content">Get Booked 916 Gold Coin & Hallmark {!!$hallmark!!} Jewellery by our Advanced Booking Paymet System <br>with 3 different mode of payment.</p>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="{{url('public/assets/home/images/imgs/falling_gold_coins_acumulate_rupee.png')}}" alt="">
                </div>
                <div class="col-sm-6">
                    @foreach($InstallmentDetails as $Installment)
                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading custom-heading">{{$Installment->name}}</h4>
                            <ul class="custom-heading-content">
                                <li>{{$Installment->locking_period}} month locking period</li>
                                <li>{{$Installment->tenure}} easy installment</li>
                                <li>Advance Booking Down Payment amount is {{$Installment->down_payment}}%</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-gift"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading custom-heading">Benifits</h4>
                            <ul class="custom-heading-content">
                                <li>916 Gold coin & Hallmark {!!$hallmark!!} Jewellery</li>
                                <li>Gcash available in wallet can be used in easy Installment</li>
                                <li>Gcash can be redeemed and transfered in bank account</li>
                                <li>you can participate in our upcomming events</li>
                            </ul>
                            <!-- Button trigger modal -->
                            <br><br>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="services" style="padding: 50px 0;background-color: #eeeeee;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Service</h2>
                <p class="text-center wow fadeInDown">We have provided the best services of jewellery </p>
            </div>
            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-key"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Reparing</h4>
                                <p>We repair all types of Ornament in very less charge. Repairing a jewellery makes it usefull </p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-lock"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">On Demand Orders</h4>
                                <p>We take Orders in case of Emergency like need jewellery needed for wedding,Gift,Function,etc. We also provide ready made jewelleres in effective and under budget col-sm-offset-2</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-power-off"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Cleaning</h4>
                                <p>We clean jewelleries</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                    <?php 
                   /*
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-recycle"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Excepturi Sint</h4>
                                <p>Occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-history"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Harum Quidem</h4>
                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-magic"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Placeat Facere</h4>
                                <p>Omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                    */?>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--/#services-->
    <?php /*
    <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Gallery    </h2>
                <p class="text-center wow fadeInDown"> Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores<br>alias consequatur aut perferendis doloribus asperiores repellat</p>
            </div>

            <div class="text-center">
                <ul class="portfolio-filter">
                    <li><a class="active" href="#" data-filter="*">Perspiciatis</a></li>
                    <li><a href="#" data-filter=".filter1">Voluptatem</a></li>
                    <li><a href="#" data-filter=".filter2">Aperiam</a></li>
                    <li><a href="#" data-filter=".filter3">Inventore</a></li>
                </ul><!--/#portfolio-filter-->
            </div>

            <div class="portfolio-items">
                <div class="portfolio-item filter1">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{url('public/images/portfolio/01.jpg')}}" alt="">
                        <div class="portfolio-info">
                            <h3>Nemo enim ipsam</h3>
                            Voluptatem quia voluptas
                            <a class="preview" href="{{url('public/images/portfolio/01.jpg')}}" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->

                <div class="portfolio-item filter2 filter3">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{url('public/images/portfolio/02.jpg')}}" alt="">
                        <div class="portfolio-info">
                            <h3>Sed quia consequ</h3>
                            Magni dolores eos qui
                            <a class="preview" href="{{url('public/images/portfolio/02.jpg')}}" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->

                <div class="portfolio-item filter1">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{url('public/images/portfolio/03.jpg')}}" alt="">
                        <div class="portfolio-info">
                            <h3>Neque porro</h3>
                            Qui dolorem ipsum quia
                            <a class="preview" href="{{url('public/images/portfolio/03.jpg')}}" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->

                <div class="portfolio-item filter2">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="images/portfolio/04.jpg" alt="">
                        <div class="portfolio-info">
                            <h3>Sed quia non numquam</h3>
                            Eius modi tempora incidunt
                            <a class="preview" href="images/portfolio/04.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->

                <div class="portfolio-item filter1 filter3">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="images/portfolio/05.jpg" alt="">
                        <div class="portfolio-info">
                            <h3>Labore et dolore</h3>
                            Lorem Ipsum Dolor Sit
                            <a class="preview" href="images/portfolio/05.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->

                <div class="portfolio-item filter2">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="images/portfolio/06.jpg" alt="">
                        <div class="portfolio-info">
                            <h3>Quis autem vel</h3>
                            Ut enim ad minima veniam
                            <a class="preview" href="images/portfolio/06.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->

                <div class="portfolio-item filter1 filter3">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="images/portfolio/07.jpg" alt="">
                        <div class="portfolio-info">
                            <h3>Quis nostrum</h3>
                            Exercitationem ullam
                            <a class="preview" href="images/portfolio/07.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->

                <div class="portfolio-item filter2">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="images/portfolio/08.jpg" alt="">
                        <div class="portfolio-info">
                            <h3>Corporis suscipit</h3>
                            Nisi ut aliquid ex ea
                            <a class="preview" href="images/portfolio/08.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->
            </div>
        </div><!--/.container-->
    </section><!--/#portfolio-->
*/ ?>

    <section id="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">About Us</h2>
                <p class="text-center wow fadeInDown">Sai Jewellers is one of the Best Jewellery Designer team.</p>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <h3 class="column-title">Understanding Our System</h3>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">About Me</h3>
                    <p></p>
                    <p>My Name is Avdhesh Soni. I have started a mission to make gold purchase and gold trading as easy as possible by providing our advance Booking System.</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="nostyle">
                                <li><i class="fa fa-check"></i> Trustful</li>
                                <li><i class="fa fa-check"></i> Reliable</li>
                                <li><i class="fa fa-check"></i> Cost Effective</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="nostyle">
                                <li><i class="fa fa-check"></i> Ontime</li>
                                <li><i class="fa fa-check"></i> Professional</li>
                            </ul>
                        </div>
                    </div>
                    <a class="btn btn-primary" href="tel:8976666414">Call Me</a>
                    <a class="btn btn-primary" href="https://api.whatsapp.com/send?phone=8976666414&text=Hi%20I%20came%20here%20from%20your%20website%20">Whatsapp Now</a>
                </div>
            </div>
        </div>
    </section>
    <!--/#about-->
    <!--  <section id="work-process">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Sit amet, Consectetur, Edipisci Velit</h2>
                <p class="text-center wow fadeInDown">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit<br>laboriosam, nisi ut aliquid ex ea commodi consequatur?<br>Quis autem vel eum iure reprehenderit</p>
            </div>

            <div class="row text-center">
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="icon-circle">
                            <span>1</span>
                            <i class="fa fa-area-chart fa-2x"></i>
                        </div>
                        <h3>VELIT</h3>
                    </div>
                </div>
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="icon-circle">
                            <span>2</span>
                            <i class="fa fa-binoculars fa-2x"></i>
                        </div>
                        <h3>QUAM</h3>
                    </div>
                </div>
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="icon-circle">
                            <span>3</span>
                            <i class="fa fa-coffee fa-2x"></i>
                        </div>
                        <h3>MOLESTIAE</h3>
                    </div>
                </div>
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="icon-circle">
                            <span>4</span>
                            <i class="fa fa-bullhorn fa-2x"></i>
                        </div>
                        <h3>EXPEDITA</h3>
                    </div>
                </div>
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="400ms">
                        <div class="icon-circle">
                            <span>5</span>
                            <i class="fa fa-certificate fa-2x"></i>
                        </div>
                        <h3>FUGIAT</h3>
                    </div>
                </div>
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="500ms">
                        <div class="icon-circle">
                            <span>6</span>
                            <i class="fa fa-cogs fa-2x"></i>
                        </div>
                        <h3>LAUNCH</h3>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--/#work-process-->
    <!-- <section id="meet-team">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">OUR TEAM</h2>
                <p class="text-center wow fadeInDown">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,<br>totam rem aperiam, eaque ipsa quae ab illo inventore veritati</p>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive img-circle" src="images/team/01.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Jane Dohan</h3>
                            <span>Co-Founder</span>
                        </div>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="team-img">
                            <img class="img-responsive img-circle" src="images/team/02.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Leny Fuston</h3>
                            <span>Accounter</span>
                        </div>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="team-img">
                            <img class="img-responsive img-circle" src="images/team/03.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Sander Bell</h3>
                            <span>Designer</span>
                        </div>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="team-img">
                            <img class="img-responsive img-circle" src="images/team/04.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Nartleb August</h3>
                            <span>Director</span>
                        </div>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <!-- <div class="divider"></div> -->
            <!-- <div class="row">

                <div class="col-sm-4">
                    <h3 class="column-title">Modi Tempora</h3>
                    <div role="tabpanel">
                        <ul class="nav main-tab nav-justified" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#tab1" role="tab" data-toggle="tab" aria-controls="tab1" aria-expanded="true">2010</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab2" role="tab" data-toggle="tab" aria-controls="tab2" aria-expanded="false">2011</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab3" role="tab" data-toggle="tab" aria-controls="tab3" aria-expanded="false">2013</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab4" role="tab" data-toggle="tab" aria-controls="tab4" aria-expanded="false">2014</a>
                            </li>
                        </ul>
                        <div id="tab-content" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab1" aria-labelledby="tab1">
                                <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p>
                                <p>velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero.</p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab2" aria-labelledby="tab2">
                                <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p>
                                <p>velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero.</p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab3" aria-labelledby="tab3">
                                <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p>
                                <p>velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero.</p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab4" aria-labelledby="tab3">
                                <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p>
                                <p>velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <h3 class="column-title">Similique Sunt</h3>
                    <strong>Voluptas Sit Aspernatur</strong>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary" role="progressbar" data-width="90">85%</div>
                    </div>
                    <strong>Quia Consequuntur</strong>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary" role="progressbar" data-width="85">70%</div>
                    </div>
                    <strong>Neque Porro Quisquam</strong>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary" role="progressbar" data-width="95">90%</div>
                    </div>
                    <strong>Numquam Eius</strong>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary" role="progressbar" data-width="78">65%</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <h3 class="column-title">Dignissimos</h3>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Ducimus qui blanditiis praesentium
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    Deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Nam libero tempore, cum soluta
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    Deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Nobis est eligendi optio cumque 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    Deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> -->
        </div>
    </section>
    <!--/#meet-team-->
    <!--  <section id="animated-number">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Impedit Quo Minus</h2>
                <p class="text-center wow fadeInDown">id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.<br>Temporibus autem quibusdam et aut officiis debitis aut</p>
            </div>

            <div class="row text-center">
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="animated-number" data-digit="1234" data-duration="1000"></div>
                        <strong>Itaque Earum Rerum Hic</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="animated-number" data-digit="3214" data-duration="1000"></div>
                        <strong>Tenetur a Sapiente</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="animated-number" data-digit="4123" data-duration="1000"></div>
                        <strong>Aut Reiciendis</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="animated-number" data-digit="2233" data-duration="1000"></div>
                        <strong>Voluptatibus Maiores</strong>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--/#animated-number-->
    <!--  <section id="pricing">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Our Plans</h2>
                <p class="text-center wow fadeInDown"> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque<br>laudantium, totam rem aperiam, eaque ipsa quae ab illo</p>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="0ms">
                        <ul class="pricing">
                            <li class="plan-header">
                                <div class="price-duration">
                                    <span class="price">
                                        $15
                                    </span>
                                    <span class="duration">
                                        per year
                                    </span>
                                </div>

                                <div class="plan-name">
                                    Plan One
                                </div>
                            </li>
                            <li><strong>10</strong> EXCEPTURL</li>
                            <li><strong>120</strong> NIHIL</li>
                            <li><strong>EXPEDITA</strong> DISCTINTO</li>
                            <li>LUSTO ODIMO ATQUE</li>
                            <li><strong>15</strong> RATIONE COLUPTATEM</li>
                            <li><strong>24/7</strong> SAPIENTE</li>
                            <li class="plan-purchase"><a class="btn btn-primary" href="#">GET NOW</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="200ms">
                        <ul class="pricing featured">
                            <li class="plan-header">
                                <div class="price-duration">
                                    <span class="price">
                                        $28
                                    </span>
                                    <span class="duration">
                                        per year
                                    </span>
                                </div>

                                <div class="plan-name">
                                    Plan Two
                                </div>
                            </li>
                            <li><strong>10</strong> EXCEPTURL</li>
                            <li><strong>120</strong> NIHIL</li>
                            <li><strong>EXPEDITA</strong> DISCTINTO</li>
                            <li>LUSTO ODIMO ATQUE</li>
                            <li><strong>15</strong> RATIONE COLUPTATEM</li>
                            <li><strong>24/7</strong> SAPIENTE</li>
                            <li class="plan-purchase"><a class="btn btn-primary" href="#">GET NOW</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="400ms">
                        <ul class="pricing">
                            <li class="plan-header">
                                <div class="price-duration">
                                    <span class="price">
                                        $40
                                    </span>
                                    <span class="duration">
                                        per year
                                    </span>
                                </div>

                                <div class="plan-name">
                                    Plan Three
                                </div>
                            </li>
                            <li><strong>10</strong> EXCEPTURL</li>
                            <li><strong>120</strong> NIHIL</li>
                            <li><strong>EXPEDITA</strong> DISCTINTO</li>
                            <li>LUSTO ODIMO ATQUE</li>
                            <li><strong>15</strong> RATIONE COLUPTATEM</li>
                            <li><strong>24/7</strong> SAPIENTE</li>
                            <li class="plan-purchase"><a class="btn btn-primary" href="#">GET NOW</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="600ms">
                        <ul class="pricing">
                            <li class="plan-header">
                                <div class="price-duration">
                                    <span class="price">
                                        $58
                                    </span>
                                    <span class="duration">
                                        per year
                                    </span>
                                </div>

                                <div class="plan-name">
                                    Plan Four
                                </div>
                            </li>
                            <li><strong>10</strong> EXCEPTURL</li>
                            <li><strong>120</strong> NIHIL</li>
                            <li><strong>EXPEDITA</strong> DISCTINTO</li>
                            <li>LUSTO ODIMO ATQUE</li>
                            <li><strong>15</strong> RATIONE COLUPTATEM</li>
                            <li><strong>24/7</strong> SAPIENTE</li>
                            <li class="plan-purchase"><a class="btn btn-primary" href="#">GET NOW</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--/#pricing-->
    <?php
/*
    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <div id="carousel-testimonial" class="carousel slide text-center" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <p><img class="img-circle img-thumbnail" src="images/testimonial/01.jpg" alt=""></p>
                                <h4>Yetty L. Steven</h4>
                                <small>Nemo enim ipsam voluptatem quia voluptas sit</small>
                                <p>Aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est</p>
                            </div>
                            <div class="item">
                                <p><img class="img-circle img-thumbnail" src="images/testimonial/02.jpg" alt=""></p>
                                <h4>Gerry Munstons</h4>
                                <small>Itaque earum rerum hic tenetur a sapiente delectus</small>
                                <p>Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Sed ut perspiciatis unde omnis</p>
                            </div>
                        </div>

                        <!-- Controls -->
                        <div class="btns">
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="prev">
                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="next">
                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--/#testimonial-->

    <!-- <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">NOSTRUM ALIQUAM INCIDUNT</h2>
                <p class="text-center wow fadeInDown">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia<br>consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt</p>
            </div>
        </div>
    </section> -->
    <!--/#get-in-touch-->


   <!--  <section id="contact">
        <div id="google-map" style="height:650px" data-latitude="4.688467" data-longitude="-74.051289"></div>
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <div class="contact-form">
                            <h3>Contact Info</h3>

                            <address>
                              <strong>Your Company, Inc.</strong><br>
                              795 Folsom Ave, Suite 600<br>
                              San Francisco, CA 94107<br>
                              <abbr title="Phone">P:</abbr> (123) 456-7890
                          </address>

                          <form id="main-contact-form" name="contact-form" method="post" action="contact-us.send.php">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="8" placeholder="Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--/#bottom-->
*/
    ?>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2019 Sai Jewellers
                </div>
                <div class="col-sm-6">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->
    <script src="{{url('public/assets/home/js/jquery.js')}}"></script>
    <script src="{{url('public/assets/home/js/bootstrap.min.js')}}"></script>
    <?php /*<script src="http://maps.google.com/maps/api/js?sensor=true"></script>  */ ?>
    <script src="{{url('public/assets/home/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('public/assets/home/js/mousescroll.js')}}"></script>
    <script src="{{url('public/assets/home/js/smoothscroll.js')}}"></script>
    <script src="{{url('public/assets/home/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{url('public/assets/home/js/jquery.isotope.min.js')}}"></script>
    <script src="{{url('public/assets/home/js/jquery.inview.min.js')}}"></script>
    <script src="{{url('public/assets/home/js/wow.min.js')}}"></script>
    <script src="{{url('public/assets/home/js/main.js')}}"></script>
    <script src="{{url('public/assets/custom/js/custom.js')}}"></script>
    <!-- countdown timer  -->
    <script type="text/javascript">
    countdown();

  $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
    </script>
</body>

</html>
