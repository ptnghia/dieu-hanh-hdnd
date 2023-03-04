<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChucvuController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\GiamsatController;
use App\Http\Controllers\GiamsatLichtrinhController;
use App\Http\Controllers\GiamsatThamgiaController;
use App\Http\Controllers\GiamsatThanhvienController;
use App\Http\Controllers\KhieunaiController;
use App\Http\Controllers\KyhopController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ThanhvienController;
use App\Http\Controllers\ThumoiController;
use App\Http\Controllers\VanbanController;
use App\Http\Controllers\YkienController;
use App\Models\Giamsat;

//use App\Models\Vanban;

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

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //

    //thông tin cá nhân
    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('/', [App\Http\Controllers\Profiletroller::class, 'index'])->name('index');
        Route::post('/', [App\Http\Controllers\Profiletroller::class, 'UpdateData'])->name('update');
        Route::post('/update-password', [App\Http\Controllers\Profiletroller::class, 'UpdatePassword'])->name('updatePassword');
    });

    Route::resource('chuc-vu', ChucvuController::class);

    //Trang thành viên
    Route::resource('thanh-vien', ThanhvienController::class);
    Route::post('thanh-vien/tim-kiem', [ThanhvienController::class, 'search'])->name('thanh-vien.search'); //Tìm kiếm cho trang thành viên

    //Trang văn bản
    Route::resource('van-ban', VanbanController::class);
    Route::post('van-ban/tim-kiem', [VanbanController::class, 'search'])->name('van-ban.search'); //Tìm kiếm cho trang văn bản

    //Quản lý kỳ họp
    Route::resource('ky-hop', KyhopController::class);
    Route::post('ky-hop/tim-kiem', [KyhopController::class, 'search'])->name('ky-hop.search');
    Route::prefix('ky-hop')->name('thu-moi.')->group(function () {
        Route::get('/{id}/thu-moi', [ThumoiController::class, 'index'])->name('index');
        Route::post('/{id}/thu-moi', [ThumoiController::class, 'store'])->name('store');
        Route::put('/{id}/thu-moi', [ThumoiController::class, 'update'])->name('update');
        Route::post('/{id}/thanh-vien', [ThumoiController::class, 'add_thanhvien'])->name('thanhvien');
    });
    Route::get('/thu-moi', [ThumoiController::class, 'show'])->name('thumoinhan');
    

    //Giám sát
    Route::resource('giam-sat', GiamsatController::class);
    Route::prefix('giam-sat')->name('giam-sat.thanh-vien.')->group(function () {
        Route::get('/{id}/thanh-vien', [GiamsatThanhvienController::class, 'index'])->name('index');
        Route::post('/{id}/thanh-vien', [GiamsatThanhvienController::class, 'store'])->name('store');
    });
    Route::prefix('giam-sat')->name('giam-sat.lich-trinh.')->group(function () {
        Route::get('/{id}/lich-trinh', [GiamsatLichtrinhController::class, 'index'])->name('index');
        Route::post('/{id}/lich-trinh', [GiamsatLichtrinhController::class, 'store'])->name('store');
        Route::get('/{id}/lich-trinh/{id_lichtrinh}/edit', [GiamsatLichtrinhController::class, 'edit'])->name('edit');
        Route::put('/{id}/lich-trinh/{id_lichtrinh}', [GiamsatLichtrinhController::class, 'update'])->name('update');
        Route::delete('/{id}/lich-trinh/{id_lichtrinh}', [GiamsatLichtrinhController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('tham-gia-giam-sat')->name('thamgiagiamsat.')->group(function () {
        Route::get('/', [GiamsatThamgiaController::class, 'index_thamgia'])->name('index');
        Route::get('/lich-su', [GiamsatThamgiaController::class, 'lichsu_thamgia'])->name('lichsu');
        Route::get('/{id}/noi-dung', [GiamsatThamgiaController::class, 'noidung_giamsat'])->name('noidung');
    });
    


    //Khiếu nại tố cáo
    Route::resource('khieu-nai', KhieunaiController::class);
    Route::prefix('khieu-nai')->name('khieu-nai.tra-loi.')->group(function () {
        Route::get('/chua-tra-loi/{id_trangthai}', [KhieunaiController::class, 'chuatraloi'])->name('chuatraloi');
        Route::get('/trang-thai/{id_trangthai}', [KhieunaiController::class, 'datraloi'])->name('datraloi');
        Route::get('/{id}/tra-loi', [KhieunaiController::class, 'traloi'])->name('traloi');
        Route::post('/{id}/tra-loi', [KhieunaiController::class, 'update_traloi'])->name('update_traloi');
    });
    Route::get('/khieu-nai-theo-doi', [KhieunaiController::class, 'theodoi'])->name('khieunaitheodoi');

    //ý kiến cử tri
    Route::resource('y-kien-cu-tri', YkienController::class);
    Route::prefix('y-kien-cu-tri')->name('y-kien-cu-tri.tra-loi.')->group(function () {
        Route::get('/chua-tra-loi/{id_trangthai}', [YkienController::class, 'chuatraloi'])->name('chuatraloi');
        Route::get('/trang-thai/{id_trangthai}', [YkienController::class, 'datraloi'])->name('datraloi');
        Route::get('/{id}/tra-loi', [YkienController::class, 'traloi'])->name('traloi');
        Route::post('/{id}/tra-loi', [YkienController::class, 'update_traloi'])->name('update_traloi');
    });
    Route::get('/y-kien-cu-tri-theo-doi', [YkienController::class, 'theodoi'])->name('ykientheodoi');

    Route::post('ajax', [AjaxController::class, 'index'])->name('ajax');
});

Route::middleware(['isAdamin'])->group(function () {
    Route::get('/admin', function () {
        return 'Welcome Super Admin';
    });
});
