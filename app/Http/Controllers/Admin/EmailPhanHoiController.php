<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EmailPhanHoi;
use App\Models\LienHe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailPhanHoiController extends Controller
{
        public function emailPhanHoi(Request $request)
        {
            $request->validate([
                'tieu_de' => 'required|string',
                'noi_dung' => 'required|string',
                'customer_email' => 'required|email',
                'anh.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $files = $request->file('anh');
            $filePaths = [];

            if ($files) {
                foreach ($files as $file) {
                    if ($file) {
                        $filePath = $file->store('public/images');
                        $filePaths[] = storage_path('app/' . $filePath);
                    }
                }
            }

            $lienHe = LienHe::where('email', $request->input('customer_email'))->first();

            $data = [
                'ten_khach_hang' => $lienHe ? $lienHe->ten_khach_hang : 'Khách hàng',
                'created_at' => $lienHe ? $lienHe->created_at : 'Ngày/Tháng/Năm',
                'tieu_de' => $request->input('tieu_de'),
                'noi_dung' => $request->input('noi_dung'),
                'anh' => $filePaths,
            ];

            Mail::to($request->input('customer_email'))
                ->send(new EmailPhanHoi($data));

            return redirect()->route('lien-he.index')->with('success', 'Email đã được gửi thành công!');
        }


}
