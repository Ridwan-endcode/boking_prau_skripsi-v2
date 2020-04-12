<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jadwal;
use App\Pendaki;
use App\Jalur_pendakian;


class JadwalController extends Controller 
{
    public function AddJadwal(Request $request){
 
        
        if ($request->isMethod('post')) {
            $data = $request->all();
            $jadwalCount = Jadwal::where('tgl_jadwal', $data['tgl_jadwal'])->where(['id_jalur' => $data['id_jalur']])->count();
                if ($jadwalCount>0  ) {
                    return redirect()->back()->with('flash_message_error','Jadwal di Jalur tersebut sudah tersedia');
                } 


            date_default_timezone_set('Asia/Jakarta');

            $jadwal_add = new Jadwal;
            $jadwal_add->tgl_jadwal = $data['tgl_jadwal'];
            $jadwal_add->status = $data['status']; 
            $jadwal_add->kuota = $data['kuota'];
            $jadwal_add->id_jalur = $data['id_jalur'];
            $jadwal_add->harga = $data['harga'];
            $jadwal_add->create_id = auth()->user()->id;
            $jadwal_add->created_at = date("Y-m-d h:i:sa");
            $jadwal_add->updated_at = date("Y-m-d h:i:sa");
    
            $jadwal_add->save();

            return redirect()->back()->with('flash_message_success', 'Data Jadwal Berhasil di Tambahkan');
        }

        $jalur_pendakians = Jalur_pendakian::where(['status' => 1])->get();

        return view('admin.jadwal.admin_add_jadwal')->with(compact('jalur_pendakians'));

    }

    public function ViewJadwal(){

        $jadwals = Jadwal::cursor();

        return view('admin.jadwal.admin_view_jadwal')->with(compact('jadwals'));
    }

    public function EditJadwal(Request $request, $id = null){

        if ($request->isMethod('post')) {
            $data = $request->all(); 

            // $jadwalCount = Jadwal::where('tgl_jadwal', $data['tgl_jadwal'])->where(['id_jalur' => $data['id_jalur']])->count();
            // if ($jadwalCount>0  ) {
            //     return redirect('/administrator/view-jadwal/')->with('flash_message_success','Jadwal di Jalur tersebut sudah tersedia');
            // } 

             date_default_timezone_set('Asia/Jakarta');
                // $user->created_at = date("Y-m-d h:i:sa");
                // $user->updated_at = date("Y-m-d h:i:sa");


            Jadwal::where(['id' => $id])->update([
                'status' => $data['status'], 'harga' => $data['harga'], 'kuota' => $data['kuota']
            ]);
            return redirect('/administrator/view-jadwal')->with('flash_message_success', 'Data Jadwal Berhasil di Edit');
        }

        $jadwal = Jadwal::find($id);
        $jalur_pendakian = Jalur_pendakian::cursor();

        return view('admin.jadwal.admin_edit_jadwal')->with(compact('jadwal','jalur_pendakian'));

    }

    public function ViewJadwalJalur($id = null){

        // echo $slug; die;
        $jalur_pendakian = Jalur_pendakian::where(['id'=>$id])->first();

        if ($id !== null) {
            # code...
            $jalur_pendakianCont = Jalur_pendakian::where(['id' => $id])->count();
            if ($jalur_pendakianCont == 0) {
                abort(404);
            }
            $jadwals = Jadwal::where(['id_jalur'=>$jalur_pendakian->id])->get();
        }else{
            $jadwals = Jadwal::orderBy('id', 'desc')->get();
        }

        foreach ($jadwals as $jadwal) {
            $pendakis = Pendaki::where(['id_jadwal' => $jadwal->id])->get();
            foreach ($pendakis as $jmlah) {
                $jmlah = $jmlah->count();
            }
        }
        

        return view('admin.jadwal.admin_view_jalur_jadwal')->with(compact('jalur_pendakian','jadwals'));

    }
}
