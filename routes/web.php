<?php

use App\library\CommonUtilities;
$common = new CommonUtilities();
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'CommonController@landingPage')->name('landing-page');

Route::get('/Authenticate', function () use ($common){ return $common->getUserGCash(); })->name('Authenticate');
Route::get('/GoldRate', function () use ($common){ return $common->GoldRate(); })->name('GoldRate');
Route::get('/loadCalculation', 'CommonController@loadCalculation');
Route::get('/test', function () use ($common){ 
	return $common->test(); 
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('user.home');
Route::get('/MyOrders', 'User\OrderController@ManageUserOrder')->name('user.order');
Route::get('/MyOrders/{OrderId}', 'User\OrderController@ManageUserOrder')->name('user.order.manage');
Route::get('/MyProfile', 'HomeController@ManageUser')->name('user.profile');
Route::post('/MyProfile', 'HomeController@UpdateUser')->name('user.profile.update');
Route::get('/Wallet', 'User\WalletController@index')->name('user.wallet');
Route::post('Wallet/Redeem','User\WalletController@RedeemGcash')->name('user.gcash.redeem');


Route::get('book/{weight}/{tenure}','User\PaymentController@book')->name('book');
Route::get('Payment/checkout','User\PaymentController@MakePayment')->name('payment.pay');
Route::post('payment-done/Thankyou/','User\PaymentController@PaymentDone')->name('payment.thankyou');
Route::post('Pay/Installment/','User\PaymentController@PayInstallment')->name('payment.Installment.pay');
Route::post('Pay/Installment/Response','User\PaymentController@PayInstallmentResponse')->name('payment.Installment.response');
Route::get('Payment/ReplaceOrder/{id}','User\PaymentController@ReplaceOrder')->name('order.replace.pay');

 
Route::prefix('admin')->group( function() {
	Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('ChangePassword', 'AdminController@updatePassword')->name('admin.change-password');
	Route::post('ChangePassword', 'AdminController@updatePassword')->name('admin.password.update');
	Route::get('ManageUser', 'AdminController@ManageUser')->name('admin.users');
	Route::get('ManageUser/{id}', 'AdminController@getUser')->name('admin.user');
	Route::post('ManageUser/{id}', 'AdminController@updateUser')->name('admin.user.update');

	Route::prefix('Order')->group( function() {
		Route::get('Pending','Admin\OrderController@pending')->name('order.pending');
		Route::get('Running','Admin\OrderController@running')->name('order.running');
		Route::get('Completed','Admin\OrderController@completed')->name('order.completed');
	});

	Route::prefix('GCash')->group( function() {
		Route::get('User-GCash','Admin\gcashController@UserGCash')->name('gcash.all');
		Route::get('Running','Admin\OrderController@redeemed')->name('gcash.redeemed');
	});

	Route::prefix('Jewellery')->group( function() {
		Route::get('Manage','Admin\JewelleryController@ManageJewellery')->name('jewellery.manage');
		Route::get('Manage/{id}','Admin\JewelleryController@ManageJewellery')->name('jewellery.manage.single');
		Route::post('Manage/{id}','Admin\JewelleryController@UpdateJewellery')->name('jewellery.manage.submit.single');
	});

	Route::prefix('Installment')->group( function() {
		Route::get('Manage','Admin\InstallmentController@ManageInstallment')->name('installment.manage');
		Route::post('Manage','Admin\InstallmentController@UpdateInstallment')->name('installment.manage.submit');
	});

	Route::prefix('Discount')->group( function() {
		Route::get('Manage','Admin\JewelleryController@ManageDiscount')->name('discount.manage');
		Route::post('Manage','Admin\JewelleryController@UpdateDiscount')->name('discount.manage.submit');
	});

	// Route::prefix('Redeem')->group( function() {
	// 	Route::get('\{status?}','Admin\WalletController@Redeem')->name('redeem');
		// Route::get('Requested','Admin\WalletController@RedeemRequested')->name('redeem.requested');
		// Route::get('Approved','Admin\WalletController@RedeemApproved')->name('redeem.approved');
		// Route::get('Rejected','Admin\WalletController@RedeemRejected')->name('redeem.rejected');
		// Route::get('All','Admin\WalletController@RedeemAll')->name('redeem.all');
	// 	Route::get('Update','Admin\WalletController@RedeemUpdate')->name('redeem.update');
	// });

	
	Route::prefix('Redeem')->group( function() {
		Route::get('/{status?}','Admin\WalletController@Redeem')->name('redeem');
		Route::post('Update','Admin\WalletController@RedeemUpdate')->name('redeem.update');
		// Route::get('Incomming','Admin\PassbookController@index',)->name('passbook.incomming.manage');
		// Route::get('Outgoing','Admin\PassbookController@index')->name('passbook.outgoing.manage');
		// Route::get('All','Admin\PassbookController@index')->name('passbook.all.manage');
	});

		Route::get('Passbook/{status?}','Admin\PassbookController@index')->name('passbook.manage');
});

// Route::get('user/dashboard','HomeController@book')->name('user.dashboard');
