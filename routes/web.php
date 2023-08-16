<?php

use App\Http\Controllers\Admin\AngsuranController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PinjamanController;
use App\Http\Controllers\Admin\SimpananController;
use App\Http\Controllers\Admin\User_ManagesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserManagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\User\MidtransSimpananController;
use App\Http\Controllers\User\UserAngsuranController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\User\UserDashbordController;
use App\Http\Controllers\User\UserDataDiriController;
use App\Http\Controllers\User\UserPinjamanController;
use App\Http\Controllers\User\UserSimpananController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/register', [RegistersController::class,'index'])->name('register');

Route::post('/register', [RegistersController::class,'store'])->name('register-account');

Route::get('/login', [AuthController::class,'index'])->name('login');

Route::post('/login',[AuthController::class,'store'])->name('login-account');

Route::post('/logout',[AuthController::class,'destroy'])->name('logout');

    
    
Route::post('/midtrans/callback',[MidtransController::class,'callback']);
Route::get('/midtrans/finish',[MidtransController::class,'finishRedirect']) ->name('midtrans-finish-redirect');
Route::get('/midtrans/unfinish',[MidtransController::class,'unfinishRedirect']);
Route::get('/midtrans/error',[MidtransController::class,'errorRedirect']);

Route::get('/clear-cache', function() {
     //Clear route cache:
     Artisan::call('route:cache');
     //Clear config cache:
     Artisan::call('config:cache');
     // Clear application cache:
     Artisan::call('cache:clear');
     // Clear view cache:
     Artisan::call('view:clear');
     return 'Cache cleared';
 });



Route::middleware(['auth'])->group( function() {
    Route::get('/dashboard',[UserDashbordController::class,'indexDashboardUser'])
    ->name('index-dashboard-user');
    
    
    //simpanan user
    Route::get('/simpanan',[UserSimpananController::class,'indexSimpananUser'])
    ->name('simpanan-user');
    
    Route::get('/simpanan/create',[UserSimpananController::class,'createSimpananUser'])
    ->name('simpanan-user-create');
    
    Route::post('/simpanan/create',[UserSimpananController::class,'storeSimpananUser'])
    ->name('simpanan-user-store');
    
    Route::get('/simpanan/create-type',[UserSimpananController::class,'createSimpananTypeUser'])
    ->name('simpanan-user-create-type');
    
    Route::post('/simpanan/create-type',[UserSimpananController::class,'postSimpananTypeUser'])
    ->name('simpanan-user-create-type-post');
    
    
    Route::get('/simpanan/create-total',[UserSimpananController::class,'createTotalSimpanan'])
    ->name('simpanan-user-create-total');
    
    Route::post('/simpanan/create-total',[UserSimpananController::class,'createTotalSimpananPost'])
    ->name('simpanan-user-create-total-post');
    
    Route::get('/simpanan/{simpanan}',[UserSimpananController::class,'detail'])
    ->name('simpanan-user-detail');

    //pinjaman user
    Route::get('/pinjaman',[UserPinjamanController::class,'indexPinjamanUser'])
    ->name('pinjaman-user');
    
    Route::get('/pinjaman/create-one',[UserPinjamanController::class,'createOneUser'])
    ->name('pinjaman-createOne-user');
    
    Route::post('/pinjaman/create-one',[UserPinjamanController::class,'createOneUserPost'])
    ->name('pinjaman-createOnePost-user');
    
    Route::get('/pinjaman/create-calculate',[UserPinjamanController::class,'createTwoUser'])
    ->name('pinjaman-createTwo-user');
    
    Route::post('/pinjaman/create-calculate',[UserPinjamanController::class,'createTwoUserPost'])
    ->name('pinjaman-createTwoPost-user');
    
    Route::get('/pinjaman/create-total',[UserPinjamanController::class,'createTotalUser'])
    ->name('pinjaman-createTotal-user');
    
    Route::post('/pinjaman/create-total',[UserPinjamanController::class,'createTotalUserPost'])
    ->name('pinjaman-createTotalPost-user');
    
    Route::get('/pinjaman/{pinjaman}',[UserPinjamanController::class,'detailUser'])
    ->name('pinjaman-detail-user');
    
    
    
    //angsuran user
    Route::get('/angsuran',[UserAngsuranController::class,'index'])
    ->name('angsuran-user');
    
    Route::get('/angsuran/create-one',[UserAngsuranController::class,'createOne'])
    ->name('angsuran-createOne-user');
    
    Route::post('/angsuran/create-one',[UserAngsuranController::class,'createOnePost'])
    ->name('angsuran-createOnePost-user');
    
    Route::get('/angsuran/create-find-loan',[UserAngsuranController::class,'createFindLoan'])
    ->name('angsuran-createFindLoan-user');
    
    Route::post('/angsuran/create-find-loan',[UserAngsuranController::class,'createFindLoanPost'])
    ->name('angsuran-createFindLoanPost-user');
    
    Route::get('/angsuran/create-find',[UserAngsuranController::class,'createTwo'])
    ->name('angsuran-createTwo-user');
    
    Route::post('/angsuran/create-find',[UserAngsuranController::class,'createTwoPost'])
    ->name('angsuran-createTwoPost-user');
    
    Route::get('/angsuran/create-calculate',[UserAngsuranController::class,'createThree'])
    ->name('angsuran-createThree-user');
    
    Route::post('/angsuran/create-calculate',[UserAngsuranController::class,'createThreePost'])
    ->name('angsuran-createThreePost-user');
    
    Route::get('/angsuran/create-total',[UserAngsuranController::class,'createTotal'])
    ->name('angsuran-createTotal-user');
    
    Route::post('/angsuran/create-total',[UserAngsuranController::class,'createTotalPost'])
    ->name('angsuran-createTotalPost-user');
    
    Route::get('/angsuran/{angsuran}',[UserAngsuranController::class,'detail'])
    ->name('angsuran-user-detail');
    
    
    
    //data diri user
    Route::get('/ubahdatadiri',[UserDataDiriController::class,'indexDataDiriUser'])
    ->name('ubahdatadiri-user');
    
    Route::get('/ubahdatadiri-edit',[UserDataDiriController::class,'editDataDiriUser'])
    ->name('ubahdatadiri-user-edit');
    
    Route::put('/ubahdatadiri-update',[UserDataDiriController::class,'updateDataDiriUser'])
    ->name('ubahdatadiri-user-update');
    
    Route::get('/ubahdatadiri-changepassword',[UserDataDiriController::class,'editChangePasswordUser'])
    ->name('ubahdatadiri-user-editchangepassword');
    
    Route::post('/ubahdatadiri-changepassword',[UserDataDiriController::class,'updateChangePasswordUser'])
    ->name('ubahdatadiri-user-updatechangepassword');
    
}); 


Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function()  {
        Route::get('/',[DashboardController::class,'index'])
        ->name('admin-dashboard');


        Route::get('/simpanan',[SimpananController::class,'index_simpanan'])
        ->name('simpanan-index');

        Route::get('/simpanan/laporan',[SimpananController::class,'indexLaporanSimpanan'])
        ->name('simpanan-laporan');
        
        Route::get('/simpanan/create-find',[SimpananController::class,'createFind'])
        ->name('simpanan-create-find');

        Route::post('/simpanan/create-find',[SimpananController::class,'createFindPost'])
        ->name('simpanan-create-find-post');
        
        Route::get('/simpanan/create-type',[SimpananController::class,'createType'])
        ->name('simpanan-create-type');

        Route::post('/simpanan/create-type',[SimpananController::class,'createTypePost'])
        ->name('simpanan-create-type-post');

        Route::get('/simpanan/{simpanan}',[SimpananController::class,'show'])
        ->name('simpanan-detail');

        Route::get('/simpanan/{simpanan}/edit',[SimpananController::class,'edit'])
        ->name('simpanan-edit');

        Route::put('/simpanan/{simpanan}',[SimpananController::class,'update'])
        ->name('simpanan-update');

        Route::delete('/simpanan/{simpanan}',[SimpananController::class,'destroy'])
        ->name('simpanan-destroy');

        
        Route::get('/simpanan/laporan/cetaksemua',[SimpananController::class,'cetakSemuaLaporan'])
        ->name('simpanan-cetak-semua');

        Route::get('/simpanan/laporan/carinama',[SimpananController::class,'cariNamaLaporan'])
        ->name('simpanan-cari-nama-laporan');

        Route::post('/simpanan/laporan/cetakpernama',[SimpananController::class,'cetakLaporanPernama'])
        ->name('simpanan-cetak-laporan-pernama');

        Route::get('/simpanan/laporan/totalsimpananpernama',[SimpananController::class, 'cetakTotalSimpananPernama'])
        ->name('simpanan-cetak-total-pernama');



        Route::get('/pinjaman',[PinjamanController::class,'index'])
        ->name('pinjaman-index');

        Route::get('/pinjaman/laporan',[PinjamanController::class,'indexLaporanPinjaman'])
        ->name('pinjaman-laporan-index');

        Route::get('/pinjaman/laporan/carinama',[PinjamanController::class,'laporanCariNama'])
        ->name('pinjaman-pernama-laporan');

        Route::get('/pinjaman/laporan/cetaksemua',[PinjamanController::class,'cetakSemuaLaporan'])
        ->name('pinjaman-cetaksemua');

        Route::get('/pinjaman/laporan/totalpinjamanpernama',[PinjamanController::class,'cetakTotalPinjamanPernama'])
        ->name('pinjaman-totalpinjamanpernama');

        Route::post('/pinjaman/laporan/cetakpernama',[PinjamanController::class,'cetakLaporanPerNama'])
        ->name('pinjaman-cetakpernama');

        Route::get('/pinjaman/create-one',[PinjamanController::class,'createOne'])
        ->name('pinjaman-createOne');

        Route::post('/pinjaman/create-one',[PinjamanController::class,'createOnePost'])
        ->name('pinjaman-createOnePost');

        Route::get('/pinjaman/create-calculate',[PinjamanController::class,'createTwo'])
        ->name('pinjaman-createTwo');

        Route::post('/pinjaman/create-calculate',[PinjamanController::class,'createTwoPost'])
        ->name('pinjaman-createTwoPost');

        Route::get('/pinjaman/{pinjaman}',[PinjamanController::class,'detail'])
        ->name('pinjaman-detail');

        Route::get('/pinjaman/{pinjaman}/edit',[PinjamanController::class,'edit'])
        ->name('pinjaman-edit');

        Route::put('/pinjaman/{pinjaman}',[PinjamanController::class,'update'])
        ->name('pinjaman-update');

        Route::delete('/pinjaman/{pinjaman}',[PinjamanController::class,'destroy'])
        ->name('pinjaman-destroy');





        Route::get('/angsuran',[AngsuranController::class,'index'])
        ->name('angsuran-index');

        Route::get('/angsuran/laporan',[AngsuranController::class,'indexLaporanAngsuran'])
        ->name('angsuran-laporan-index');

        Route::get('/angsuran/laporan/cetaksemua',[AngsuranController::class,'cetakSemuaLaporanAngsuran'])
        ->name('angsuran-cetak-semualaporan');


        Route::get('/angsuran/laporan/totalangsuranpernama',[AngsuranController::class,'cetakTotalAngsuranPernama'])
        ->name('angsuran-totalangsuranpernama');

        Route::get('/angsuran/laporan/carinama',[AngsuranController::class,'laporanCariNama'])
        ->name('angsuran-laporan-carinama');

        Route::post('/angsuran/laporan/pernama',[AngsuranController::class,'cetakPernamaLaporanAngsuran'])
        ->name('angsuran-cetak-pernama');

        Route::get('/angsuran/create-one',[AngsuranController::class,'createOne'])
        ->name('angsuran-createOne');

        Route::post('/angsuran/create-one',[AngsuranController::class,'createOnePost'])
        ->name('angsuran-createOnePost');

        Route::get('/angsuran/create-find-loan',[AngsuranController::class,'createTypeLoan'])
        ->name('angsuran-create-findLoan');

        Route::post('/angsuran/create-find-loan',[AngsuranController::class,'createTypeLoanpost'])
        ->name('angsuran-create-findLoan-Post');

        Route::get('/angsuran/create-find',[AngsuranController::class,'createTwo'])
        ->name('angsuran-createTwo');

        Route::post('/angsuran/create-find',[AngsuranController::class,'createTwoPost'])
        ->name('angsuran-createTwoPost');

        Route::get('/angsuran/create-calculate',[AngsuranController::class,'createThree'])
        ->name('angsuran-createThree');

        Route::post('/angsuran/create-calculate',[AngsuranController::class,'createThreePost'])
        ->name('angsuran-createThreePost');

        Route::get('/angsuran/{angsuran}',[AngsuranController::class,'show'])
        ->name('angsuran-detail');

        Route::get('/angsuran/{angsuran}/edit',[AngsuranController::class,'edit'])
        ->name('angsuran-edit');

        Route::put('/angsuran/{angsuran}',[AngsuranController::class,'update'])
        ->name('angsuran-update');

        Route::delete('/angsuran/{angsuran}',[AngsuranController::class,'destroy'])
        ->name('angsuran-destroy');


        Route::get('/datadiri',[UserController::class,'index'])
        ->name('ubahdatadiri-index');

        Route::get('/datadiri-edit',[UserController::class,'edit'])
        ->name('ubahdatadiri-edit');

        Route::put('/datadiri-update',[UserController::class,'update'])
        ->name('ubahdatadiri-update');

        Route::get('/datadiri-changepassword',[UserController::class,'editPassword'])
        ->name('ubahdatadiri-editpassword');

        Route::post('/datadiri-changepassword',[UserController::class,'changePassword'])
        ->name('ubahdatadiri-changepassword');


        Route::resource('usermanages',UserManagesController::class);
    

    });



