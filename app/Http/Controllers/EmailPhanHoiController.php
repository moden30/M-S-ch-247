<?php

namespace App\Http\Controllers;

use App\Mail\EmailPhanHoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailPhanHoiController extends Controller
{
        public function emailPhanHoi(Request $request)
        {
            $request->validate([
                'tieu_de' => 'required|string|max:255',
                'noi_dung' => 'required|string',
                'customer_email' => 'required|email',
                'anh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $anh = null;
            if ($request->hasFile('anh')) {
                $anh = $request->file('anh')->store('public/images');
            }

            $data = [
                'tieu_de' => $request->input('tieu_de'),
                'noi_dung' => $request->input('noi_dung'),
                'anh' => storage_path('app/' . $anh),
            ];

            Mail::to($request->input('customer_email'))
                ->send(new EmailPhanHoi($data));

            return redirect()->back()->with('success', 'Email đã được gửi thành công!');
        }

}
