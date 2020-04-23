<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Jadwal;
use App\Pendaki;
use App\Transaksi;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use DataTables;

class BokingController extends Controller
{

    public function __construct()
{ 
    ini_set('max_execution_time', 300);
}
 
    public function viewAllOrder(){
        $orders = Order::orderBy('id', 'desc')->paginate(15);
        // $orders = Order::all()->paginate(30);
      
        // $orders = Order::cursor()->filter(function ($id) {
        //     return $id->id;
        // });
        
        return view('admin.order.admin-view-order-all')->with(compact('orders'));
        // return view('admin.order.admin-view-order-all');

    }

    public function ViewOrderJadwal($id = null){

        $jadwal = Jadwal::where(['id'=>$id])->first();

        if ($id !== null) {
            # code...
            $orderCont = Jadwal::where(['id' => $id])->count();
            if ($orderCont == 0) {
                abort(404);
            }
            $orders = Order::where(['id_jadwal'=>$jadwal->id])->get();
        }else{
            $orders = Order::orderBy('id', 'desc')->get();
        }

        return view('admin.order.admin_view_order_jadwal')->with(compact('jadwal','orders'));

    }

    public function ViewPendaki($token = null){

        // $order = Order::where(['token_pendakian'=>$token])->first();
        $orders = Order::where(['token_pendakian'=>$token])->first();

        // if ($id !== null) {
        //     # code...
        //     $orderCont = Jadwal::where(['id' => $id])->count();
        //     if ($orderCont == 0) {
        //         abort(404);
        //     }   
        //     $orders = Order::where(['id_jadwal'=>$jadwal->id])->get();
        // }else{
        //     $orders = Order::orderBy('id', 'desc')->get();
        // }

        // $jalur_pendakian = Jalur_pendakian::cursor();
        $pendakis = Pendaki::where(['id_order'=>$orders->id])->orderBy('id', 'desc')->where('status_kelompok', $orders->pendakis->id)->get();
        // $pendakisAnggota = Pendaki::where(['status_kelompok'=>$pendakis->id])->orderBy('id', 'desc')->get();
        $pendakijumlah = Pendaki::where(['id_order'=>$orders->id])->orderBy('id', 'desc');
        // $transaksi = Transaksi::where(['id'=>$orders->id_trasaksi])->first();

        Transaksi::where(['id_order' => $orders->id])->update(['is_read' => '1']);

        return view('admin.order.admin_view_lihatpendaki')->with(compact('orders','pendakis','pendakijumlah'));

    }
 
    public function ValidasiPembayaranPendaki($token){

        $orders = Order::where(['token_pendakian'=>$token])->first();

         // $data = $request->all();
         $id_user = auth()->user()->id;
         Order::where(['token_pendakian' => $token])->update(['status_bayar' => $id_user]);
         Pendaki::where(['id_order' => $orders->id])->update(['status' => 1]);
            return redirect()->back()->with('flash_message_success', '|| Validasi Pedakian Telah di lakukan');
    }

    public function TransaksidiTempat(Request $request){

        date_default_timezone_set('Asia/Jakarta');

        $data = $request->all();

        $transaksi = new Transaksi;
        $transaksi->id_order = $data['id_order'];
        $transaksi->nama_pengirim = $data['nama_pengirim']; 
        $transaksi->jumlah = $data['jumlah'];
        // $transaksi->foto_bukti = $data['foto_bukti'];
        $transaksi->session_id = auth()->user()->id;
        // $transaksi->status_bayar = auth()->user()->id;
        $transaksi->created_at = date("Y-m-d h:i:sa");
        $transaksi->updated_at = date("Y-m-d h:i:sa");

        if ($request->hasFile('foto_bukti')) {
            $image_tmp = $request->file('foto_bukti');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111, 99999) . '.' . $extension;
                $large_image_path = 'image/buktitransaksi/' . $filename;
                    //Resize
                    Image::make($image_tmp)->resize(650, 1063)->save($large_image_path);
                    $transaksi->foto_bukti = $filename;
            }
        }

        $transaksi->save();
        $user_id = auth()->user()->id;
        Order::where(['id' => $transaksi->id_order])->update(['id_transaksi' => $transaksi->id , 'status_bayar' => $user_id ]);
        Pendaki::where(['id_order' => $transaksi->id_order])->update(['status' => 1]);
    return redirect()->back()->with('flash_message_success', 'Pembayaran di tampat ');

    }

    public function batalTransaksi($token = null){
        date_default_timezone_set('Asia/Jakarta');
        $orders = Order::where(['token_pendakian'=>$token])->first();

        $updated_at = date("Y-m-d h:i:sa");

        // $id_user = auth()->user()->id;
        Order::where(['id' => $orders->id])->update(['status_bayar' => '0', 'id_transaksi' => '0']);
        Pendaki::where(['id_order' => $orders->id])->update(['status' => '0']);
           return redirect()->back()->with('flash_message_success', '|| Pembatalan Pembayaran');

    }

    public function absenDatang($token = null){

        date_default_timezone_set('Asia/Jakarta');
        $orders = Order::where(['token_pendakian'=>$token])->first();

        $updated_at = date("Y-m-d h:i:sa");

        if (date('j M, Y', strtotime($orders->jadwals->tgl_jadwal)) != date('j M, Y') ) {
           return redirect()->back()->with('flash_message_error', '|| Jaldwal Pendkian Tidak sesuai denga Tanggal saat ini');
        }

        // $id_user = auth()->user()->id;
        Order::where(['id' => $orders->id])->update(['status_pendaki_datang	' => '1']);
           return redirect()->back()->with('flash_message_success', '|| Absen Pendaki Datang Berhasil');
    }
}
