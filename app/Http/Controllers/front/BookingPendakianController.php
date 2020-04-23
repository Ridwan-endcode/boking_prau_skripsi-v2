<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jalur_pendakian;
use App\Jadwal;
use App\Order;
use App\Transaksi;
use App\Pendaki;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Events\NewMessage;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BookingPendakianController extends Controller
{
    public function jalurPendakian(){
        $jalur_pendakians = Jalur_pendakian::cursor();
        return view('front.booking.booking_jalurpendakian')->with(compact('jalur_pendakians'));
    }

    public function jalurPendakianJadwal($id = null){
             // echo $slug; die;
        $jalur_pendakian = Jalur_pendakian::where(['id'=>$id])->first();
        // date_default_timezone_set('Asia/Jakarta');
        

        // echo "<pre>";
        // print_r($jalur_pendakian);
        // die;

        if ($id !== null) {
            # code... 
            $jalur_pendakianCont = Jalur_pendakian::where(['id' => $id])->count();
            if ($jalur_pendakianCont == 0) {
                abort(404);
            }
            $tanggalawl = date('yy-m-d');
            $tanggaakir = date('2020-06-02');
            //   echo "<pre>";
            //  print_r($tanggalawl);
            //  die;
            // $relateProduct = Product::where('id', '!=', $id)->where(['category_id' => $productDetails->category_id])->get();
            $jadwals = Jadwal::where('tgl_jadwal', '>=', $tanggalawl)->where(['id_jalur' => $jalur_pendakian->id])->where(['status' => 1])->orderBy('tgl_jadwal','asc')->paginate(30);


        }else{
            $jadwals = Jadwal::orderBy('id', 'desc')->get();;
        }

       

        // $pendakis = Pendaki::where(['id_jadwal'=>$jadwals]);

      

        // $pendakis = Order::where(['id_jadwal' => $jadwal->id])->get();

        // foreach ($pendakis as $pendaki) {
        //     $JumlahPendaki = Pendaki::where(['id_order' => $pendaki->pendakis->id_order])->count();
        //   } 

        
        // Start Dropdown Add Product
        // $categories = Category::where(['parent_id' => 0])->get();
        // $categories_dropdown = "<option value='' selected disabled>Select</option>";
        // $pendakis = "";
        // ini_set('max_execution_time', 60);
        // foreach ($jadwals as $jadwal) {
        //     $pendakis = Pendaki::where(['id_jadwal' => $jadwal->id])->get();
        //     foreach ($pendakis as $jmlah) {
        //         $jmlah = $jmlah->count();
        //     }
        // }
       


   
           return view('front.booking.booking_jalur_tanggal')->with(compact('jalur_pendakian','jadwals'));
   
    }

    public function AddOrder(Request $request){
       

        // echo "<pre>";
        // print_r($data);
        // die;

        

            $data = $request->all(); 
            // echo "<pre>";
            // print_r($data);
            // die;

            date_default_timezone_set('Asia/Jakarta');
            $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = str_random(30);
                Session::put('session_id',$session_id);
            }
            

            $pendaki = new Pendaki;
            $pendaki->nama = $data['nama'];
            $pendaki->tgl_lahir = $data['tgl_lahir']; 
            $pendaki->jenis_kelamin = $data['jenis_kelamin'];
            $pendaki->id_jadwal = $data['id_jadwal']; 
            $pendaki->janis_identitas = $data['janis_identitas'];
            $pendaki->no_identitas = $data['no_identitas'];
            // $pendaki->image_identitas = $data['image_identitas'];
            $pendaki->alamat = $data['alamat'];
            $pendaki->kota_asal = $data['kota_asal'];
            $pendaki->email = $data['email'];
            $pendaki->no_hp = $data['no_hp'];
            $pendaki->no_hp_lain = $data['no_hp_lain'];
            $pendaki->session = $session_id;
            $pendaki->created_at = date("Y-m-d h:i:sa");
            $pendaki->updated_at = date("Y-m-d h:i:sa");

            if ($request->hasFile('image_identitas')) {
                $image_tmp = $request->file('image_identitas');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $large_image_path = 'image/identitas/' . $filename;
                        //Resize
                        Image::make($image_tmp)->resize(650, 1063)->save($large_image_path);
                        $pendaki->image_identitas = $filename;

                }
            }


            if($pendaki -> save()){
                $id_pendaki = $pendaki->id;
                $orders = new Order;
                $orders->id_jadwal = $data['id_jadwal'];
                $orders->id_jalur = $data['id_jalur']; 
                $orders->tgl_turun = $data['tgl_turun'];
                $orders->session_id = $session_id;
                $orders->nama_kelompok = $data['nama_kelompok'];
                $orders->id_pendaki = $id_pendaki;

                $orders -> save();

                $id_order = $orders->id;
                $harga = $orders->jadwals->harga;
                
                // $pendaki->alamat = $data['alamat'];
                // DB::table('orders')->insert(['id_jadwal'=>$data['id_jadwal'],'id_jalur'=>$data['id_jalur'],  'tgl_turun' => $data['tgl_turun'],
                // 'session_id'=>$session_id,  'nama_kelompok' => $data['nama_kelompok'], 'nama_kelompok' => $id_pendaki ]);
                // DB::table('pendakis')->insert(['id_order'=>$id_order]);
                Pendaki::where(['id' => $id_pendaki])->update(['id_order' => $id_order]);
                Order::where(['id' => $orders->id])->update(['harga' => $harga]);
            }


            // $pendaki->save();
            
            return redirect(url('/booking-add-order/data-diri-pendaki/'.$id_order))->with('flash_message_success', 'Boking Pendakian Berhasil  di Tambah Silahkan Isi Anggota Pendakian');

    }

 
    public function OrderPendakian(){

        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            return redirect('/booking-pilih-jalurpendakian')->with('flash_message_success', 'Silahkan booking terlebih dahulu');
        }
        $userCart = DB::table('orders')->where(['session_id'=>$session_id])->get();

        return view('front.booking.booking_add_pendakian')->with(compact('userCart'));
    }

    public function AddDataDiriPendakian(Request $request , $id = null){

        $session_id = Session::get('session_id');

        $orders = Order::find($id);
        if (!empty($orders->selesi_order)) {
            return redirect('/booking-pilih-jalurpendakian')->with('flash_message_success', 'Anda Telah selesaikan Boking Silahkan Cek Validasi Anda');
        }


        $jalur_pendakian = Jalur_pendakian::cursor();
        $pendakis = Pendaki::where(['id_order'=>$orders->id])->orderBy('id', 'desc')->where('status_kelompok', $orders->pendakis->id)->get();
        $pendakijumlah = Pendaki::where(['id_order'=>$orders->id])->orderBy('id', 'desc');

        
        

        return view('front.booking.booking_data_diri_pendaki')->with(compact('orders','jalur_pendakian','pendakis','pendakijumlah'));

    }

    public function AddOrderAnggota(Request $request){
        $data = $request->all(); 

       

        $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = str_random(30);
                Session::put('session_id',$session_id);
            }

        date_default_timezone_set('Asia/Jakarta');

            // echo "<pre>";
            // print_r($data);
            // die;
            $pendaki=new Pendaki;
            $pendaki->nama = $data['nama'];
            $pendaki->status_kelompok = $data['status_kelompok'];
            $pendaki->id_order = $data['id_order'];
            $pendaki->id_jadwal = $data['id_jadwal']; 
            $pendaki->tgl_lahir = $data['tgl_lahir']; 
            $pendaki->jenis_kelamin = $data['jenis_kelamin'];
            $pendaki->janis_identitas = $data['janis_identitas'];
            $pendaki->no_identitas = $data['no_identitas'];
            // $pendaki->image_identitas = $data['image_identitas'];
            $pendaki->alamat = $data['alamat'];
            $pendaki->kota_asal = $data['kota_asal'];
            $pendaki->email = $data['email'];
            $pendaki->no_hp = $data['no_hp'];
            $pendaki->no_hp_lain = $data['no_hp_lain'];
            $pendaki->session = $session_id;
            $pendaki->created_at = date("Y-m-d h:i:sa");
            $pendaki->updated_at = date("Y-m-d h:i:sa");

            if ($request->hasFile('image_identitas')) {
                $image_tmp = $request->file('image_identitas');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $large_image_path = 'image/identitas/' . $filename;
                        //Resize
                        Image::make($image_tmp)->resize(650, 1063)->save($large_image_path);
                        $pendaki->image_identitas = $filename;

                }
            }


        

            if($pendaki -> save()){
                    $orders = Order::find($pendaki->id_order);
                    $pendakijumlah = Pendaki::where(['id_order'=> $pendaki->id_order])->orderBy('id', 'desc');
                    $totalharga = $pendakijumlah->count() * $orders->jadwals->harga;

                    Order::where(['id' => $pendaki->id_order])->update(['harga' => $totalharga]);
                   
            }
                    //  echo "<pre>";
                    // print_r($totalharga);
                    // die;
            return redirect()->back()->with('flash_message_success', 'Anggota Kelompok Berhasil Di tambah');

    }

    public function HapusOrderAnggota($id = null){
        date_default_timezone_set('Asia/Jakarta');
        
        $orders = Pendaki::find($id);
        // $productDetail = Pendaki::where(['id' => $id])->first();
        $id_o = $orders->id_order;
        $pendakis = Order::find($id_o);
        Pendaki::where(['id' => $id])->delete();
        $pendakijumlah = Pendaki::where(['id_order'=> $id_o])->orderBy('id', 'desc');
        $totalharga = $pendakijumlah->count() * $pendakis->jadwals->harga;
        // echo "<pre>";
        // print_r($totalharga);
        // die;

        Order::where(['id' => $id_o])->update(['harga' => $totalharga]);
        return redirect()->back()->with('flash_message_success', 'Angota Kelompok Pendakian Berhasil di Hapus');
    }

    public function EditOrderAnggota(Request $request , $id = null){

        $data = $request->all();
        $pendakis = Pendaki::find($id);
        $session_id = Session::get('session_id');
        if ( $session_id != $pendakis->session ) {
            return redirect()->back()->with('flash_message_error', 'Sesi Anda tidak valid untuk edit Pendaki ini');
        }

        date_default_timezone_set('Asia/Jakarta');
        $updated_at = date("Y-m-d h:i");

        if ($request->hasFile('image_identitas')) {
            $image_tmp = $request->file('image_identitas');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111, 99999) . '.' . $extension;
                $large_image_path = 'image/identitas/' . $filename;
                //Resize
                Image::make($image_tmp)->resize(650, 1063)->save($large_image_path);
                $pendaki->image_identitas = $filename;
               

            }
        } else {
            $filename = $data['current_image'];
        }

        Pendaki::where(['id' => $id])->update(['nama' => $data['nama'],
        'tgl_lahir' => $data['tgl_lahir'], 'jenis_kelamin' => $data['jenis_kelamin'], 'janis_identitas' => $data['janis_identitas'],
        'no_identitas' => $data['no_identitas'], 'image_identitas' => $filename, 'alamat' => $data['alamat'], 'kota_asal' => $data['kota_asal'],
        'email' => $data['email'],'no_hp' => $data['no_hp'],'no_hp_lain' => $data['no_hp_lain'], 'updated_at' => $updated_at, 
        ]);
        return redirect()->back()->with('flash_message_success', 'Angota Kelompok Pendakian Berhasil di Edit');
    }

    public function SelesaiOrder(Request $request , $id = null){
        $data = $request->all();
        // $selesi_order = 
        $token_pendakian = str_random(7);
        Order::where(['id' => $id])->update(['selesi_order' => $data['selesi_order'],'token_pendakian' => $token_pendakian,
       
       ]);
        return redirect(url('/booking-add-order-selesai/'.$token_pendakian))->with('flash_message_success', 'Selamat Anda Berhasil Menyelesaikan Order');
    }

    public function LihatOrder(Request $request, $token = null){
        // $orders = Order::find($token);
        $orders = Order::where(['token_pendakian'=>$token])->first();
        // echo "<pre>";
        // print_r($orders);
        // die;


        $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = str_random(30);
                Session::put('session_id',$session_id);
            }


        $jalur_pendakian = Jalur_pendakian::cursor();
        $pendakis = Pendaki::where(['id_order'=>$orders->id])->orderBy('id', 'desc')->where('status_kelompok', $orders->pendakis->id)->get();
        $pendakijumlah = Pendaki::where(['id_order'=>$orders->id])->orderBy('id', 'desc');


        if ($request->isMethod('post')) {
            date_default_timezone_set('Asia/Jakarta');

            $data = $request->all();

            $transaksi = new Transaksi;
            $transaksi->id_order = $data['id_order'];
            $transaksi->nama_pengirim = $data['nama_pengirim']; 
            $transaksi->bank = $data['bank'];
            $transaksi->no_rek = $data['no_rek'];
            $transaksi->jumlah = $data['jumlah'];
            // $transaksi->foto_bukti = $data['foto_bukti'];
            $transaksi->session_id = $session_id;
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

            Order::where(['token_pendakian' => $token])->update(['id_transaksi' => $transaksi->id]);


            $message['id_order'] = $data['id_order'];
            // $transaksi->bank = $data['bank'];
            $message['bank'] =  $data['bank'];
            $message['token'] =  $token;
            $success = event(new NewMessage($message));
            // echo "succes send";
            // return $success;



        return redirect()->back()->with('flash_message_success', 'konfrmasi Pembayaran telah di kirim');

        }



        return view('front.booking.booking_lihat_order')->with(compact('orders','pendakis','pendakijumlah'));


    }

}
