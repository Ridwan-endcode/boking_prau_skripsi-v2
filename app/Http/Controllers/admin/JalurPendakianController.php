<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use App\Jalur_pendakian;

class JalurPendakianController extends Controller
{
    public function AddJalurPendakian(Request $request){

        if ($request->isMethod('post')) {
            $data = $request->all();
            date_default_timezone_set('Asia/Jakarta');

            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }

            $add_jalur_pendakian = new Jalur_pendakian;
            $add_jalur_pendakian->nama_jalur = $data['nama_jalur'];
            $add_jalur_pendakian->status = $status;
            $add_jalur_pendakian->alamat_jalur = $data['alamat_jalur'];
            $add_jalur_pendakian->create_id = auth()->user()->id;
            $add_jalur_pendakian->created_at = date("Y-m-d h:i:sa");
            $add_jalur_pendakian->updated_at = date("Y-m-d h:i:sa");

            if ($request->hasFile('image_peta_jalur')) {
                $image_tmp = $request->file('image_peta_jalur');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $large_image_path = 'backend/images/image_peta_jalur/' . $filename;
                        //Resize
                        Image::make($image_tmp)->resize(800, 533)->save($large_image_path);
                        $add_jalur_pendakian->image_peta_jalur = $filename;

                }
            }
    
            $add_jalur_pendakian->save();

            return redirect()->back()->with('flash_message_success', 'Data Jalur Pendakian Berhasil di Tambahkan');
        }

        return view('admin.jalur_pendakian.admin_add_jalurpendakian');

    }

    public function ViewJalurPendakian(){
        $jalur_pendakians = Jalur_pendakian::cursor();
        return view('admin.jalur_pendakian.admin_view_jalurpendakian')->with(compact('jalur_pendakians'));

    }
    
    public function EditJalurPendakian(Request $request, $id = null){

        if ($request->isMethod('post')) {
            $data = $request->all(); 

               //Image Update Start
               if ($request->hasFile('image_peta_jalur')) {
                $image_tmp = $request->file('image_peta_jalur');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $large_image_path = 'backend/images/image_peta_jalur/' . $filename;
                        //Resize
                    Image::make($image_tmp)->resize(800, 533)->save($large_image_path);
                   

                }
            } else {
                $filename = $data['current_image'];
            }
            //Image Update end

             date_default_timezone_set('Asia/Jakarta');
                // $user->created_at = date("Y-m-d h:i:sa");
                // $user->updated_at = date("Y-m-d h:i:sa");
                if (empty($data['status'])) {
                    $status = 0;
                } else {
                    $status = 1;
                }


						Jalur_pendakian::where(['id' => $id])->update([
                'nama_jalur' => $data['nama_jalur'], 'alamat_jalur' => $data['alamat_jalur'], 'status' => $status, 'image_peta_jalur' => $filename
            ]);
            return redirect('/administrator/view-jalurpendakian')->with('flash_message_success', 'Data Jalur Pendakian Berhasil di Edit');
				}
				
				$jalur_pendakians = Jalur_pendakian::find($id);
				return view('admin.jalur_pendakian.admin_edit_jalurpendakian')->with(compact('jalur_pendakians'));
		}
		
		public function HapusJalurPendakian($id = null){
			Jalur_pendakian::where(['id' => $id])->delete();
			return redirect('/administrator/view-jalurpendakian')->with('flash_message_success', 'Data Jalur  Berhasil di Hapus');
 
	}

	public function HapusJalurImage($id = null){
		Jalur_pendakian::where(['id' => $id])->update(['image_peta_jalur' => '']);
		return redirect()->back()->with('flash_message_success', 'Foto Jalur Pendakian Berhasil di Hapus');

	}
}
