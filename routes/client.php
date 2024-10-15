<?php

use App\Http\Controllers\Client\TrangCaNhanController;
use App\Http\Controllers\Client\TrangChuController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TrangChuController::class, 'index']);

Route::get('trang-chu', function () {
    return view('client.index');
})->name('trang-chu');

Route::get('chi-tiet', function () {
    return view('client.pages.chi-tiet-sach');
})->name('chi-tiet');;
Route::get('doc-sach', function () {
    return view('client.pages.doc-sach');
});
// Route::get('trang-ca-nhan', function () {
//     return view('client.pages.trang-ca-nhan');
// })->name('trang-ca-nhan');
Route::get('/trang-ca-nhan', [TrangCaNhanController::class, 'index'])
->name('trang-ca-nhan');
Route::put('/trang-ca-nhan/{id}', [TrangCaNhanController::class, 'update'])
->name('trang-ca-nhan.update'); 


// Thể loại
Route::get('the-loai', [\App\Http\Controllers\Client\TheLoaiController::class, 'index'])->name('the-loai');
Route::get('danh-sach-sach', [\App\Http\Controllers\Client\TheLoaiController::class, 'danhSachTheLoai'])->name('danh-sach-sach');

Route::get('tim-kiem', function () {
    return view('client.pages.tim-kiem-nang-cao');
})->name('tim-kiem');

Route::get('hoi-dap', function () {
    return view('client.pages.hoi-dap');
})->name('hoi-dap');
