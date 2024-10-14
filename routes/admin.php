<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', [\App\Http\Controllers\Admin\ThongKeDoanhThuController::class, 'index'])->name('admin');
