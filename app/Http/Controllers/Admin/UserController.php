<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VaiTro;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.user.index', [
            'users' => User::with('vai_tros')->get(),
            'vai_tros' => VaiTro::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate dữ liệu từ form
        $data = $request->validate([
            'ten_doc_gia' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'so_dien_thoai' => 'nullable|string|max:15',
            'dia_chi' => 'nullable|string|max:255',
            'mat_khau' => 'required|string|min:5',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vai_tro' => 'required|exists:vai_tros,id',
        ]);

        // Xử lý upload ảnh đại diện
        if ($request->hasFile('avatar')) {
            // Lưu ảnh vào thư mục uploads trong storage/public
            $avatarPath = $request->file('avatar')->store('uploads/avatar-user', 'public');
            $data['avatar'] = $avatarPath;
        }

        // Mã hóa mật khẩu
        $data['mat_khau'] = bcrypt($request->mat_khau);
        // Tạo người dùng mới
        try {
            $user = User::query()->create($data);
            $user->vai_tros()->attach($request->vai_tro);
            return redirect()->route('users.index')->with('success', 'Người dùng mới đã được thêm thành công.');
        } catch (\Exception $exception) {
            throw new \Error('Exception: ' . $exception->getMessage());
        }

        // Redirect về trang danh sách người dùng với thông báo thành công

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('vai_tros')->findOrFail($id);
        $data = [
            'id' => $user->id,
            'ten_doc_gia' => $user->ten_doc_gia,
            'email' => $user->email,
            'gioi_tinh' => $user->gioi_tinh,
            'so_dien_thoai' => $user->so_dien_thoai,
            'dia_chi' => $user->dia_chi,
            'vai_tro' => $user->vai_tros->pluck('id'),
        ];

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        dd($request->all());
        $user = User::with('vai_tros')->findOrFail($id);
        $data = $request->validate([
            'vai_tro' => 'required|exists:vai_tros,id',
        ]);
        try {
            $user->vai_tros()->sync([$data['vai_tro']]);
            $user->save();
            return redirect()->route('users.index')->with('success', 'Người dùng đã được sửa thành công.');
        } catch (\Exception $exception) {
            throw new \Error('Exception: ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
