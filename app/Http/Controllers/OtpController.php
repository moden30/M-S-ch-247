<?php

namespace App\Http\Controllers;

use App\Jobs\SendRawEmailJob;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OtpController extends Controller
{
    public function send(Request $request)
    {
        $user = auth()->user();

        // Kiểm tra xem người dùng có đăng nhập hay không
        if (!$user) {
            return response()->json(['error' => 'Người dùng chưa đăng nhập.'], 401);
        }

        // Tạo mã OTP ngẫu nhiên
        $otp = rand(100000, 999999);

        // Xác định thời gian hết hạn của OTP (ví dụ: 5 phút từ lúc tạo)
        $expiresAt = now()->addMinutes(5); // Thời gian hết hạn OTP

        // Lưu OTP và thời gian hết hạn vào session
        Session::put('otp', $otp);
        Session::put('otp_expires_at', $expiresAt);

        // Gửi OTP qua email
        SendRawEmailJob::dispatch($user->email, 'Mã OTP', 'Mã OTP của bạn là: ' . $otp . ' - thời hạn 5 phút');

        return response()->json(['success' => true]);
    }

    public function verify(Request $request)
    {
        $user = auth()->user();

        // Kiểm tra xem người dùng có đăng nhập hay không
        if (!$user) {
            return response()->json(['error' => 'Người dùng chưa đăng nhập.'], 401);
        }

        // Lấy OTP người dùng nhập vào
        $otp = $request->input('otp');

        // Lấy OTP và thời gian hết hạn từ session
        $sessionOtp = Session::get('otp');
        $expiresAt = Session::get('otp_expires_at');

        // Kiểm tra xem OTP có tồn tại, khớp với OTP nhập vào và chưa hết hạn không
        if (!$sessionOtp || !$expiresAt || $sessionOtp != $otp || now()->gt($expiresAt)) {
            // Nếu OTP không hợp lệ, không tồn tại, hoặc đã hết hạn
            return response()->json(['error' => 'OTP không hợp lệ hoặc đã hết hạn.'], 400);
        }

        // Xóa OTP và thời gian hết hạn khỏi session sau khi xác thực thành công
        Session::forget('otp');
        Session::forget('otp_expires_at');

        return response()->json(['success' => 'Xác thực OTP thành công!']);
    }

    public function removeOtp(Request $request)
    {
        // Xóa OTP khỏi session khi người dùng đóng modal
        Session::forget('otp');
        Session::forget('otp_expires_at');

        return response()->json(['success' => true, 'message' => 'OTP đã bị xóa']);
    }




}
