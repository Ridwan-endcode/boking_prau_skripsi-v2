<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class LaporanKeuanganController extends Controller
{
    public function viewKeuangan(){

        $orders  = Order::cursor();

        ini_set('max_execution_time', 6000);

    
        $orders = Order::cursor()->filter(function ($user) {

          return $user->status_bayar;
                            
        });

        return view('admin.keuangan.view-all')->with(compact('orders'));

    }
}
