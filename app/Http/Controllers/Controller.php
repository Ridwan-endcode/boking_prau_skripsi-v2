<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Transaksi;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function mainTransaksi(){
        // $mainTransaksi = Transaksi::where(['is_read' => 0])->get();
        $mainTransaksi = Transaksi::query()->join('orders', 'orders.id', '=', 'transaksis.id_order')->where(['is_read' => 0])->get();
        // $mainTransaksi = DB::table('transaksis')->join('orders','transaksis.id_order' , '=', 'orders.token_pendakian')->get();
        return $mainTransaksi;
    }

}
