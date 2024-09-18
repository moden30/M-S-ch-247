<?php

use App\Http\Controllers\EmailPhanHoiController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\TheLoaiController;
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
Route::get('/admin/login', function () {
    return view('admin.auth.dang-nhap');
})->name('admin.login');

Route::prefix('admin')->middleware(['auth'])->group(function () {


//    Route::get('/register', function () {
//        return view('admin.auth.dang-ky');
//    })->name('admin.register');

//    Route::get('/logout', function () {
//        return view('admin.auth.quen-mat-khau');
//    })->name('auth.quen-mat-khau');
});

// Quản lý sách

Route::resource('sach', \App\Http\Controllers\SachController::class);
Route::resource('the-loai', \App\Http\Controllers\TheLoaiController::class);
// route thêm chương vào sách
Route::get('sach/{sach}/chuong/create', [\App\Http\Controllers\ChuongController::class, 'createChuong'])->name('chuong.create');
Route::post('sach/{sach}/chuong', [\App\Http\Controllers\ChuongController::class, 'storeChuong'])->name('chuong.store');
Route::get('sach/{sach}/chuong/{chuong}/edit', [\App\Http\Controllers\ChuongController::class, 'editChuong'])->name('chuong.edit');
Route::put('sach/{sach}/chuong/{chuong}', [\App\Http\Controllers\ChuongController::class, 'updateChuong'])->name('chuong.update');
Route::delete('sach/{sach}/chuong/{chuong}', [\App\Http\Controllers\ChuongController::class, 'destroyChuong'])->name('chuong.destroy');
Route::get('sach/{sach}/chuong/{chuong}/show', [\App\Http\Controllers\ChuongController::class, 'showChuong'])->name('chuong.show');



//Route::get('sach/add', function () {
//    return view('admin.sach.add');
//})->name('sach.add');

//Route::get('sach1/detail', function () {
//    return view('admin.sach.detail');
//})->name('sach1.detail');
//
//Route::get('sach1/edit', function () {
//    return view('admin.sach.edit');
//})->name('sach1.edit');


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

// Quản lý thể loại bài viết
Route::get('danh-muc-bai-viet/index', function () {
    return view('admin.danh-muc-bai-viet.index');
})->name('danh-muc-bai-viet.index');

Route::get('danh-muc-bai-viet/detail', function () {
    return view('admin.danh-muc-bai-viet.detail');
})->name('danh-muc-bai-viet.detail');

Route::get('danh-muc-bai-viet/edit', function () {
    return view('admin.danh-muc-bai-viet.edit');
})->name('danh-muc-bai-viet.edit');


// Quản lý banner

Route::resource('banner', BannerController::class);

Route::get('banner/{id}', [BannerController::class, 'show'])
    ->name('banner.detail');
Route::post('/banner/{id}/update-status', [BannerController::class, 'updateStatus'])
    ->name('banner.update-status');

// Quản lý khuyến mại
Route::get('khuyen-mai/index', function () {
    return view('admin.khuyen-mai.index');
})->name('khuyen-mai.index');

Route::get('khuyen-mai/detail', function () {
    return view('admin.khuyen-mai.detail');
})->name('khuyen-mai.detail');

Route::get('khuyen-mai/edit', function () {
    return view('admin.khuyen-mai.edit');
})->name('khuyen-mai.edit');


// Quản lý bình luận
Route::get('binh-luan/index', [BinhLuanController::class, 'index'])
    ->name('binh-luan.index');

Route::get('binh-luan/{id}', [BinhLuanController::class, 'show'])
    ->name('binh-luan.detail');
Route::post('/binh-luan/{id}/update-status', [BinhLuanController::class, 'updateStatus'])
    ->name('binh-luan.update-status');

// Quản lý đánh giá
Route::get('danh-gia/index', function () {
    return view('admin.danh-gia.index');
})->name('danh-gia.index');

Route::get('danh-gia/detail', function () {
    return view('admin.danh-gia.detail');
})->name('danh-gia.detail');


// QUản lý đơn hàng

Route::get('don-hang/index', function () {
    return view('admin.don-hang.index');
})->name('don-hang.index');
Route::get('don-hang/detail', function () {
    return view('admin.don-hang.detail');
});

// Liên hệ
Route::resource('lien-he', LienHeController::class);
// Sử lý chuyển đổi trạng thái
Route::post('/lien-he/{id}/update-status', [LienHeController::class, 'updateStatus']);

// Sử lý gửi email
Route::get('/lien-he/{id}/form', [LienHeController::class, 'phanHoiForm'])->name('lienhe.form');
Route::post('/email/phanhoi', [EmailPhanHoiController::class, 'emailPhanHoi'])->name('email.phanHoi');

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

// Xác thực

Route::get('auth/dang-nhap', function () {
    return view('admin.auth.dang-nhap');
})->name('auth.dang-nhap');

Route::get('auth/dang-ky', function () {
    return view('admin.auth.dang-ky');
})->name('auth.dang-ky');

Route::get('auth/quen-mat-khau', function () {
    return view('admin.auth.quen-mat-khau');
})->name('auth.quen-mat-khau');
