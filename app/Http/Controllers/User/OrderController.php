<?php

namespace App\Http\Controllers\User;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\library\encdec_paytm;
use App\library\CommonUtilities;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.dashboard');
    }

   public function ManageUserOrder($OrderId='')
    {
        $common = new CommonUtilities();
        $userDetail = Auth::user();
        $RunningOrders = $common->getRunningOrder($userDetail->id);
        $PendingOrders = $common->getPendingOrder($userDetail->id);
        $Gcash = (int)$common->getRedeemableGcash($userDetail->id);
        $InstallmentDetail = array();
        if(!empty($OrderId)){

            $Installments = $common->getInstallments($OrderId);
            if($Installments[0]->uid != $userDetail->id)
                    return Redirect()->route('user.order');
            
            $RunningOrders = DB::table('orders')->where('id',$OrderId)->first();
            return view('user.ManageOrders',['RunningOrders' => $RunningOrders, 'installments' => $Installments,'Gcash'=>$Gcash]);
        }
        return view('user.ManageOrders',['RunningOrders' => $RunningOrders, 'PendingOrders' => $PendingOrders,'Gcash'=>$Gcash]);
    }

}
