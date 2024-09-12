<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
});

// Quản lý sách
Route::get('sach/index', function () {
    return view('admin.sach.index');
})->name('sach.index');

Route::get('sach/add', function () {
    return view('admin.sach.add');
})->name('sach.add');

Route::get('sach/detail', function () {
    return view('admin.sach.detail');
})->name('sach.detail');

Route::get('sach/edit', function () {
    return view('admin.sach.edit');
})->name('sach.edit');

// Quản lý thể loại
Route::get('the-loai/index', function () {
    return view('admin.the-loai.index');
})->name('the-loai.index');

Route::get('the-loai/detail', function () {
    return view('admin.the-loai.detail');
})->name('the-loai.detail');

Route::get('the-loai/edit', function () {
    return view('admin.the-loai.edit');
})->name('the-loai.edit');

// Quản lý bài viết
Route::get('bai-viet/index', function () {
    return view('admin.bai-viet.index');
})->name('bai-viet.index');

Route::get('bai-viet/add', function () {
    return view('admin.bai-viet.add');
})->name('bai-viet.add');

Route::get('bai-viet/detail', function () {
    return view('admin.bai-viet.detail');
})->name('bai-viet.detail');

Route::get('bai-viet/edit', function () {
    return view('admin.bai-viet.edit');
})->name('bai-viet.edit');

// Quản lý thể loại
Route::get('danh-muc-bai-viet/index', function () {
    return view('admin.danh-muc-bai-viet.index');
})->name('danh-muc-bai-viet.index');

Route::get('danh-muc-bai-viet/detail', function () {
    return view('admin.danh-muc-bai-viet.detail');
})->name('danh-muc-bai-viet.detail');

Route::get('danh-muc-bai-viet/edit', function () {
    return view('admin.danh-muc-bai-viet.edit');
})->name('danh-muc-bai-viet.edit');

// QUản lý đơn hàng

Route::get('don-hang/index', function () {
    return view('admin.don-hang.index');
})->name('don-hang.index');
Route::get('don-hang/detail', function () {
    return view('admin.don-hang.detail');
});

// Liên hệ

Route::get('lien-he/index', function () {
    return view('admin.lien-he.index');
})->name('lien-he.index');

// Thống kê

Route::get('thong-ke/index', function () {
    return view('admin.thong-ke.index');
})->name('thong-ke.index');

// Mẫu email

Route::get('email/index', function () {
    return view('admin.mau-gui-email.index');
})->name('email.index');

// Quản lý tài khoaản

Route::get('tai-khoan/index', function () {
    return view('admin.tai-khoan.index');
})->name('tai-khoan.index');
