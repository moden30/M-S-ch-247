<?php

use App\Http\Controllers\Admin\DonHangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/don-hang/dang-xu-ly/{userId}', [DonHangController::class, 'getDonHangDangXuLy']);

Route::put('/don-hang/huy-don/{id}', [DonHangController::class, 'huyDonHang']);

Route::get('/rut-tien/{id}', [\App\Http\Controllers\Admin\CongTacVienController::class, 'chiTietYeuCau']);

Route::put('/rut-tien/huy-yeu-cau/{id}', [\App\Http\Controllers\Admin\CongTacVienController::class, 'huyYeuCauRut'])->name('huyYeuCauRutTien');


