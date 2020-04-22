<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Hash;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class adminController extends Controller
{
    public function login(Request $request)
    {
        
        if ($request->isMethod('post')) {
            $data = $request->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => '1'])) {
                Session::put('adminSession', $data['email']);
                return redirect('/administrator/dashboard');
            } else {
                return redirect('/administrator')->with('flash_message_error', 'Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/administrator')->with('flash_message_success', 'Logout out Berhasil');
    }

    public function AddUser(Request $request){

        if ($request->isMethod('post')) {

           
 
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;


            $userCount = User::where('email', $data['email'])->count();
            if ($userCount>0) {
                return redirect()->back()->with('flash_message_error','Email Telah Terdaftar - Coba Dengan Email Lain');
            } 
            else{

                if (empty($data['status'])) {
                    $status = 0;
                } else {
                    $status = 1;
                }

                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->status = $status;
                date_default_timezone_set('Asia/Jakarta');
                $user->created_at = date("Y-m-d h:i:sa");
                $user->updated_at = date("Y-m-d h:i:sa");
                $user->remember_token = Str::random(80);

                if ($request->hasFile('image')) {
                    $image_tmp = $request->file('image');
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111, 99999) . '.' . $extension;
                        $large_image_path = 'backend/images/profile/' . $filename;
                            //Resize
                            Image::make($image_tmp)->resize(270, 235)->save($large_image_path);
                            $user->image = $filename;
    
                    }
                }
                // }
                //     if ($request->hasFile('image')) {
                //         $image_tmp = Input::file('image');
                //         if ($image_tmp->isValid()) {
                //             $extension = $image_tmp->getClientOriginalExtension();
                //             $filename = rand(111, 99999) . '.' . $extension;
                //             $large_image_path = 'backend/images/profile/' . $filename;
                //             //Resize
                //             Image::make($image_tmp)->resize(270, 235)->save($large_image_path);
                //             $user->image = $filename;
                //         }
                //     }

                $user->save();
                return redirect('/administrator/view-admin')->with('flash_message_success', 'User Admin Berhasil di Tambah');
            }

        }

        return view('admin.user.admin_add_user');
    }

    public function EditUser(Request $request, $id = null){
     
        $user_id = Auth::user()->id;

        if (Auth::user()->id != $id ) {
            return redirect()->back()->with('flash_message_error', 'Ini bukan Account Anda !!! --> Anda tidak dapat mengedit Accond Lain');
        } 

        $userDetails = User::find($id);




        if ($request->isMethod('post')) {
            $data = $request->all(); 

               //Image Update Start
               if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $large_image_path = 'backend/images/profile/' . $filename;
                    //Resize
                    Image::make($image_tmp)->resize(270, 235)->save($large_image_path);
                   

                }
            } else {
                $filename = $data['current_image'];
            }
            //Image Update end
            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }

             date_default_timezone_set('Asia/Jakarta');
                // $user->created_at = date("Y-m-d h:i:sa");
                // $user->updated_at = date("Y-m-d h:i:sa");


            User::where(['id' => $user_id])->update([
                'name' => $data['name'], 'email' => $data['email'], 'status' => $status,'email' => $data['email'], 'image' => $filename
            ]);
            return redirect('/administrator/view-admin')->with('flash_message_success', 'Data Admin Berhasil di Edit');
        }
        
        return view('admin.user.admin_edit_user')->with(compact('userDetails'));

    }

    public function ViewUser(){

        $users = User::cursor();

        return view('admin.user.admin_view_user')->with(compact('users'));
    }

    public function HapusUser($id = null){
        User::where(['id' => $id])->delete();
        return redirect('/administrator/view-admin/')->with('flash_message_success', 'Data User Berhasil di Hapus');
   
    } 

    public function HapusUserImage($id = null){
        User::where(['id' => $id])->update(['image' => '']);
        return redirect()->back()->with('flash_message_success', 'Foto User Berhasil di Hapus');
   
    }

}
