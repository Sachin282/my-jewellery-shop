<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    //

    public function __construct(){
    	$this->middleware('guest:admin');
    }
    public function showLoginForm(){
       	return view('auth.adminLogin');
    }
    public function login(Request $request)
    {
    	//Validate the form data
    	$this->validate($request, [
    		'email' => 'required',
    		'password' => 'required | min:6',
    	]);
    	//Attempt to log the user in
    	if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
    		
    		//if successful, redirect to their intended location
    		return redirect()->intended(route('admin.dashboard'));
    	}
    	//if unsuccesful, then redirect back to the login with the form data 
    	return redirect()->back()->withInput($request->only('email','remember'));
    }
}
