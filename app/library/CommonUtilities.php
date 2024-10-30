<?php
namespace App\library;

use DB;
use Auth;
use Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommonUtilities extends Controller
{
    public function Authenticate()
	{
	    if (Auth::user()) {   // Check is user logged in
	    	return '1';
	        // return View('novosti.create')->with('example', $example);
	    }
	    else {
	        return '0';
	    }
	}

	public function getCurrentUserDetail()
	{
	    if (Auth::user()) {   // Check is user logged in
	    	return Auth::user();
	        // return View('novosti.create')->with('example', $example);
	    }
	    else {
	        return Auth::guard('admin');
	    }
	}

	public function test($value='')
	{
		// dd(Auth::guard('admin'));

		$data = [
            'no-reply' => 'contact-from-web@nomail.com',
            'admin'    => 'sachinmaurya.ext@gmail.com',
            'Fname'    => 'Fname',
            'Lname'    => 'Lname',
            'Email'    => 'sachinmaurya28297@gmail.com',
            'Phone'    => 'Phone',
            'Order'    => 'Order',
        ];

        \Mail::send('mail.sendmail', ['data' => $data],
            function ($message) use ($data)
            {
                $message
                    ->from($data['admin'])
                    ->to($data['admin'])->subject('Some body wrote to you online');
                    // ->to($data['Email'])->subject('Your submitted information')
                    // ->to('sachinmaurya2821997@gmail.com', 'Sachin@282')->subject('Feedback');
            });
	}

	public function feedInstallment($month='')
	{
		$nextDate = Date('d-m-Y');
		 for ($i=1; $i <= $month; $i++) { 
		 	$nextDate = Date('d-m-Y', strtotime('+1 month',strtotime($nextDate)));	

		 	$installment = [
                'uid' => Auth::user()->id,
                'oid' =>$OrderID,
                'inst_no'=> $i,  //for the type of gold ie. coin or jewellery
                'inst_date' => '1',   //j_id is for id of the jewellery if prouct is in jewellery form
                'price' => $TotalAmount,
                'weight' => $weight,
                'tenure' => $tenure,
                'down_payment' => $DownPayment,
                'discount' => $dp_disc,
                'paid_installment' => '1',
                'pending_installment' => '11',
                'status' => 'pending'
            ];
	}
}

	public function GoldRate($value='')
	{

		return $rate = DB::table('j_type')->where('id','1')->first()->price;
		// $rate = 32000;
		// return ($rate*0.916)/10;

		
	}

	public function get916GoldRate($value='')
	{

		$rate = DB::table('j_type')->where('id','1')->first()->price;
		return  $rate * 0.0916;		//converting 10 gram to 1 gram rate of 916 type jewellery

		
	}

	public function updateGoldRate($manual='')
	{
		if(!empty($manual)){

		}
		else{
			$LastUpdateDate = DB::table('j_type')->where('id','1')->first()->updated_at;

			if(date('Y-m-d') != date('Y-m-d',strtotime($LastUpdateDate))){
			$currency_code="INR";
			$unit_type="gram";
			$currency_code = strtolower($currency_code);
			$unit_type = strtolower($unit_type);
			$URL="https://goldpricez.com/api/rates/currency/".$currency_code."/measure/".$unit_type;
			$apiKey="613522e6a395895bfb2111f42d66bfb3613522e6";  //6fb9f4e5d02b4befdc43eeb19f11ca7b6fb9f4e5
			$URL=strtolower($URL);

			$result=$this->httpGet($URL,$apiKey);
			$array1 = json_decode($result, true);
			$result = json_decode($array1, true);
			$current_gold_price=$result[$unit_type.'_in_'.$currency_code];
			$gmt_datetime_gold_updated=$result['gmt_ounce_price_'.'usd'.'_updated'];
			$currency_rate =1;
			$gmt_datetime_currency_updated =$gmt_datetime_gold_updated;
			if($currency_code!='usd')
			{
				$currency_rate =$result['usd_to_'.$currency_code];
				$gmt_datetime_currency_updated=$result['gmt_'.$currency_code.'_updated'];
			}
			$result_array=serialize($result);

			$rate = $result['gram_in_inr']*11.24;
			// $rate = 32000;
			DB::table('j_type')->where('id','1')->update(['price' => $rate,'updated_at'=> date('Y-m-d H:i:s')]);
			// return ($rate*0.916)/10;
		}
	}
	}

	public function httpGet($url="",$apiKey="")
	{
	    $ch = curl_init();   
	    curl_setopt($ch,CURLOPT_URL,$url);
	    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	   //curl_setopt($ch,CURLOPT_HEADER, false); 
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'X-API-KEY: ' . $apiKey
		    )); 
	    $output=curl_exec($ch); 
	    curl_close($ch);
	    return $output;
	}

	public function getUserCount()
	{
		return DB::table('users')->count('id');
	}
	public function getPendingOrderCount()
	{
		return DB::table('orders')->where('status','pending')->count('id');
	}
	public function getTotalBooking()
	{
		return DB::table('orders')->count('id');
	}

	public function getPendingOrder($id=''){
		if(empty($id)){
			return DB::table('orders')
					->where('status','pending')
					->get();
		}
		else {
			return DB::table('orders')
					->where('status','pending')
					->where('uid',$id)
					->get();
		}
	}

	public function getRunningOrder($id=''){
		if(empty($id)){
			return DB::table('orders')
					->where('status','running')
					->get();
		}
		else {
			return DB::table('orders')
					->where('status','running')
					->where('uid',$id)
					->get();
		}
	}

	public function getCompletedOrder($id=''){
		if(empty($id)){
			return DB::table('orders')
					->where('orders.status','completed')
					->rightJoin('users','orders.uid','users.id')
					->get();
		}
		else {
			return DB::table('orders')
					->where('status','completed')
					->where('uid',$id)
					->get();
		}
	}

	public function getUser($id='')
	{
		if(empty($id)){
			return DB::table('users')->get();
		}
		else{
			return DB::table('users')->where('id',$id)->get();
		}
	}


	public function loadCalculation(Request $request)
	{
        $rate = $this->GoldRate();
        $weigth = $request->weigth;
        $ttlamt = $weight * $rate;
        $dp = $ttlamt*0.15;
        $dp_disc =rand(1,10);
        $dp_gcash = $dp* $dp_disc * 0.01;
        $payamt = $ttlamt - $dp;
        $inst = $payamt / 10;
        $inst_disc = rand(1,5);
        $inst_gcash = $inst * $inst_disc * 0.01;
        echo "<script>console.log('weight : $weight<br>ttlamt : $ttlamt<br>dp : $dp<br>dp_disc : $dp_disc<br>dp_gcash : $dp_gcash<br>payamt : $payamt<br>inst : $inst<br>inst_disc : $inst_disc<br>inst_gcash : $inst_gcash')</script>";
	}

	public function getUserGCashHistory($id='')
	{
		if(!empty($id)){
		$dpGcashHistory = DB::table('orders')
						->where('status','!=','pending')
						->where('uid',$id)
						// ->innerJoin('installments','status','paid')
						->get();
		$instGcashHistory = DB::table('installments')
						->where('status','paid')
						->where('uid',$id)
						// ->innerJoin('installments','status','paid')
						->get();
			dd($dpGcashHistory);
		}

	}

	public function getJewelleryDetail($id='')
	{
		if(!empty($id))
		{
			$data = DB::table('j_type')->where('id',$id)->get();
			return $data;
		}
		else
		{
			$data = DB::table('j_type')->get();
			return $data;
		}
	}

	public function getInstallmentDetail($id='')
	{
		if(!empty($id))
		{
			$data = DB::table('installment_detail')->where('id',$id)->first();
		}
		else
		{
			$data = DB::table('installment_detail')->get();
		}
		return $data;
	}

	public function getActiveInstallmentDetail($id='')
	{
		if(!empty($id))
		{
			$data = DB::table('installment_detail')->where('id',$id)->first();
		}
		else
		{
			$data = DB::table('installment_detail')->where('status','active')->get();
		}
		return $data;
	}

	public function getInstallments($oid='')
	{
		if(!empty($oid))
		{
			$data = DB::table('installments')->where('oid',$oid)->get();
		}
		else
		{
			$data = DB::table('installments')->get();
		}
		return $data;
	}

	public function getInstallmentById($id='')
	{
		if(!empty($id))
		{
			$data = DB::table('installments')->where('id',$id)->first();
		}
		return $data;
	}

	public function getOrderDetail($Oid='')
	{
		if(!empty($Oid)){
			$data = DB::table('orders')->where('order_id',$Oid)->first();
		}
		else{
			$data = DB::table('orders')->get();
		}
		return $data;
	}

	public function getOrderDetailById($id='')
	{
		if(!empty($id)){
			$data = DB::table('orders')->where('id',$id)->first();
		}
		return $data;
	}

	public function getNewOrderID()
	{
		do{
			$oid = rand(100000,9999999);
			$checkExistanceinOrder = DB::table('orders')->where('order_id',$oid)->first();
			$checkExistanceinPayment = DB::table('payments')->where('PaymentOrderId',$oid)->first();
		}while(!empty($checkExistanceinOrder) && !empty($checkExistanceinPayment));
		
		return $oid;
	}

	public function encode_compression($value)
	{
		return rtrim(strtr(base64_encode(gzdeflate($value, 9)), '+/', '-_'), '=');
	}
	public function decode_compression($value)
	{
		return gzinflate(base64_decode(strtr($value, '-_', '+/')));
	}

	public function getReferredUsers($id)
	{
		$code = $this->getCodeById($id);
		return DB::table('users')->where('referred_by',$code)->where('id','!=',$id)->get();
	}

	public function getCodeById($id)
	{
		return DB::table('users')->where('id',$id)->first()->code;
	}

	public function getIdByCode($code)
	{
		return DB::table('users')->where('code',$code)->first()->id;
	}

	public function getAvailableGcash($id)
	{
		$res = $this->getAvailableInstallmentGcash($id) + $this->getAvailableOrderGcash($id) - $this->getGCashSpend($id);
		return $res;
	}

	public function getRedeemableGcash($id)
	{
		$res = $this->getRedeemableOrderGcash($id) + $this->getRedeemableInstallmentGcash($id) - $this->getGCashSpend($id);
		return $res;
	}

	public function getAvailableOrderGcash($uid)
	{
		$redeemable = $this->getMyGcashFromOrders($uid);
		$reference = $this->getOrderGcashByReference($uid);
		return $redeemable+$reference;
	}

	public function getAvailableInstallmentGcash($uid)
	{
		$redeemable = $this->getMyGcashFromInstallments($uid);
		$reference = $this->getInstallmentGcashByReference($uid);
		return $redeemable+$reference;
	}

	public function getRedeemableOrderGcash($uid)
	{
		$redeemable = $this->getMyGcashFromOrders($uid);
		$reference = $this->getOrderGcashByReference($uid);
		if(count($this->getReferredUsers($uid)) >= 2)
			return $redeemable+$reference;
		else
			return $redeemable;
	}

	public function getRedeemableInstallmentGcash($uid)
	{
		$redeemable = $this->getMyGcashFromInstallments($uid);
		$reference = $this->getInstallmentGcashByReference($uid);
		
		if(count($this->getReferredUsers($uid)) >= 2)
			return $redeemable+$reference;
		else
			return $redeemable;
	}

	public function getOrderGcashByReference($uid)
	{
		$referredUsers = $this->getReferredUsers($uid);
		$gcash = 0;
		foreach ($referredUsers as $user) {
			$orderGcash = DB::table('orders')->where('uid',$user->id)->where('status','running')->get();
			foreach ($orderGcash as $cash) {
				if($cash->reference_discount_type == 'percentage'){
				$val = ($cash->down_payment * $cash->reference_discount)/100; 
				$gcash = $gcash + $val;
			}
			elseif ($cash->reference_discount_type == 'flat') { 
				$gcash = $gcash + $cash->reference_discount;
			}
			}
		}
		return $gcash;
	}

	public function getInstallmentGcashByReference($uid)
	{
		$referredUsers = $this->getReferredUsers($uid);
		$gcash = 0;
		foreach ($referredUsers as $user) {
			$installmentGcash = DB::table('installments')->where('uid',$user->id)->where('status','paid')->get();
			foreach ($installmentGcash as $cash) {
				if($cash->reference_discount_type == 'percentage'){
				$val = ($cash->amount * $cash->reference_discount)/100; 
				$gcash = $gcash + $val;
			}
			elseif ($cash->reference_discount_type == 'flat') { 
				$gcash = $gcash + $cash->reference_discount;
			}
			}
		}
		return $gcash;
	}

	public function getMyGcashFromOrders($uid)
	{
		$orderGcash = DB::table('orders')->where('uid',$uid)->where('status','running')->get();
		$gcash = 0;
		foreach ($orderGcash as $cash) {
			if($cash->discount_type == 'percentage'){
				$val = ($cash->down_payment * $cash->discount)/100; 
				$gcash = $gcash + $val;
			}
			elseif($cash->discount_type == 'flat') { 
				$gcash = $gcash + $cash->discount;
			}
		}
		return $gcash;
	}

	public function getMyGcashFromInstallments($uid)
	{
		$orderGcash = DB::table('installments')->where('uid',$uid)->where('status','paid')->get();
		$gcash = 0;
		foreach ($orderGcash as $cash) {
			if($cash->discount_type == 'percentage'){
				$val = ($cash->amount * $cash->discount)/100; 
				$gcash = $gcash + $val;
			}
			elseif($cash->discount_type == 'flat') { 
				$gcash = $gcash + $cash->discount;
			}
		}
		return $gcash;
	}

	public function getMyGcashFromInstallment($uid)
	{
		$installmentGcash = DB::table('installments')->where('uid',$uid)->where('status','paid')->get();
		$gcash = 0;
		foreach ($installmentGcash as $cash) {
			$val = ($cash->amount * $cash->discount)/100; 
			$gcash = $gcash + $val;
		}
		return $gcash;
	}

	public function getActiveDiscountDetail($id='')
	{
		if(!empty($id))
		{
			return DB::table('gcash_option')->where('id',$id)->where('status','active')->first();
		}
		else{
			return DB::table('gcash_option')->where('status','active')->get();
		}
	}

	public function getDiscountDetail($id='')
	{
		if(!empty($id))
		{
			return DB::table('gcash_option')->where('id',$id)->first();
		}
		else{
			return DB::table('gcash_option')->get();
		}
	}

	public function getGCashSpend($id)
	{
		$used_in_payment = DB::table('installments')->where('uid',$id)->where('status','paid')->sum('gcash_redeemed');
		$redeemed =  DB::table('redeemed')->where('uid',$id)->where('status','approved')->sum('amount');
		return $used_in_payment + $redeemed;
	}

	public function getBankDetail($id='')
	{
		if(!empty($id)){
			return DB::table('bank_detail')->where('uid',$id)->first();
		}
		else{
			return DB::table('bank_detail')->get();
		}
	}

    public function getRedeemRequested()
    {
    	return DB::table('redeemed')->where('status' ,'pending')->get();
    }

    public function getRedeemApproved()
    {
    	return DB::table('redeemed')->where('status' ,'approved')->get();
    }

    public function getRedeemRejected()
    {
    	return DB::table('redeemed')->where('status' ,'rejected')->get();
    }

    public function getRedeemAll()
    {
    	return DB::table('redeemed')->get();
    }
}