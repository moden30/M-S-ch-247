<?php

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
Route::get('trang-ca-nhan', function () {
    return view('client.pages.trang-ca-nhan');
})->name('trang-ca-nhan');

Route::get('the-loai', function () {
    return view('client.pages.the-loai');
})->name('the-loai');

Route::get('tim-kiem', function () {
    return view('client.pages.tim-kiem-nang-cao');
})->name('tim-kiem');

Route::get('hoi-dap', function () {
    return view('client.pages.hoi-dap');
})->name('hoi-dap');
