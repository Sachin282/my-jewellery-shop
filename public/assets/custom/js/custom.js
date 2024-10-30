$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var weburl = window.location.origin;
var booking_form_submission = 0;


$('#login-tab').hide();
$('#signup-tab').hide();


// $('#home-login-form').on('submit', function(e) {
//     e.preventDefault();
//     $.post($(this).attr('action'), $(this).serialize(), function() {
//             alert("success");
//             $.post('/authentication', {}, function(response) {
//                 alert('response');
//                 console.log('response' + response);
//             });
//         }).done(function(success) {
//           booking_form_submission = 0;
//             console.log(success.fail)
//             $('#csrf_book').html('');
//             $('#login').removeClass('active in');
//             $('#login-tab').removeClass('active');
//             $('#booking-tab').addClass('active');
//             $('#booking').addClass(' active in');

//             $('#login-tab').show();
//             $('#booking-tab').hide();
//         })
//         .fail(function(err) {
//             alert("error");
//             var errors = err.responseText;
//             var error = JSON.parse(errors);
//             console.log('message : '+error.message+'<br>email :'+error.email);
//             $('#login-error').html('<strong style="color:red;"> Email ID or password is incorrect</strong>');
//         })
//         .always(function() {
//             console.log('finished');
//         });
// });



//     console.log(booking_form_submission);
//     if (booking_form_submission == '0')
//         $.get(weburl+"/Authenticate", {}, function() {}).done(function(success) {
//             if (success == '1') {
//               if($('#booking-submit').html() == 'Submit'){
//                     loadCalculation();
//                   }
//                   else{
//                     booking_form_submission = 1;
//                     window.location = 'book/'+$('#booking-weight').val()+'/'
//                     $('#booking-form').submit();
//                   }

//             } else {
//                 if($('#booking-submit').html() == 'Submit'){
//                   console.log('in else if');
//                     loadCalculation();
//                   }else{
//                   console.log('in else else');
//                     $('#login').addClass('active in');
//                     $('#login-tab').addClass('active');
//                     $('#booking-tab').removeClass('active');
//                     $('#booking').removeClass('active in');

//                     $('#login-tab').show();
//                     $('#booking-tab').hide();
//                   }
//             }
//         })
//         .fail(function(err) {
//             alert("error");
//             var error = err.responseText;
//             console.warn("{{route('Authenticate')}}");
//             console.log(error);
//             $('#login-error').html('<strong> Email ID or password is incorrect</strong>');
//         })
//         .always(function() {
//             console.log('finished');
//         });
// });

$('#booking-form').on('submit', function(e) {
    e.preventDefault();
    $('#booking-submit').hide();
    loadCalculation();
});

// $('#booking-submit').on('click', function(e) {
//     e.preventDefault();
//     $('#booking-submit').hide();
//     loadCalculation();
// });

$('#booking-recheck').on('click', function(e) {
    e.preventDefault();
    loadCalculation();
});

function loadCalculation() {
    $.get("loadCalculation", { 'weight': $('#booking-weight').val() }, function() {}).done(function(success) {

        var response = jQuery.parseJSON(success);
        $('#ABS-calc').html(response.content);
        $('#booking-submit').html('Book Now');
        $('#booking-submit').hide();
    });
}

function setTenure(arg) {
    $('#tenure').val(arg);
    $('#booking-form').submit();
}


//code for flipping countdown timer


function countdown() {
    var now = new Date();
    var eventDate = new Date(2019, 12, 12);
    var currentTime = now.getTime();
    var eventTime = eventDate.getTime();
    var remTime = eventTime - currentTime;

    var s = Math.floor(remTime / 1000);
    var m = Math.floor(s / 60);
    var h = Math.floor(m / 60);
    var d = Math.floor(h / 24);

    // console.log('d'+d+'h'+h+'m'+m+'s'+s);

    h %= 24;
    m %= 60;
    s %= 60;

    // document.getElementById('days').innerHTML = d + "D ";
    // document.getElementById('hours').innerHTML = h + "h:";
    // document.getElementById('minutes').innerHTML = m + "m:";
    // document.getElementById('seconds').innerHTML = s + "s";

    setTimeout(countdown, 1000);
}


// var myNode = document.getElementByClassName("row-fluid")[0];
// while (myNode.firstChild) {
//     myNode.removeChild(myNode.firstChild);
// }

// function detectmob() {
//     if (navigator.userAgent.match(/Android/i) ||
//         navigator.userAgent.match(/webOS/i) ||
//         navigator.userAgent.match(/iPhone/i) ||
//         navigator.userAgent.match(/iPad/i) ||
//         navigator.userAgent.match(/iPod/i) ||
//         navigator.userAgent.match(/BlackBerry/i) ||
//         navigator.userAgent.match(/Windows Phone/i)
//     ) {
//         document.getElementById('slider1').style.backgroundImage = "url('sai-jewellers.com/public/assets/home/images/slider/slider_mobile_black.png')";
//         document.getElementById('slider2').style.backgroundImage = "url('sai-jewellers.com/public/assets/home/images/slider/slider_mobile_red.png')";
//     } else {
//         document.getElementById('slider1').style.backgroundImage = "url('sai-jewellers.com/public/assets/home/images/slider/hgsggs_right_r.png')";
//         document.getElementById('slider2').style.backgroundImage = "url('sai-jewellers.com/public/assets/home/images/slider/sone_pe_suhaga.png')";
//     }
// }

function detectmob() {
    if (navigator.userAgent.match(/Android/i) ||
        navigator.userAgent.match(/webOS/i) ||
        navigator.userAgent.match(/iPhone/i) ||
        navigator.userAgent.match(/iPad/i) ||
        navigator.userAgent.match(/iPod/i) ||
        navigator.userAgent.match(/BlackBerry/i) ||
        navigator.userAgent.match(/Windows Phone/i)
    ) {
        $('#mobile_slider_1').show();
        $('#desktop_slider_1').hide();
        $('#mobile_slider_2').show();
        $('#desktop_slider_2').hide();
        /*document.getElementById('mobile_slider_1').style.display = 'block';
        document.getElementById('desktop_slider_1').style.display = 'none';
        document.getElementById('mobile_slider_2').style.display = 'block';
        document.getElementById('desktop_slider_2').style.display = 'none';*/


        // document.getElementById('slider1').style.backgroundSize = "background-size: 411px 560px;";
        // document.getElementById('slider2').style.backgroundSize = "background-size: 411px 560px;";

        // document.getElementById('slider1').style.backgroundImage = "url(" + weburl + "/public/assets/home/images/slider/slider_mobile_black.png)";
        // document.getElementById('slider2').style.backgroundImage = "url(" + weburl + "/public/assets/home/images/slider/banner_ad.jpeg)";
    } else {
        
        $('#mobile_slider_1').hide();
        $('#desktop_slider_1').show();
        $('#mobile_slider_2').hide();
        $('#desktop_slider_2').show();

        // document.getElementById('mobile_slider_1').style.display = 'none';
        // document.getElementById('desktop_slider_1').style.display = 'block';
        // document.getElementById('mobile_slider_2').style.display = 'none';
        // document.getElementById('desktop_slider_2').style.display = 'block';

        // document.getElementById('slider1').style.backgroundImage = "";
        // document.getElementById('slider1').style.backgroundImage = "";
        // document.getElementById('slider2').style.backgroundImage = "url(" + weburl + "/public/assets/home/images/slider/sone_pe_suhaga.png)";
        // document.getElementById('slider2').style.backgroundImage = "url(" + weburl + "/public/assets/home/images/slider/sone_pe_suhaga.png)";
    }
}
