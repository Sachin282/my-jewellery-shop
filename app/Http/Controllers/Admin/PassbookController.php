<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\library\CommonUtilities;
use App\Http\Controllers\Controller;

class PassbookController extends Controller
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

    public function index($status)
    {
        $common = new CommonUtilities();

        if($status == 'Incomming'){
            $data = DB::table('payments')->where('payments.status','TXN_SUCCESS')->rightJoin('users','payments.uid','users.id')->select('users.code','payments.paid_for','payments.amount','payments.PaymentOrderId','payments.transaction_id','payments.status','payments.created_at')->get();

        }
        if($status == 'Outgoing'){
            $data = DB::table('redeemed')->where('redeemed.status','approved')->rightJoin('users','redeemed.uid','users.id')->select('users.code','redeemed.status','redeemed.amount','redeemed.created_at','redeemed.updated_at')->get();

        }
        return view('admin.ManagePassbook',['status'=> $status, 'data'=>$data]);
    }

    public function UpdateInstallment(Request $request)
    {
        $common = new CommonUtilities();
        $name1 = $request->name_1;
        $tenure1 = $request->tenure_1;
        $lock1 = $request->locking_1;
        $dp1 = $request->dp_1;
        $inst1 = $request->inst_1;
        $delay1 = $request->delay_1;

        $name2 = $request->name_2;
        $tenure2 = $request->tenure_2;
        $lock2 = $request->locking_2;
        $dp2 = $request->dp_2;
        $inst2 = $request->inst_2;
        $delay2 = $request->delay_2;

        $name3 = $request->name_3;
        $tenure3 = $request->tenure_3;
        $lock3 = $request->locking_3;
        $dp3 = $request->dp_3;
        $inst3 = $request->inst_3;
        $delay3 = $request->delay_3;

        DB::table('installment_detail')->where('id','1')->update([
                    'name' => $name1,
                    'tenure' => $tenure1,
                    'locking_period' => $lock1,
                    'down_payment' => $dp1,
                    'delay_fine' => $delay1,
                    'status' => $request->status_1
                ]);
        DB::table('installment_detail')->where('id','2')->update([
                    'name' => $name2,
                    'tenure' => $tenure2,
                    'locking_period' => $lock2,
                    'down_payment' => $dp2,
                    'delay_fine' => $delay2,
                    'status' => $request->status_2
                ]);
        DB::table('installment_detail')->where('id','3')->update([
                    'name' => $name3,
                    'tenure' => $tenure3,
                    'locking_period' => $lock3,
                    'down_payment' => $dp3,
                    'delay_fine' => $delay3,
                    'status' => $request->status_3
                ]);
        
        $InstallmentDetail = $common->getInstallmentDetail();
        return view('admin.ManageInstallment',['view'=>'running', 'data'=>$InstallmentDetail]);
    }


    public function ManageJewellery($id='')
    {
// Get the full URL for the previous request...
        $common = new CommonUtilities();
           
            $jewelleryDetail = $common->getJewelleryDetail();
            return view('admin.Manage-Jewellery',['jewelleryDetail' => $jewelleryDetail]);
    }

    public function UpdateJewellery(Request $request,$id='')
    {
        $common = new CommonUtilities();
                // DB::enableQueryLog();
        $sql = DB::table('j_type')
                ->where('id',$request->j_type)
                ->update([
                    'price' => $request->gold_price,
                    'making_charge' => $request->making_charge
                    ]);

        // $queries = DB::getQueryLog();
        // dd($queries);

        //    dd($sql);

            $jewelleryDetail = $common->getJewelleryDetail();
            return view('admin.Manage-Jewellery',['jewelleryDetail' => $jewelleryDetail]);
    }

}
