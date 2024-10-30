<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\library\CommonUtilities;
use App\Http\Controllers\Controller;

class InstallmentController extends Controller
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

    public function ManageInstallment()
    {
        $common = new CommonUtilities();
        $InstallmentDetail = $common->getInstallmentDetail();
        return view('admin.ManageInstallment',['view'=>'running', 'data'=>$InstallmentDetail]);
    }

    public function UpdateInstallment(Request $request)
    {
        $common = new CommonUtilities();
        $InstallmentDetail = $common->getInstallmentDetail();

        foreach ($InstallmentDetail as $installment) {
            $dp = 'dp_'.$installment->id;
            $name = 'name_'.$installment->id;
            $tenure = 'tenure_'.$installment->id;
            $locking = 'locking_'.$installment->id;
            $status = 'status_'.$installment->id;
            $delay = 'delay_'.$installment->id;

            DB::table('installment_detail')->where('id',$installment->id)->update([
                    'name' => $request->$name,
                    'tenure' => $request->$tenure,
                    'locking_period' => $request->$locking,
                    'down_payment' => $request->$dp,
                    'delay_fine' => $request->$delay,
                    'status' => $request->$status
                ]);
        }
        
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
