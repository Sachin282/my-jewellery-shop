<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use App\library\CommonUtilities;


class HomeController extends Controller
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
        $Gcash = $common->getRedeemableGcash($userDetail->id);
        $RunningOrders = $common->getRunningOrder($userDetail->id);
        // foreach ($RunningOrders as $Running) {
        //     $Installments = $common->getInstallments($Running->order_id);
        //     foreach ($Installments as $installment) {
        //         if(strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d',strtotime('-7 day',strtotime($installment->inst_date))))){
        //             dd(strtotime(date('Y-m-d')).'--'.);
        //         }
        //     }
        // }
        // $upcomming
        DB::table('users')->where('id',$userDetail->id)->update(['gcash' => $Gcash]);
        return view('user.home',['userDetail' => $userDetail, 'RunningOrders' => $RunningOrders, 'Gcash' => $Gcash]);
        // return view('user.dashboard',['userDetail' => $userDetail, 'RunningOrders' => $RunningOrders, 'Gcash' => $Gcash]);
    }

    public function ManageUser($value='')
    {
        $userDetail = Auth::user();
        return view('user.user',['userDetail' => $userDetail]);
    }

    public function UpdateUser(Request $request)
    {
        if(DB::table('users')->where('id',Auth::user()->id)->update(['name' => $request->name, 'phone' => $request->phone, 'address' => $request->address, 'city' => $request->city, 'zip' => $request->zip,'updated_at' => date('Y-m-d H:i:s')]))
            return redirect()->back()->with('success','Profile updated successfully. Thank You!');
        else
            return redirect()->back()->with('error','Something went wrong, Please  try again later.');
    }
    
}
