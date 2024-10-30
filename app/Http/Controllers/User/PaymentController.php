<?php

namespace App\Http\Controllers\User;

use DB;
use Auth;
use Mail;
use Session;
use Illuminate\Http\Request;
use App\library\encdec_paytm;
use App\library\CommonUtilities;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
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

    public function MakePayment()
    {
        return view('home.PaytmKit.TxnTest');
    }
    
    public function PaymentDone(Request $request)
    {
        // dd($request->input());
        $common = new CommonUtilities();
        $paytm = new encdec_paytm();
        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";
        $OrderDetail = DB::table('orders')
                    ->where('id',DB::table('payments')->where('PaymentOrderID',$request->ORDERID)->first()->OrderId)
                    ->first();
        // $OrderID =$common->decode_compression($OrderID);
        Session::forget('dp_disc');
        $checkPageVisit = DB::table('installments')->where('oid',$OrderDetail->id)->first();

        if(!empty($checkPageVisit))
            return 'cant acess this page'; //OR - return view('home')->with('message','can\'t access that page');

        $paramList = $request->input();
        $paytmChecksum = isset($request->CHECKSUMHASH) ? $request->CHECKSUMHASH : ""; 
        $isValidChecksum = $paytm->verifychecksum_e($paramList, config('paytm.PAYTM_MERCHANT_KEY'), $paytmChecksum); 
           
                    $Payment = [
                            'transaction_id'=> $request->TXNID,  //for the type of gold ie. coin or jewellery
                            'CURRENCY' => $request->CURRENCY,   //j_id is for idjewellery if prouct is in jewellery form
                            'RESPCODE' => $request->RESPCODE,
                            'RESPMSG' => $request->RESPMSG,
                            'BANKTXNID' => $request->BANKTXNID,
                            'CHECKSUMHASH' => $request->CHECKSUMHASH,
                            'status' => $request->STATUS,   
                            'updated_at' => date('Y-m-d H:i:s')
                        ];

                    DB::table('payments')->where('OrderID',$request->ORDERID)->update($Payment);

    if(env('MY_WORKING_MODE') == 'Debug'){
    $isValidChecksum = 'TRUE'; 
}

    if($isValidChecksum == "TRUE") {
        if($request->STATUS == "TXN_SUCCESS"){

             $nextDate = Date('d-m-Y');

            for ($i=1; $i <= $OrderDetail->tenure; $i++) { 
                $nextDate = Date('d-m-Y', strtotime('+1 month',strtotime($nextDate)));  

                        $installment = [
                            'uid' => Auth::user()->id,
                            'oid' =>$OrderDetail->id,
                            'inst_no'=> $i,  //for the type of gold ie. coin or jewellery
                            'inst_date' => date('Y-m-d', strtotime($nextDate)),   //j_id is for idjewellery if prouct is in jewellery form
                            'amount' => $OrderDetail->installment_amount,
                            'discount' => 0,
                            'delay_fine' => 0,
                            'status' => 'pending',
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        DB::table('installments')->insert($installment);
                    }


                    DB::table('orders')->where('order_id',$OrderDetail->order_id)->update(['status' => 'running','updated_at'=>date('Y-m-d H:i:s')]);
                    return view('user.PaymentThankyou',['parameter' => $request->input()]);
                } 
                else{

                    DB::table('orders')->where('order_id',$OrderDetail->order_id)->update(['status' => 'cancelled','updated_at'=>date('Y-m-d H:i:s')]);
                    return view('user.PaymentThankyou',['parameter' => $request->input()]);
                }
            }
            else {
                DB::table('orders')->where('order_id',$OrderDetail->order_id)->update(['status' => 'cancelled','updated_at'=>date('Y-m-d H:i:s')]);
                return view('user.PaymentThankyou',['parameter' => $request->input()]);
            }
        }

        public function book($weight,$tenure,Request $request)
        {
            $common = new CommonUtilities();
            $paytm = new encdec_paytm();

            $checkSum = "";
            $parameter = array();
            $userDetail = Auth::user();
            $rate = $common->get916GoldRate();
            $TotalAmount = $weight * $rate;

        if(!$request->session()->has('dp_disc')){
             return \Redirect::route('landing-page');
        }

            $referenceDownPaymentDiscountDetail = $common->getActiveDiscountDetail('1');
            $DownPaymentdiscountDetail = $common->getActiveDiscountDetail('3');
            $InstallmentDetails = $common->getInstallmentDetail();
            foreach ($InstallmentDetails as $Installment) {
                    if($Installment->tenure == $tenure){

                        $DownPayment = ($TotalAmount * $Installment->down_payment)/100;
                        $PaymentAmount = $TotalAmount - $DownPayment;
                        $i = 0; $d = 5;
                        while(($d+$i) < $Installment->tenure){  $i++; $d = 5 * $i; }
                        $installment = $PaymentAmount / $d;
                        $OrderID = $common->getNewOrderID();
                        $dp_disc = ($request->session()->get('dp_disc') <= $DownPaymentdiscountDetail->discount)? $request->session()->get('dp_disc') : '1'; 
                        $TXN_AMOUNT = $DownPayment;
                    }
            }
            $PaymentOrderID = $common->getNewOrderID();
            $Order = [
                'uid' => $userDetail->id,
                'order_id' =>$OrderID,
                'j_type'=> '1',  //for the type of gold ie. coin or jewellery
                'j_id' => '1',   //j_id is for id of the jewellery if prouct is in jewellery form
                'price' => floor($TotalAmount),
                'weight' => $weight,
                'tenure' => $tenure,
                'down_payment' => floor($DownPayment),
                'discount_type' => $DownPaymentdiscountDetail->discount_type,
                'discount' => $dp_disc,
                'reference_discount_type' => $referenceDownPaymentDiscountDetail->discount_type,
                'reference_discount' => $referenceDownPaymentDiscountDetail->discount,
                'installment_amount' => $installment,
                'paid_installment' => '0',
                'pending_installment' => $tenure,
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s')
        ];
        // if(!empty($DownPaymentdiscountDetail))
        //     $Order = $Order+['']


        $orderInsert = DB::table('orders')->insertGetId($Order);

        $payment = [
            'uid' => $userDetail->id,
            'OrderID' => $orderInsert,
            'amount' => floor($DownPayment),
            'paid_for' => 'Down Payment',
            'PaymentOrderID' => $PaymentOrderID,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $paymentInsert = DB::table('payments')->insert($payment);
        // $OrderID_encode = $common->encode_compression($OrderID);
        
        $parameter = [ 
            // 'OrderID' => $common->encode_compression($OrderID),
            'MID' => config('paytm.PAYTM_MERCHANT_MID'),
            'ORDER_ID' => $PaymentOrderID,
            'CUST_ID' => $userDetail->id,
            'INDUSTRY_TYPE_ID' => 'Retail',
            'CHANNEL_ID' => 'WEB',
            'TXN_AMOUNT' => round($TXN_AMOUNT),
            'WEBSITE' =>config('paytm.PAYTM_MERCHANT_WEBSITE'),
            'CALLBACK_URL' => url('/payment-done/Thankyou/'),

            // 'MSISDN' => $MSISDN,
            // 'EMAIL' => $EMAIL,
            // 'VERIFIED_BY' => $VERIFIED_BY,
            // 'IS_USER_VERIFIED' => "YES"
        ];
        $checkSum = $paytm->getChecksumFromArray($parameter,config('paytm.PAYTM_MERCHANT_KEY'));
        $parameter += ['CHECKSUMHASH' => $checkSum];

        $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
        $PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
        if (config('paytm.PAYTM_ENVIRONMENT') == 'PROD') {
            $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
            $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
        }

            // $orderInsert = 1; $paymentInsert = 1;
        
        if($orderInsert && $paymentInsert)
        {
            return view('Payment.sendPaymentRequest',['parameter' => $parameter,'url' => $PAYTM_TXN_URL]);

            // $res = $client->request('POST', $PAYTM_TXN_URL,$parameter);
            // $res->send();
            // return \Redirect('https://securegw-stage.paytm.in/theia/processTransaction/'.$parameter);
            // return \Redirect::route('payment-done/Thankyou/'.Crypt::encryptString($OrderID));
        }
        else{
            return 'Something went wrong, Please try again';
        }
    }

     public function ReplaceOrder($OrderId)
        {
            $common = new CommonUtilities();
            $paytm = new encdec_paytm();
            $checkSum = "";
            $parameter = array();
            $userDetail = Auth::user();
            $PaymentOrderID = $common->getNewOrderID();
            $orderDetail = $common->getOrderDetailById($OrderId);

            $paymentDetail = DB::table('payments')->where('OrderId',$orderDetail->order_id)->where('paid_for','Down Payment')->first();

        $paymentUpdate = DB::table('payments')->where('id',$paymentDetail->id)->update(['PaymentOrderID' => $PaymentOrderID]);
        
        $parameter = [ 
            'MID' => config('paytm.PAYTM_MERCHANT_MID'),
            'ORDER_ID' => $PaymentOrderID,
            'CUST_ID' => $userDetail->id,
            'INDUSTRY_TYPE_ID' => 'Retail',
            'CHANNEL_ID' => 'WEB',
            'TXN_AMOUNT' => $paymentDetail->amount,
            'WEBSITE' =>config('paytm.PAYTM_MERCHANT_WEBSITE'),
            'CALLBACK_URL' => url('/payment-done/Thankyou/')
        ];

        $checkSum = $paytm->getChecksumFromArray($parameter,config('paytm.PAYTM_MERCHANT_KEY'));
        $parameter += ['CHECKSUMHASH' => $checkSum];

        $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
        $PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
        if (config('paytm.PAYTM_ENVIRONMENT') == 'PROD') {
            $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
            $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
        }

        
        if($paymentUpdate)
        {
            return view('Payment.sendPaymentRequest',['parameter' => $parameter,'url' => $PAYTM_TXN_URL]);
        }
        else{
            return 'Something went wrong, Please try again';
        }
    }

    public function ReplaceOrderResponse(Request $request)
    {
        dd($request);
    }

    public function PayInstallment(Request $request)
    {

        $common = new CommonUtilities();
        $paytm = new encdec_paytm();
        $id = $request->id;
        $gcash = $request->redeem_gcash;
        $checkSum = "";
        $parameter = array();
        $userDetail = Auth::user();
        $Installment = $common->getInstallmentById($id);
        $orderDetail = $common->getOrderDetailById($Installment->oid);
        $OrderID = $orderDetail->order_id;
        $TXN_AMOUNT = $Installment->amount;
        $discountDetail = $common->getActiveDiscountDetail('4');
        $referenceInstallmentDiscount = $common->getActiveDiscountDetail('1'); 
        $PaymentOrderID = $common->getNewOrderID();
        $RedeemableGcash = $common->getRedeemableGcash($userDetail->id);

        $limit = $Installment->amount*5/100;
        if($limit <= $RedeemableGcash) 
            $redeemable = floor($limit);
        else
            $redeemable = $GCash;

        if($gcash <= $redeemable)
            $TXN_AMOUNT = $TXN_AMOUNT - $gcash;
        else{
            $redeemable = 0;
            echo "<script>alert('insuffucient Gcash')</script>";
        }

        if($discountDetail->upto == '1')
            $dp_disc = rand(1,$discountDetail->discount);
        else
            $dp_disc = $discountDetail->discount;
        $payment = [
            'uid' => $userDetail->id,
            'OrderID' =>$orderDetail->id,
            'PaymentOrderId' =>$PaymentOrderID,
            'amount' => floor($TXN_AMOUNT),
            'gcash_redeemed' => $redeemable,
            'paid_for' => 'Installment',
            'created_at' => date('Y-m-d H:i:s')
        ];
        // $paid_term = count(DB::table('installments')->where('oid',$OrderID)->where('status','paid')->get());

        
        $InstallmentDetail = DB::table('installment_detail')->where('tenure',$orderDetail->tenure)->get();
        $delay_fine = 0;
        if(strtotime(date('d-m-Y')) > strtotime(date('d-m-Y',strtotime($Installment->inst_date)))){
            $delay_fine = (!empty($InstallmentDetail->delay_fine))? $InstallmentDetail->delay_fine:100;
            $TXN_AMOUNT = $TXN_AMOUNT+$delay_fine;
        }

        $installmentUpdate = [
                            'discount' => $dp_disc,
                            'discount_type' =>$discountDetail->discount_type,
                            'reference_discount'=> $referenceInstallmentDiscount->discount,  
                            'reference_discount_type' => $referenceInstallmentDiscount->discount_type, 
                            'amount' => $orderDetail->installment_amount,
                            'gcash_redeemed' => $redeemable,
                            'delay_fine' => ($delay_fine != 0)? $delay_fine : 0,
                            'created_at' => date('Y-m-d H:i:s')
                        ];

        $paymentInsert = DB::table('payments')->insert($payment);
        DB::table('installments')->where('id',$id)->update($installmentUpdate);
        $parameter = [ 
            'MID' => config('paytm.PAYTM_MERCHANT_MID'),
            'ORDER_ID' => $PaymentOrderID,
            'CUST_ID' => $userDetail->id,
            'INDUSTRY_TYPE_ID' => 'Retail',
            'CHANNEL_ID' => 'WEB',
            'TXN_AMOUNT' => round($TXN_AMOUNT),
            'WEBSITE' =>config('paytm.PAYTM_MERCHANT_WEBSITE'),
            'CALLBACK_URL' => route('payment.Installment.response')
        ];
        $checkSum = $paytm->getChecksumFromArray($parameter,config('paytm.PAYTM_MERCHANT_KEY'));
        $parameter += ['CHECKSUMHASH' => $checkSum];

        $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
        $PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
        if (config('paytm.PAYTM_ENVIRONMENT') == 'PROD') {
            $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
            $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
        }
        session(['payment_installment_Id' => $id]);
        if($paymentInsert)
        {
            return view('Payment.sendPaymentRequest',['parameter' => $parameter,'url' => $PAYTM_TXN_URL]);
        }
        else{
            return 'Something went wrong, Please try again';
        }
    }

    public function PayInstallmentResponse(Request $request)
    {
        $common = new CommonUtilities();
        $paytm = new encdec_paytm();
        $installment_Id  = $request->session()->get('payment_installment_Id');
        Session::forget('payment_installment_Id');
        Session::forget('dp_disc');

        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";
        $PaymentOrderID = $request->ORDERID;
        $OrderDetail = DB::table('orders')
                    ->where('id', DB::table('payments')->where('PaymentOrderID',$request->ORDERID)->first()->OrderId)
                    ->first();
        $paramList = $request->input();
        $paytmChecksum = isset($request->CHECKSUMHASH) ? $request->CHECKSUMHASH : ""; 
    $isValidChecksum = $paytm->verifychecksum_e($paramList, config('paytm.PAYTM_MERCHANT_KEY'), $paytmChecksum); 
           
                    $Payment = [
                            'transaction_id'=> $request->TXNID,  //for the type of gold ie. coin or jewellery
                            'CURRENCY' => $request->CURRENCY,   //j_id is for idjewellery if prouct is in jewellery form
                            'RESPCODE' => $request->RESPCODE,
                            'RESPMSG' => $request->RESPMSG,
                            'BANKTXNID' => $request->BANKTXNID,
                            'CHECKSUMHASH' => $request->CHECKSUMHASH,
                            'status' => $request->STATUS,
                            'updated_at' => date('Y-m-d H:i:s')
                        ];

                    DB::table('payments')->where('OrderID',$request->ORDERID)->update($Payment);

    if(env('MY_WORKING_MODE') == 'Debug'){
    $isValidChecksum = 'TRUE'; 
}

    if($isValidChecksum == "TRUE") {
        if($request->STATUS == "TXN_SUCCESS"){
                    DB::table('installments')->where('id',$installment_Id)->update(['status' => 'paid','updated_at'=>date('Y-m-d H:i:s')]);

                    $paymentDoneCount = DB::table('installments')->where('oid',$OrderDetail->id)->where('status','paid')->count('id');

                    DB::table('orders')->where('order_id',$OrderDetail->order_id)->update(['paid_installment' => $paymentDoneCount,'pending_installment' => ($OrderDetail->tenure - $paymentDoneCount) ,'updated_at'=>date('Y-m-d H:i:s')]);

                    session(['message' => 'Payment successfully completed']);
                    return \Redirect::to('/MyOrders/'.$OrderDetail->id);
                } 
                else{
                    DB::table('installments')->where('id',$installment_Id)->update(['status' => 'pending','updated_at'=>date('Y-m-d H:i:s')]);
                    session(['message' => 'Somthing went wront, Please try again later']);
                    return \Redirect::to('/MyOrders/'.$OrderDetail->id);
                }
            }
            else {
                DB::table('installments')->where('id',$installment_Id)->update(['status' => 'pending','updated_at'=>date('Y-m-d H:i:s')]);
                    session(['message' => 'Somthing went wront, Please try again later']);
                return \Redirect::to('/MyOrders/'.$OrderDetail->id);
            }
    }

}
