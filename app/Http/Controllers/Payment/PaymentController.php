<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Sach;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index($id)
    {
        $sach = Sach::with('user')->findOrFail($id);
        if ($sach->trang_thai !== 'hien' || $sach->kiem_duyet !== 'duyet' || $sach->user->trang_thai !== 'hoat_dong') {
            abort(404);
        }
        return view('client.pages.thanh-toan')->with('sach', $sach);
    }
}
