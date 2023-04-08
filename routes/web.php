<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
	// Auth::logout();
    return view('welcome');
});
Route::get('login', function () {
    return view('auth.login');
});

Auth::routes();

// Auth
Route::post('/postLogin', [AuthController::class, 'index'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('/menu', [UserController::class, 'index'])->name('menu');

//Service
Route::get('service',[ServiceController::class,'service'])->name('service');
Route::get('service/{id}',[ServiceController::class,'dservice'])->name('dservice');

//Dashboard-JualBeli
Route::get('/jualBelis/', [DashboardController::class, 'indexJualBeli'])->name('menu');
Route::post('/tambahJualBeli/', [DashboardController::class, 'tambahJualBeli']);
Route::get('/detailJualBeli/{id}', [DashboardController::class, 'detailJualBeli'])->name('menu');
Route::delete('/hapusJualBeli/{id}', [DashboardController::class, 'hapusJualBeli']);
Route::get('/editJualBeli/{id}', [DashboardController::class, 'editJualBeli'])->name('menu');
Route::patch('/updateJualBeli/{id}', [DashboardController::class, 'updateJualBeli']);
Route::get('/bayarJualBeli/{id}', [DashboardController::class, 'bayarJualBeli']);
Route::post('/bayarJualBeli/{id}', [DashboardController::class, 'pbayarJualBeli']);
Route::get('/bayarJualBeliA/{id}', [DashboardController::class, 'bayarJualBeliA']);
Route::post('/bayarJualBeliA/{id}', [DashboardController::class, 'pbayarJualBeliA']);

//Dashboard-Hibah
Route::get('/hibahs', [DashboardController::class, 'indexHibah'])->name('menu');
Route::post('/tambahHibah', [DashboardController::class, 'tambahHibah']);
Route::get('/detailHibah/{id}', [DashboardController::class, 'detailHibah'])->name('menu');
Route::delete('/hapusHibah/{id}', [DashboardController::class, 'hapusHibah']);
Route::get('/editHibah/{id}', [DashboardController::class, 'editHibah'])->name('menu');
Route::patch('/updateHibah/{id}', [DashboardController::class, 'updateHibah']);
Route::get('/bayarHibah/{id}', [DashboardController::class, 'bayarHibah']);
Route::post('/bayarHibah/{id}', [DashboardController::class, 'pbayarHibah']);
Route::get('/bayarHibahA/{id}', [DashboardController::class, 'bayarHibahA']);
Route::post('/bayarHibahA/{id}', [DashboardController::class, 'pbayarHibahA']);

//Dashboard-APHB
Route::get('/aphbs', [DashboardController::class, 'indexAphb'])->name('menu');
Route::post('/tambahAPHB', [DashboardController::class, 'tambahAphb']);
Route::get('/detailAPHB/{id}', [DashboardController::class, 'detailAphb'])->name('menu');
Route::delete('/hapusAPHB/{id}', [DashboardController::class, 'hapusAphb']);
Route::get('/editAPHB/{id}', [DashboardController::class, 'editAphb'])->name('menu');
Route::patch('/updateAPHB/{id}', [DashboardController::class, 'updateAphb']);
Route::get('/bayarAPHB/{id}', [DashboardController::class, 'bayarAphb']);
Route::post('/bayarAPHB/{id}', [DashboardController::class, 'pbayarAphb']);
Route::get('/bayarAPHBA/{id}', [DashboardController::class, 'bayarAphbA']);
Route::post('/bayarAPHBA/{id}', [DashboardController::class, 'pbayarAphbA']);

//Dashboard-PT
Route::get('/pts', [DashboardController::class, 'indexPt'])->name('menu');
Route::post('/tambahPT', [DashboardController::class, 'tambahPt']);
Route::get('/detailPT/{id}', [DashboardController::class, 'detailPt'])->name('menu');
Route::delete('/hapusPT/{id}', [DashboardController::class, 'hapusPt']);
Route::get('/editPT/{id}', [DashboardController::class, 'editPt'])->name('menu');
Route::patch('/updatePT/{id}', [DashboardController::class, 'updatePt']);
Route::get('/bayarPt/{id}', [DashboardController::class, 'bayarPt']);
Route::post('/bayarPt/{id}', [DashboardController::class, 'pbayarPt']);
Route::get('/bayarPtA/{id}', [DashboardController::class, 'bayarPtA']);
Route::post('/bayarPtA/{id}', [DashboardController::class, 'pbayarPtA']);

//Dashboard-CV
Route::get('/cvs', [DashboardController::class, 'indexCv'])->name('menu');
Route::post('/tambahCV', [DashboardController::class, 'tambahCv']);
Route::get('/detailCV/{id}', [DashboardController::class, 'detailCv'])->name('menu');
Route::delete('/hapusCV/{id}', [DashboardController::class, 'hapusCv']);
Route::get('/editCV/{id}', [DashboardController::class, 'editCv'])->name('menu');
Route::patch('/updateCV/{id}', [DashboardController::class, 'updateCv']);
Route::get('/bayarCv/{id}', [DashboardController::class, 'bayarCv']);
Route::post('/bayarCv/{id}', [DashboardController::class, 'pbayarCv']);
Route::get('/bayarCvA/{id}',[DashboardController::class,'bayarCvA']);
Route::post('/bayarCvA/{id}',[DashboardController::class,'pbayarCvA']);

//Dashboard-SIUP
Route::get('/siups', [DashboardController::class, 'indexSiup'])->name('menu');
Route::post('/tambahSIUP', [DashboardController::class, 'tambahSiup']);
Route::get('/detailSIUP/{id}', [DashboardController::class, 'detailSiup'])->name('menu');
Route::delete('/hapusSIUP/{id}', [DashboardController::class, 'hapusSiup']);
Route::get('/editSIUP/{id}', [DashboardController::class, 'editSiup'])->name('menu');
Route::patch('/updateSIUP/{id}', [DashboardController::class, 'updateSiup']);
Route::get('/bayarSiup/{id}', [DashboardController::class, 'bayarSiup']);
Route::post('/bayarSiup/{id}', [DashboardController::class, 'pbayarSiup']);
Route::get('/bayarSiupA/{id}', [DashboardController::class, 'bayarSiupA']);
Route::post('/bayarSiupA/{id}', [DashboardController::class, 'pbayarSiupA']);

//Dashboard-NIB
Route::get('/nibs', [DashboardController::class, 'indexNib'])->name('menu');
Route::post('/tambahNIB', [DashboardController::class, 'tambahNib']);
Route::get('/detailNIB/{id}', [DashboardController::class, 'detailNib'])->name('menu');
Route::delete('/hapusNIB/{id}', [DashboardController::class, 'hapusNib']);
Route::get('/editNIB/{id}', [DashboardController::class, 'editNib'])->name('menu');
Route::patch('/updateNIB/{id}', [DashboardController::class, 'updateNib']);
Route::get('/bayarNIB/{id}', [DashboardController::class, 'bayarNib']);
Route::post('/bayarNIB/{id}', [DashboardController::class, 'pbayarNib']);
Route::get('/bayarNIBA/{id}', [DashboardController::class, 'bayarNibA']);
Route::post('/bayarNIBA/{id}', [DashboardController::class, 'pbayarNibA']);

//Dashboard-Pecah Sertifikat
Route::get('/pecahSertifikats', [DashboardController::class, 'indexPecahSertifikat'])->name('menu');
Route::post('/tambahPecahSertifikat', [DashboardController::class, 'tambahPecahSertifikat']);
Route::get('/detailPecahSertifikat/{id}', [DashboardController::class, 'detailPecahSertifikat'])->name('menu');
Route::delete('/hapusPecahSertifikat/{id}', [DashboardController::class, 'hapusPecahSertifikat']);
Route::get('/editPecahSertifikat/{id}', [DashboardController::class, 'editPecahSertifikat'])->name('menu');
Route::patch('/updatePecahSertifikat/{id}', [DashboardController::class, 'updatePecahSertifikat']);
Route::get('/bayarPecahSertifikat/{id}', [DashboardController::class, 'bayarPecahSertifikat']);
Route::post('/bayarPecahSertifikat/{id}', [DashboardController::class, 'pbayarPecahSertifikat']);
Route::get('/bayarPecahSertifikatA/{id}', [DashboardController::class, 'bayarPecahSertifikatA']);
Route::post('/bayarPecahSertifikatA/{id}', [DashboardController::class, 'pbayarPecahSertifikatA']);

//Dashboard-Pecah Sertifikat
Route::get('/penyertifikatans', [DashboardController::class, 'indexPenyertifikatan'])->name('menu');
Route::post('/tambahPenyertifikatan', [DashboardController::class, 'tambahPenyertifikatan']);
Route::get('/detailPenyertifikatan/{id}', [DashboardController::class, 'detailPenyertifikatan'])->name('menu');
Route::delete('/hapusPenyertifikatan/{id}', [DashboardController::class, 'hapusPenyertifikatan']);
Route::get('/editPenyertifikatan/{id}', [DashboardController::class, 'editPenyertifikatan'])->name('menu');
Route::patch('/updatePenyertifikatan/{id}', [DashboardController::class, 'updatePenyertifikatan']);
Route::get('/bayarPenyertifikatan/{id}', [DashboardController::class, 'bayarPenyertifikatan']);
Route::post('/bayarPenyertifikatan/{id}', [DashboardController::class, 'pbayarPenyertifikatan']);
Route::get('/bayarPenyertifikatanA/{id}', [DashboardController::class, 'bayarPenyertifikatanA']);
Route::post('/bayarPenyertifikatanA/{id}', [DashboardController::class, 'pbayarPenyertifikatanA']);

//Dashboard-Peta Bidang
Route::get('/petaBidangs', [DashboardController::class, 'indexPetaBidang'])->name('menu');
Route::post('/tambahPetaBidang', [DashboardController::class, 'tambahPetaBidang']);
Route::get('/detailPetaBidang/{id}', [DashboardController::class, 'detailPetaBidang'])->name('menu');
Route::delete('/hapusPetaBidang/{id}', [DashboardController::class, 'hapusPetaBidang']);
Route::get('/editPetaBidang/{id}', [DashboardController::class, 'editPetaBidang'])->name('menu');
Route::patch('/updatePetaBidang/{id}', [DashboardController::class, 'updatePetaBidang']);
Route::get('/bayarPetaBidang/{id}', [DashboardController::class, 'bayarPetaBidang']);
Route::post('/bayarPetaBidang/{id}', [DashboardController::class, 'pbayarPetaBidang']);
Route::get('/bayarPetaBidangA/{id}', [DashboardController::class, 'bayarPetaBidangA']);
Route::post('/bayarPetaBidangA/{id}', [DashboardController::class, 'pbayarPetaBidangA']);

//Dashboard-Roya
Route::get('/royas', [DashboardController::class, 'indexRoya'])->name('menu');
Route::post('/tambahRoya', [DashboardController::class, 'tambahRoya']);
Route::get('/detailRoya/{id}', [DashboardController::class, 'detailRoya'])->name('menu');
Route::delete('/hapusRoya/{id}', [DashboardController::class, 'hapusRoya']);
Route::get('/editRoya/{id}', [DashboardController::class, 'editRoya'])->name('menu');
Route::patch('/updateRoya/{id}', [DashboardController::class, 'updateRoya']);
Route::get('/bayarRoya/{id}', [DashboardController::class, 'bayarRoya']);
Route::post('/bayarRoya/{id}', [DashboardController::class, 'pbayarRoya']);
Route::get('/bayarRoyaA/{id}', [DashboardController::class, 'bayarRoyaA']);
Route::post('/bayarRoyaA/{id}', [DashboardController::class, 'pbayarRoyaA']);

//Dashboard-APHB
Route::get('/wariss', [DashboardController::class, 'indexWaris'])->name('menu');
Route::post('/tambahWaris', [DashboardController::class, 'tambahWaris']);
Route::get('/detailWaris/{id}', [DashboardController::class, 'detailWaris'])->name('menu');
Route::delete('/hapusWaris/{id}', [DashboardController::class, 'hapusWaris']);
Route::get('/editWaris/{id}', [DashboardController::class, 'editWaris'])->name('menu');
Route::patch('/updateWaris/{id}', [DashboardController::class, 'updateWaris']);
Route::get('/bayarWaris/{id}', [DashboardController::class, 'bayarWaris']);
Route::post('/bayarWaris/{id}', [DashboardController::class, 'pbayarWaris']);
Route::get('/bayarWarisA/{id}', [DashboardController::class, 'bayarWarisA']);
Route::post('/bayarWarisA/{id}', [DashboardController::class, 'pbayarWarisA']);

//Dashboard-Manage Users
Route::get('/users', [DashboardController::class, 'indexUsers'])->name('users');
Route::post('/tambahManageUsers', [DashboardController::class, 'tambahUsers']);
Route::delete('/hapusManageUsers/{id}', [DashboardController::class, 'hapusUsers']);
Route::get('/editManageUsers/{id}', [DashboardController::class, 'editUsers']);
Route::patch('/updateManageUsers/{id}', [DashboardController::class, 'updateUsers']);
Route::get('/bayarJualBeli/{id}', [DashboardController::class, 'bayarJualBeli']);
Route::post('/bayarJualBeli/{id}', [DashboardController::class, 'pbayarJualBeli']);


//User-JualBeli
Route::get('/users/jualBelis', [UserController::class, 'indexJualBeli']);
Route::post('/users/jualBelis/add', [UserController::class, 'tambahJualBeli']);
Route::get('/users/jualBelis/detail/{idx}',[UserController::class, 'detailJualBeli']);
Route::delete('/users/jualBelis/batal/{id}', [UserController::class, 'hapusJualBeli']);
Route::post('/users/jualBelis/selesai/{id}', [UserController::class, 'selesaiJualBeli']);
Route::get('/users/jualBelis/bayar/{id}', [UserController::class, 'bayarJualBeli']);
Route::post('/users/jualBelis/bayar/{id}', [UserController::class, 'UploadbayarJualBeli']);

//User-APHB
Route::get('/users/aphbs', [UserController::class, 'indexAphb']);
Route::post('/users/aphbs/add', [UserController::class, 'tambahAphb']);
Route::get('/users/aphbs/detail/{idx}',[UserController::class, 'detailAphb']);
Route::delete('/users/aphbs/batal/{id}', [UserController::class, 'hapusAphb']);
Route::post('/users/aphbs/selesai/{id}', [UserController::class, 'selesaiAphb']);
Route::get('/users/aphbs/bayar/{id}', [UserController::class, 'bayarAphb']);
Route::post('/users/aphbs/bayar/{id}', [UserController::class, 'UploadbayarAphb']);

//User-CV
Route::get('/users/cvs', [UserController::class, 'indexCv']);
Route::post('/users/cvs/add', [UserController::class, 'tambahCv']);
Route::get('/users/cvs/detail/{idx}',[UserController::class, 'detailCv']);
Route::delete('/users/cvs/batal/{id}', [UserController::class, 'hapusCv']);
Route::post('/users/cvs/selesai/{id}', [UserController::class, 'selesaiCv']);
Route::get('/users/cvs/bayar/{id}', [UserController::class, 'bayarCv']);
Route::post('/users/cvs/bayar/{id}', [UserController::class, 'UploadbayarCv']);

//User-Hibah
Route::get('/users/hibahs', [UserController::class, 'indexHibah']);
Route::post('/users/hibahs/add', [UserController::class, 'tambahHibah']);
Route::get('/users/hibahs/detail/{idx}',[UserController::class, 'detailHibah']);
Route::delete('/users/hibahs/batal/{id}', [UserController::class, 'hapusHibah']);
Route::post('/users/hibahs/selesai/{id}', [UserController::class, 'selesaiHibah']);
Route::get('/users/hibahs/bayar/{id}', [UserController::class, 'bayarHibah']);
Route::post('/users/hibahs/bayar/{id}', [UserController::class, 'UploadbayarHibah']);

//User-NIB
Route::get('/users/nibs', [UserController::class, 'indexNib']);
Route::post('/users/nibs/add', [UserController::class, 'tambahNib']);
Route::get('/users/nibs/detail/{idx}',[UserController::class, 'detailNib']);
Route::delete('/users/nibs/batal/{id}', [UserController::class, 'hapusNib']);
Route::post('/users/nibs/selesai/{id}', [UserController::class, 'selesaiNib']);
Route::get('/users/nibs/bayar/{id}', [UserController::class, 'bayarNib']);
Route::post('/users/nibs/bayar/{id}', [UserController::class, 'UploadbayarNib']);

//User-Pecah Sertifikat
Route::get('/users/pecahSertifikats', [UserController::class, 'indexPecahSertifikat']);
Route::post('/users/pecahSertifikats/add', [UserController::class, 'tambahPecahSertifikat']);
Route::get('/users/pecahSertifikats/detail/{idx}',[UserController::class, 'detailPecahSertifikat']);
Route::delete('/users/pecahSertifikats/batal/{id}', [UserController::class, 'hapusPecahSertifikat']);
Route::post('/users/pecahSertifikats/selesai/{id}', [UserController::class, 'selesaiPecahSertifikat']);
Route::get('/users/pecahSertifikats/bayar/{id}', [UserController::class, 'bayarPecahSertifikat']);
Route::post('/users/pecahSertifikats/bayar/{id}', [UserController::class, 'UploadbayarPecahSertifikat']);

//User-Penyertifikatan
Route::get('/users/penyertifikatans', [UserController::class, 'indexPenyertifikatan']);
Route::post('/users/penyertifikatans/add', [UserController::class, 'tambahPenyertifikatan']);
Route::get('/users/penyertifikatans/detail/{idx}',[UserController::class, 'detailPenyertifikatan']);
Route::delete('/users/penyertifikatans/batal/{id}', [UserController::class, 'hapusPenyertifikatan']);
Route::post('/users/penyertifikatans/selesai/{id}', [UserController::class, 'selesaiPenyertifikatan']);
Route::get('/users/penyertifikatans/bayar/{id}', [UserController::class, 'bayarPenyertifikatan']);
Route::post('/users/penyertifikatans/bayar/{id}', [UserController::class, 'UploadbayarPenyertifikatan']);


//User-Peta Bidang
Route::get('/userspetaBidangs', [UserController::class, 'indexPetaBidang']);
Route::post('/userspetaBidangs/add', [UserController::class, 'tambahPetaBidang']);
Route::get('/userspetaBidangs/detail/{idx}',[UserController::class, 'detailPetaBidang']);
Route::delete('/userspetaBidangs/batal/{id}', [UserController::class, 'hapusPetaBidang']);
Route::post('/userspetaBidangs/selesai/{id}', [UserController::class, 'selesaiPetaBidang']);
Route::get('/users/petaBidangs/bayar/{id}', [UserController::class, 'bayarPetaBidang']);
Route::post('/users/petaBidangs/bayar/{id}', [UserController::class, 'UploadbayarPetaBidang']);

//User-PT
Route::get('/users/pts', [UserController::class, 'indexPt']);
Route::post('/users/pts/add', [UserController::class, 'tambahPt']);
Route::get('/users/pts/detail/{idx}',[UserController::class, 'detailPt']);
Route::delete('/users/pts/batal/{id}', [UserController::class, 'hapusPt']);
Route::post('/users/pts/selesai/{id}', [UserController::class, 'selesaiPt']);
Route::get('/users/pts/bayar/{id}', [UserController::class, 'bayarPt']);
Route::post('/users/pts/bayar/{id}', [UserController::class, 'UploadbayarPt']);

//User-Roya
Route::get('/users/royas', [UserController::class, 'indexRoya']);
Route::post('/users/royas/add', [UserController::class, 'tambahRoya']);
Route::get('/users/royas/detail/{idx}',[UserController::class, 'detailRoya']);
Route::delete('/users/royas/batal/{id}', [UserController::class, 'hapusRoya']);
Route::post('/users/royas/selesai/{id}', [UserController::class, 'selesaiRoya']);
Route::get('/users/royas/bayar/{id}', [UserController::class, 'bayarRoya']);
Route::post('/users/royas/bayar/{id}', [UserController::class, 'UploadbayarRoya']);

//User-SIUP
Route::get('/users/siups', [UserController::class, 'indexSiup']);
Route::post('/users/siups/add', [UserController::class, 'tambahSiup']);
Route::get('/users/siups/detail/{idx}',[UserController::class, 'detailSiup']);
Route::delete('/users/siups/batal/{id}', [UserController::class, 'hapusSiup']);
Route::post('/users/siups/selesai/{id}', [UserController::class, 'selesaiSiup']);
Route::get('/users/siups/bayar/{id}', [UserController::class, 'bayarSiup']);
Route::post('/users/siups/bayar/{id}', [UserController::class, 'UploadbayarSiup']);

//User-Waris
Route::get('/users/wariss', [UserController::class, 'indexWaris']);
Route::post('/users/wariss/add', [UserController::class, 'tambahWaris']);
Route::get('/users/wariss/detail/{idx}',[UserController::class, 'detailWaris']);
Route::delete('/users/wariss/batal/{id}', [UserController::class, 'hapusWaris']);
Route::post('/users/wariss/selesai/{id}', [UserController::class, 'selesaiWaris']);
Route::get('/users/wariss/bayar/{id}', [UserController::class, 'bayarWaris']);
Route::post('/users/wariss/bayar/{id}', [UserController::class, 'UploadbayarWaris']);

//Chats
Route::get('/chat',[ChatController::class,'chat'])->name('chat');
Route::get('/user_chat',[ChatController::class,'uchat'])->name('uchat');
Route::get('/detailchat/{id}',[ChatController::class,'dchat']);
Route::post('/pesanchat/{id}',[ChatController::class,'pchat']);
Route::post('/pesanchatuser/{id}',[ChatController::class,'pchatuser']);

Route::get('/user_history',[HistoryController::class,'user_history']);

Route::get('/report',[ReportController::class,'report'])->name('report');
Route::get('/report/cetak',[ReportController::class,'cetak'])->name('cetak');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
