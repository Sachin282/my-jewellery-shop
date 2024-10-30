<?php

/*
- Use PAYTM_ENVIRONMENT as 'PROD' if you wanted to do transaction in production environment else 'TEST' for doing transaction in testing environment.
- Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_MID constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_WEBSITE constant with details received from Paytm.
- Above details will be different for testing and production environment.
*/


$payment = [

        'PAYTM_ENVIRONMENT'      => 'PROD',                    // PROD
        'PAYTM_MERCHANT_KEY'     => 'ZoJJTr!dlFd&IYRo',    //Change this constant's value with Merchant key received from Paytm.
        'PAYTM_MERCHANT_MID'     => 'LgcilA49387337106053',         //Change this constant's value with MID (Merchant ID) received from Paytm.
        'PAYTM_MERCHANT_WEBSITE' => 'DEFAULT', //Change this constant's value with Website name received from Paytm.

// testing credentials
        //  'PAYTM_ENVIRONMENT'      => 'Test',                    // PROD
        // 'PAYTM_MERCHANT_KEY'     => 'MTouRgfwnlV!HVhu',    //Change this constant's value with Merchant key received from Paytm.
        // 'PAYTM_MERCHANT_MID'     => 'GrOZXz30199879446024',         //Change this constant's value with MID (Merchant ID) received from Paytm.
        // 'PAYTM_MERCHANT_WEBSITE' => 'DEFAULT', //Change this constant's value with Website name received from Paytm.
    ];



$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
if ($payment['PAYTM_ENVIRONMENT'] == 'PROD') {
	$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
	$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
}

$payment += [
        'PAYTM_REFUND_URL' => '',
		'PAYTM_STATUS_QUERY_URL' => $PAYTM_STATUS_QUERY_NEW_URL,
		'PAYTM_STATUS_QUERY_NEW_URL' => $PAYTM_STATUS_QUERY_NEW_URL,
		'PAYTM_TXN_URL'=> $PAYTM_TXN_URL
];


return $payment;

?>
