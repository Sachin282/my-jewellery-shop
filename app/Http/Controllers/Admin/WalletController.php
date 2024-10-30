<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\library\CommonUtilities;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function ManageWallet()
    {
        $common = new CommonUtilities();
        $InstallmentDetail = $common->getInstallmentDetail();
        return view('admin.ManageInstallment',['view'=>'running', 'data'=>$InstallmentDetail]);
    }

    public function RedeemRequested()
    {
    	$common = new CommonUtilities();
    	return view('admin.ManageRedeem',['Redeems' => $common->getRedeemRequested()]);
    }

    public function RedeemApproved()
    {
    	$common = new CommonUtilities();
    	return view('admin.ManageRedeem',['Redeems' => $common->getRedeemApproved()]);
    }

    public function RedeemRejected()
    {
    	$common = new CommonUtilities();
    	return view('admin.ManageRedeem',['Redeems' => $common->getRedeemRejected()]);
    }

    public function RedeemAll()
    {
    	$common = new CommonUtilities();
    	return view('admin.ManageRedeem',['Redeems' => $common->getRedeemAll()]);
    }

    public function Redeem($status='')
    {
    	$common = new CommonUtilities();
    	return view('admin.ManageRedeem',['Redeems' => $common->getRedeemAll(), 'status' => strtolower($status), 'users' =>$common->getUser()]);
    }

    public function RedeemUpdate(Request $request)
    {
    	$common = new CommonUtilities();
    	$RedeemPending = $common->getRedeemRequested();
    	foreach ($RedeemPending as $Redeem) {
    		$status = 'redeem_status_'.$Redeem->id;
    		DB::table('redeemed')->where('id',$Redeem->id)->update(['status'=> $request->$status]);
    	}
    	return \Redirect()->back();
    }

    
}
