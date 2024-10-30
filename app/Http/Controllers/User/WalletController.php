<?php

namespace App\Http\Controllers\User;

use DB;
use Auth;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $common = new CommonUtilities();
        $userDetail = Auth::user();
        $AvailableGcash = $common->getAvailableGcash($userDetail->id);
        $RedeemableGcash = $common->getRedeemableGcash($userDetail->id);
        $RunningOrders = $common->getRunningOrder($userDetail->id);
        $ReferredUsers = $common->getReferredUsers($userDetail->id);
        $BankDetail = $common->getBankDetail($userDetail->id);
        return view('user.wallet',['userDetail' => $userDetail, 'RunningOrders' => $RunningOrders, 'AvailableGcash' => (int)$AvailableGcash, 'RedeemableGcash' => (int)$RedeemableGcash, 'ReferredUsers' => $ReferredUsers,'BankDetail' => $BankDetail]);
    }

   public function ManageUserOrder($OrderId='')
    {
        $common = new CommonUtilities();
        $userDetail = Auth::user();
        $RunningOrders = $common->getRunningOrder($userDetail->id);
        $InstallmentDetail = array();
        if(!empty($OrderId)){
            $Installments = $common->getInstallments($OrderId);
            $RunningOrders = DB::table('orders')->where('id',$OrderId)->first();
        return view('user.ManageOrders',['RunningOrders' => $RunningOrders, 'installments' => $Installments]);
        }
        return view('user.ManageOrders',['RunningOrders' => $RunningOrders]);
    }

    public function RedeemGcash(Request $request)
    {
        $common = new CommonUtilities();
        $userDetail = Auth::user();
        $BankDetail = $common->getBankDetail($userDetail->id);
        $BankDetailUpdate = array();
        if(!empty($BankDetail)){
        if($BankDetail->name_in_bank != $request->UserName_in_bank)
            $BankDetailUpdate = $BankDetailUpdate+['name_in_bank' => $request->UserName_in_bank];
        if($BankDetail->account_no != $request->AccountNumber)
            $BankDetailUpdate = $BankDetailUpdate+['account_no' => $request->AccountNumber];
        if($BankDetail->ifsc != $request->IFSC)
            $BankDetailUpdate = $BankDetailUpdate+['ifsc' => $request->IFSC];
        if(!empty($BankDetailUpdate))
            DB::table('bank_detail')->where('uid',$userDetail->id)->update($BankDetailUpdate);
    }
    else{
        $BankDetailUpdate = [
                'uid' => $userDetail->id,
                'name_in_bank' => $request->UserName_in_bank,
                'account_no' => $request->AccountNumber,
                'ifsc' => $request->IFSC
            ];
            DB::table('bank_detail')->insert($BankDetailUpdate);
    }
        
        $BankDetail = $common->getBankDetail($userDetail->id);

        DB::table('redeemed')->insert([
            'uid' => $userDetail->id,
            'Amount' => $request->redeem_gcash,
            'status' => 'pending',
            'created_at' => Date('Y-m-d H:i:s')
        ]);

        session(['message' => 'Request Sent, Our admin will review as soon as possible']);
        return \Redirect::to(route('user.wallet'));
    }

}
