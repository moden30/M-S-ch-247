<?php

namespace App\Http\Controllers\Auth\Client;

use App\Http\Controllers\Controller;
use App\Mail\SendNewPassword;
use App\Models\VaiTro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('client.auth.loginregister');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'min:4|required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->trang_thai === 'khoa') {
                Auth::logout();
                return response()->json([
                    'err' => 'Tài khoản của bạn đã bị khoá',
                    'status' => 'fail'
                ]);
            }

            return response()->json([
                'status' => 'success',
            ]);
        }

        return response()->json([
            'err' => 'Tài khoản hoặc mật khẩu không đúng.',
            'status' => 'fail'
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'ten_doc_gia' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        DB::table('vai_tro_tai_khoans')->insert([
           'user_id' => $user->id,
           'vai_tro_id' => VaiTro::CUSTOMER_ROLE_ID,
        ]);

        return response()->json(['success' => 'Đăng ký tài khoản thành công !, bạn có thể đăng nhập.'], 200);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('cli.auth.showLoginForm');
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            $faker = Faker::create();
            $newPassword = $faker->lexify('?????');
            $user->password = Hash::make($newPassword);
            $user->save();
            Mail::to($request->email)->send(new SendNewPassword($user, $newPassword));
            return response()->json(['status' => 'ok']);
        } else return response()->json([
            'status' => 'not found',
        ]);
    }
}
