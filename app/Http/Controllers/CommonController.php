<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\library\CommonUtilities;

class CommonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return 0;
    }

    public function landingPage($value='')
    {
        $common = new CommonUtilities();
        $common->updateGoldRate();
        return view('home.home',['GoldRate' => $common->GoldRate(), 'InstallmentDetails' => $common->getActiveInstallmentDetail()]);  
    }

    public function loadCalculation(Request $request)
    {
            $common = new CommonUtilities();
            $discountDetail = $common->getActiveDiscountDetail('3');
            if (!$request->session()->has('dp_disc')){
                if($discountDetail->upto == '1')
                    $value = session(['dp_disc' => rand(1,$discountDetail->discount)]);
                else
                    $value = session(['dp_disc' => $discountDetail->discount]);
            }
                // dd($request->session()->get('dp_disc'));
        $rate = $common->get916GoldRate();
        $weight = $request->weight;
        $ttlamt = round($weight * $rate);
        $dp_disc = $request->session()->get('dp_disc');
        $html = '';

            $InstallmentDetails = $common->getActiveInstallmentDetail();
            // dd($InstallmentDetails);
            foreach ($InstallmentDetails as $Installment) {

                $i = 0; $d = 5;
                while(($d+$i) < $Installment->tenure){  $i++; $d = 5 * $i; }
                       
                $dp = round($ttlamt * $Installment->down_payment / 100);
                $inst = round(($ttlamt - $dp) / $d);
                
                $html = $html.'<span style="color:#730242;"><strong style="font-size:1.4em;color:#82030d;">'.$Installment->name.'</strong><span><br>Total Amount to pay : '.$ttlamt. '</span><br><span>Down Payment @'.$Installment->down_payment.'% : '.$dp.'</span><br><span>Congrulation you got ';
                if($discountDetail->discount_type == 'flat')
                    $html = $html.'flat '.$dp_disc.' gcash discount in Down Payment</span><br>';
                else
                    $html = $html.$dp_disc.'%  discount in Down Payment : '.round($dp * $dp_disc * 0.01).' gcash</span><br>';
 
                $html = $html.'<span>Advance Booking Installment amount : '.$inst.'</span></span><br><button type="button" onclick="window.location = \''.url('/book/'.$weight.'/'.$Installment->tenure).'\'" class="btn btn-primary">Book Now</button><br><br>';
            }

            $data = json_encode(['content' => $html]);

            // echo $data;
            return $data;
    }

}
