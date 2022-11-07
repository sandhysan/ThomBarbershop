<?php

use App\Http\Controllers\ControllerAdminUser;
use App\Http\Controllers\ControllerBooking;
use App\Http\Controllers\ControllerDashboard;
use App\Http\Controllers\ControllerHome;
use App\Http\Controllers\ControllerKaryawan;
use App\Http\Controllers\ControllerKelolaBooking;
use App\Http\Controllers\ControllerLayanan;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerLoginGoogle;
use App\Http\Controllers\ControllerRegistrasi;
use App\Http\Controllers\ControllerReport;
use App\Http\Controllers\ControllerReset;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\ControllerWaktu;
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

// Route::get('/admin', function () {
//     return view('/dashboard.profileAdmin');
// });

// Route::get('/l', function () {
//     return view('dashboard.cetakreport');
// });



// Guest and User View
Route::get('/', [ControllerHome::class, 'index']);


// Reset Password
Route::get('/forget', [ControllerReset::class, 'forget']);
Route::get('/reset/{email}', [ControllerReset::class, 'password']);
Route::post('/resetlink', [ControllerReset::class, 'link']);
Route::post('/newpass/{email}', [ControllerReset::class, 'simpan']);

// User Views
Route::get('/hair', [ControllerBooking::class, 'hair'])->middleware('User');
Route::get('/profilUser', [ControllerUser::class, 'userIndex'])->middleware('User');
Route::get('/riwayatbook', [ControllerBooking::class, 'viewOrder'])->middleware('User');
Route::post('/konfirbook', [ControllerBooking::class, 'viewConfir'])->middleware('User');
Route::get('/editprofil', [ControllerUser::class, 'viewUser'])->middleware('User');
Route::get('/jadwal', [ControllerBooking::class, 'listBook'])->middleware('User');

//User Input
Route::post('/book', [ControllerBooking::class, 'index'])->middleware('User');
Route::get('/booking', [ControllerBooking::class, 'indexbooking'])->middleware('User');
Route::get('/savebook', [ControllerBooking::class, 'store'])->middleware('User');
// Route::get('/saveconfir', [ControllerBooking::class, 'confirBook'])->middleware('User');
Route::post('/confirmbook', [ControllerBooking::class, 'savebook'])->middleware('User');

//User Edit
Route::post('/editProfilUser', [ControllerUser::class, 'editProfil'])->middleware('User');
Route::post('/updateJadwal', [ControllerBooking::class, 'reschedule'])->middleware('User');

//Delete User
Route::post('/cancelBook/{id}', [ControllerBooking::class, 'cancel'])->middleware('User');

//Google Login
Route::get('/auth/redirect', [ControllerLoginGoogle::class, 'redirectToProvider']);
Route::get('/auth/callback', [ControllerLoginGoogle::class, 'handleProviderCallback']);

// SignIn and SignUp
Route::get('/login', [ControllerLogin::class, 'login']);
Route::post('/login', [ControllerLogin::class, 'authenticate']);
Route::post('/logout', [ControllerLogin::class, 'logout']);
Route::get('/registrasi', [ControllerRegistrasi::class, 'registrasi']);
Route::post('/registrasi', [ControllerRegistrasi::class, 'store']);

//Admin Views
Route::get('/dashboard', [ControllerDashboard::class, 'index'])->middleware('Admin');
Route::get('/customerUser', [ControllerUser::class, 'index'])->middleware('Admin');
Route::get('/adminUser', [ControllerAdminUser::class, 'index'])->middleware('Admin');
Route::get('/profilAdmin', [ControllerAdminUser::class, 'profiladmin'])->middleware('Admin');
Route::get('/karyawanUser', [ControllerKaryawan::class, 'index'])->middleware('Admin');
Route::get('/layanan', [ControllerLayanan::class, 'index'])->middleware('Admin');
Route::get('/hari', [ControllerWaktu::class, 'hari'])->middleware('Admin');
Route::get('/waktu', [ControllerWaktu::class, 'waktu'])->middleware('Admin');
Route::get('/pemesanan', [ControllerKelolaBooking::class, 'index'])->middleware('Admin');
Route::get('/todaybook', [ControllerKelolaBooking::class, 'today'])->middleware('Admin');
Route::get('/listbook', [ControllerKelolaBooking::class, 'listBooking'])->middleware('Admin');
Route::get('/report', [ControllerReport::class, 'index'])->middleware('Admin');

//Search Data Table
Route::get('/searchUser', [ControllerUser::class, 'cariCustomer'])->middleware('Admin');
Route::get('/searchAdmin', [ControllerAdminUser::class, 'cariAdmin'])->middleware('Admin');
Route::get('/searchBook', [ControllerKelolaBooking::class, 'cariBooking'])->middleware('Admin');
Route::get('/searchHair', [ControllerLayanan::class, 'cariLayanan'])->middleware('Admin');
Route::get('/searchKaryawan', [ControllerKaryawan::class, 'cariKaryawan'])->middleware('Admin');

// Export files
Route::get('/printPDF', [ControllerReport::class, 'printPDF'])->middleware('Admin');
Route::get('/export', [ControllerReport::class, 'export'])->middleware('Admin');

//Admin inputs
Route::get('/inputAdminUser', [ControllerAdminUser::class, 'forminput'])->middleware('Admin');
Route::post('/simpanAdminUser', [ControllerAdminUser::class, 'store'])->middleware('Admin');
Route::get('/inputKywnUser', [ControllerKaryawan::class, 'inputview'])->middleware('Admin');
Route::post('/simpanKywnUser', [ControllerKaryawan::class, 'store'])->middleware('Admin');
Route::get('/inputLayanan', [ControllerLayanan::class, 'input'])->middleware('Admin');
Route::post('/tambahlyn', [ControllerLayanan::class, 'store'])->middleware('Admin');
Route::post('/simpanHari', [ControllerWaktu::class, 'storeHari'])->middleware('Admin');
Route::post('/simpanWaktu', [ControllerWaktu::class, 'storeWaktu'])->middleware('Admin');
Route::get('/inputBook', [ControllerKelolaBooking::class, 'inputView'])->middleware('Admin');

//Admin edits
Route::get('/editViewAdmin/{id}', [ControllerAdminUser::class, 'editview'])->middleware('Admin');
Route::post('/editAdmin', [ControllerAdminUser::class, 'edit'])->middleware('Admin');
Route::get('/editViewUser/{id}', [ControllerUser::class, 'editview'])->middleware('Admin');
Route::post('/editUser', [ControllerUser::class, 'edit'])->middleware('Admin');
Route::get('/editViewKywn/{id}', [ControllerKaryawan::class, 'editview'])->middleware('Admin');
Route::post('/editKywn', [ControllerKaryawan::class, 'edit'])->middleware('Admin');
Route::get('/viewProfile', [ControllerAdminUser::class, 'viewprofil'])->middleware('Admin');
Route::post('/editProfil', [ControllerAdminUser::class, 'editprofil'])->middleware('Admin');
Route::get('/viewLayanaan/{id}', [ControllerLayanan::class, 'viewlyn'])->middleware('Admin');
Route::put('/editlayanan/{id}', [ControllerLayanan::class, 'edit'])->middleware('Admin');
Route::post('/editHari', [ControllerWaktu::class, 'editHari'])->middleware('Admin');
Route::post('/editJam', [ControllerWaktu::class, 'editWaktu'])->middleware('Admin');
Route::post('/editStatus', [ControllerKelolaBooking::class, 'editStatus'])->middleware('Admin');
Route::post('/editStatusToday', [ControllerKelolaBooking::class, 'editStatusToday'])->middleware('Admin');


//Admin deletes
Route::get('/deleteAdmin/{id}', [ControllerAdminUser::class, 'hapus'])->middleware('Admin');
Route::get('/deleteUser/{id}', [ControllerUser::class, 'hapus'])->middleware('Admin');
Route::get('/deleteKywn/{id}', [ControllerKaryawan::class, 'hapus'])->middleware('Admin');
Route::get('/deleteLyn/{id}', [ControllerLayanan::class, 'hapus'])->middleware('Admin');
Route::get('/deleteHari/{id}', [ControllerWaktu::class, 'hapusHari'])->middleware('Admin');
Route::get('/deleteWaktu/{id}', [ControllerWaktu::class, 'hapusWaktu'])->middleware('Admin');
Route::post('/deleteBook/{id}', [ControllerKelolaBooking::class, 'hapus'])->middleware('Admin');
