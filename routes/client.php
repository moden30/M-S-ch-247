<?php

use App\Http\Controllers\Client\TrangChuController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TrangChuController::class, 'index'])->name('home');

Route::get('trang-chu', function () {
    return view('client.index');
})->name('trang-chu');

Route::get('chi-tiet', function () {
    return view('client.pages.chi-tiet-sach');
})->name('chi-tiet');;
Route::get('doc-sach', function () {
    return view('client.pages.doc-sach');
});
Route::get('trang-ca-nhan', function () {
    return view('client.pages.trang-ca-nhan');
})->name('trang-ca-nhan');

// Thể loại
Route::get('the-loai/{id}', [\App\Http\Controllers\Client\TheLoaiController::class, 'index'])->name('the-loai');

Route::get('tim-kiem', function () {
    return view('client.pages.tim-kiem-nang-cao');
})->name('tim-kiem');

Route::get('hoi-dap', function () {
    return view('client.pages.hoi-dap');
})->name('hoi-dap');

// Bài Viết
Route::get('bai-viet/{id}', [\App\Http\Controllers\Client\BaiVietController::class, 'index'])->name('bai-viet');
Route::get('chi-tiet-bai-viet', function () {
    return view('client.pages.chi-tiet-bai-viet');
});
