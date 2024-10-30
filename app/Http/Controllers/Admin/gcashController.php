<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\library\CommonUtilities;
use App\Http\Controllers\Controller;

class gcashController extends Controller
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

    public function UserGCash()
    {
        $common = new CommonUtilities();
        $data = $common->getUser();
        return view('admin.ManageGCash',['id'=>'', 'data' => $data]);
    }

    public function running()
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
}
