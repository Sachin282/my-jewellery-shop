<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\library\CommonUtilities;
use App\Http\Controllers\Controller;

class OrderController extends Controller
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

    public function pending()
    {
        $common = new CommonUtilities();
        $PendingOrders = $common->getPendingOrder();
        $users =$common->getUser();
        
        return view('admin.ManageOrders',['view'=>'pending', 'data'=>$PendingOrders,'users'=>$users]);
    }

    public function running()
    {
        $common = new CommonUtilities();
        $PendingOrders = $common->getRunningOrder();
        $users =$common->getUser();
        
        return view('admin.ManageOrders',['view'=>'running', 'data'=>$PendingOrders,'users'=>$users]);
    }

    public function completed()
    {
        $common = new CommonUtilities();
        $PendingOrders = $common->getCompletedOrder();
        $users =$common->getUser();
        
        return view('admin.ManageOrders',['view'=>'completed', 'data'=>$PendingOrders,'users'=>$users]);
    }
}
