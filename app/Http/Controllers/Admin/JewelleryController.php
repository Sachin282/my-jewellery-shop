<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\library\CommonUtilities;
use App\Http\Controllers\Controller;

class JewelleryController extends Controller
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

    public function ManageInstallment()
    {
        $common = new CommonUtilities();
        $PendingOrders = $common->getRunningOrder();
        
        return view('admin.ManageOrders',['view'=>'running', 'data'=>$PendingOrders]);
    }

    public function completed()
    {
        $common = new CommonUtilities();
        $PendingOrders = $common->getCompletedOrder();
        
        return view('admin.ManageOrders',['view'=>'completed', 'data'=>$PendingOrders]);
    }

    public function ManageDiscount()
    {
        $common = new CommonUtilities();
        $DiscountDetail = $common->getDiscountDetail();
        return view('admin.ManageDiscount',['view'=>'completed', 'data'=>$DiscountDetail]);

    }

    public function UpdateDiscount(Request $request)
    {
        $common = new CommonUtilities();
        $DiscountDetail = $common->getDiscountDetail();
        foreach ($DiscountDetail as $discount) {
            $name = 'name_'.$discount->id;
            $type = 'type_'.$discount->id;
            $discount_value = 'discount_'.$discount->id;
            $discount_type = 'discount_type_'.$discount->id;
            $upto = 'upto_'.$discount->id;
            $status = 'status_'.$discount->id;

            DB::table('gcash_option')->where('id',$discount->id)->update([
                    'name' => $request->$name,
                    'type' => $request->$type,
                    'discount' => $request->$discount_value,
                    'discount_type' => $request->$discount_type,
                    'upto' => ($request->$upto == 'on')? '1' : '0',
                    'status' => $request->$status,
                ]);

        }

        return \Redirect()->route('discount.manage');
       
    }
}
