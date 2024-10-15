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
Route::get('the-loai', [\App\Http\Controllers\Client\TheLoaiController::class, 'index'])->name('the-loai');
Route::get('danh-sach-sach', [\App\Http\Controllers\Client\TheLoaiController::class, 'danhSachTheLoai'])->name('danh-sach-sach');

Route::get('tim-kiem', function () {
    return view('client.pages.tim-kiem-nang-cao');
})->name('tim-kiem');

Route::get('hoi-dap', function () {
    return view('client.pages.hoi-dap');
})->name('hoi-dap');

Route::get('xep-hang-tac-gia', function () {
    return view('client.pages.xep-hang-tac-gia');
})->name('xep-hang-tac-gia');

Route::get('chi-tiet-tac-gia', function () {
    return view('client.pages.chi-tiet-tac-gia');
})->name('chi-tiet-tac-gia');





Route::get('bai-viet', function () {
    return view('client.pages.bai-viet');
});Route::get('chi-tiet-bai-viet', function () {
    return view('client.pages.chi-tiet-bai-viet');
});

Route::get('dang-nhap', function () {
    return view('client.auth.loginregister');
})->name('dang-nhap');

Route::get('thanh-toan', function () {
    return view('client.pages.thanh-toan');
})->name('thanh-toan');

Route::get('thong-bao-chung', function () {
    return view('client.pages.thong-bao-chung');
})->name('thong-bao-chung');

Route::get('chi-tiet-thong-bao', function () {
    return view('client.pages.chi-tiet-thong-bao');
})->name('chi-tiet-thong-bao');




