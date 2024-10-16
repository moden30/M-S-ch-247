<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\LienHe;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ten_khach_hang' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'chu_de' => 'required|string|max:255',
            'noi_dung' => 'required',
            'anh' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Xử lý upload ảnh nếu có
        $filePath = null;
        if ($request->hasFile('anh')) {
            // Lưu ảnh mới vào thư mục 'uploads/avatar-user' trong disk 'public'
            $filePath = $request->file('anh')->store('uploads/anh_lien_he', 'public');
        }

        // Cập nhật đường dẫn ảnh vào dữ liệu
        $data['anh'] = $filePath;





        // Lưu dữ liệu vào bảng lien_hes
        LienHe::create([
            'user_id' => auth()->id(), // Lấy ID người dùng hiện tại
            'ten_khach_hang' => $validatedData['ten_khach_hang'],
            'email' => $validatedData['email'],
            'chu_de' => $validatedData['chu_de'],
            'noi_dung' => $validatedData['noi_dung'],
            'anh' => $filePath,
            'trang_thai' => 'mo', // trạng thái mặc định khi tạo mới
        ]);

        // Gửi thông báo thành công
        return redirect()->back()->with('success', 'Liên hệ của bạn đã được gửi thành công.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
