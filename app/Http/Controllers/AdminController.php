<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\library\CommonUtilities;

class AdminController extends Controller
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
    public function index()
    {
        $common = new CommonUtilities();
        $userCount = $common->getUserCount() ?? 0;
        $pendingOrderCount = $common->getPendingOrderCount() ?? 0;
        $totalBooking = $common->getTotalBooking() ?? 0;
        // session(['user']=)
        return view('admin.dashboard',['userCount' => $userCount,'pendingOrderCount' => $pendingOrderCount,'totalBooking' => $totalBooking]);
    }

    public function ManageUser($id='')
    {
        if(empty($value)){
        $common = new CommonUtilities();
        $users = $common->getUser();
        // dd($users);
        return view('admin.reg-users',['type'=>'multiple','users' => $users]);
    }
    else
    {
        return $id;
    }
    }

    public function getUser($id='')
    {
        $common = new CommonUtilities();
        $user = $common->getUser($id);
        if(!empty($id)){
           return view('admin.reg-users',['type'=>'single', 'users' => $user]);
        }
    }

    public function updateUser(Request $request,$id='')
    {
        DB::table('users')->where('id',$id)->update([
                                'name'=> $request->name,
                                'email' => $request->email,
                                'phone' => $request->phone,
                                'referred_by' => $request->referred_by,
                                'address' => $request->address,
                                'city' => $request->city,
                                'zip' => $request->zip,
                                'gcash' => $request->gcash,
                                'status' => $request->status,
                                'created_at' => date('Y-m-d H:i:s',strtotime($request->created_at))
                            ]);
        return \Redirect()->route('admin.user',$id);
    }

    public function updatePassword(Request $request)
    {
        $user = DB::table('admin')->where('id',Auth::user()->id)->first();
        if(isset($request->password) && !empty($request->password)){
            if(Hash::check($request->password, $user->password))
                if($request->password == $request->cpassword)
                    if(DB::table('admin')->where(['password' => Hash::make($request->password), 'updated_at' => date('Y-m-d H:i:s')]))
                        return view('admin.ChangePassword',['success' => 'Password Changed Successfully']);      
                    else
                        return view('admin.ChangePassword',['error' => 'Something went wrong, Please try again later']);      


        }
        return view('admin.ChangePassword');       
    }
}
