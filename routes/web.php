<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('message', function () {
    $message['user'] = "123 pretttttttt ";
    $message['message'] =  "SuxtM22";
    $message['cccc'] =  "cccc";
    $success = event(new App\Events\NewMessage($message));
    echo "succes send";
    // return $success;
});

Route::get('/vue-message' , function() {
    return view('admin.message');
});

// Route::get('message', 'admin\MessageController@newMessage');
Route::get('view-message', 'admin\MessageController@viewMessage');

Route::match(['get', 'post'], '/administrator', 'admin\adminController@login');


//Grup Admin Route

Route::group(['middleware' => ['auth']], function () {
    Route::get('/administrator/dashboard', 'admin\adminController@dashboard');
    Route::get('/logout', 'admin\adminController@logout');\
    
    //Kelola User
    Route::match(['get', 'post'], '/administrator/edit-user/{id}', 'admin\adminController@EditUser');
    Route::get('administrator/view-admin', 'admin\adminController@ViewUser');
    Route::get('administrator/hapus-admin/{id}', 'admin\adminController@HapusUser');  
    Route::get('administrator/hapus-foto-admin/{id}', 'admin\adminController@HapusUserImage');  
    Route::match(['get', 'post'], '/administrator/add-user', 'admin\adminController@AddUser');

    //Kelola Jadwal
    Route::match(['get', 'post'], '/administrator/add-jadwal', 'admin\JadwalController@AddJadwal');
    Route::match(['get', 'post'], '/administrator/edit-jadwal/{id}', 'admin\JadwalController@EditJadwal');
    Route::get('/administrator/view-jadwal', 'admin\JadwalController@ViewJadwal');
    Route::get('/administrator/view-jadwal-jalurpendakian/{id}', 'admin\JadwalController@ViewJadwalJalur');

    //Kelola Jalur Pendakian
    Route::match(['get', 'post'], '/administrator/add-jalurpendakian', 'admin\JalurPendakianController@AddJalurPendakian');
    Route::get('/administrator/view-jalurpendakian', 'admin\JalurPendakianController@ViewJalurPendakian');
    Route::get('/administrator/hapus-jalurpendakian/{id}', 'admin\JalurPendakianController@HapusJalurPendakian');
    Route::match(['get', 'post'], '/administrator/edit-jalurpendakian/{id}', 'admin\JalurPendakianController@EditJalurPendakian');
    Route::get('/administrator/hapus-image-jalurpendakian/{id}', 'admin\JalurPendakianController@HapusJalurImage');  

    //Order Pendakian
    Route::get('/administrator/view-order-all', 'admin\BokingController@viewAllOrder')->name('view-order-all.data.list');
    Route::get('/administrator/view-order-jadwal/{id}', 'admin\BokingController@ViewOrderJadwal');
    Route::get('/administrator/view-order-lihatpendaki/{token}', 'admin\BokingController@ViewPendaki');
    Route::get('/administrator/view-order-validasipembayaran/{token}', 'admin\BokingController@ValidasiPembayaranPendaki');
    Route::post('/administrator/view-order-validasipembayaran/', 'admin\BokingController@TransaksidiTempat');
    Route::get('/administrator/view-order-batalpembayaran/{token}', 'admin\BokingController@batalTransaksi');
    Route::get('/administrator/view-order-absendatang/{token}', 'admin\BokingController@absenDatang');
    //Transaksi Out 
    Route::get('/administrator/transaksi-count', 'Controller@mainTransaksi');

    //
    Route::get('/administrator/view-laporankeuangan', 'admin\LaporanKeuanganController@viewKeuangan');


 
});

//Pages
Route::get('/', 'front\PagesController@viewPages');
 
//Boking Gunung
Route::get('/booking-pilih-jalurpendakian', 'front\BookingPendakianController@jalurPendakian');
Route::get('/booking-pilih-jalurpendakian-jadwal/{id}', 'front\BookingPendakianController@jalurPendakianJadwal');
Route::post('/booking-add-order-ketua', 'front\BookingPendakianController@AddOrder');
Route::match(['get', 'post'], '/booking-add-order', 'front\BookingPendakianController@OrderPendakian');
Route::match(['get', 'post'], '/booking-add-order/data-diri-pendaki/{id}', 'front\BookingPendakianController@AddDataDiriPendakian');
Route::post('/booking-add-order-anggota', 'front\BookingPendakianController@AddOrderAnggota');
Route::get('/booking-add-order-anggota-hapus/{id}', 'front\BookingPendakianController@HapusOrderAnggota');
Route::post('/booking-add-order-anggota-edit/{id}', 'front\BookingPendakianController@EditOrderAnggota');
Route::post('/booking-add-order-selesai-valid/{id}', 'front\BookingPendakianController@SelesaiOrder');
// Route::get('/booking-add-order-selesai/{token}', 'front\BookingPendakianController@LihatOrder');
Route::match(['get', 'post'], '/booking-add-order-selesai/{token}', 'front\BookingPendakianController@LihatOrder');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
