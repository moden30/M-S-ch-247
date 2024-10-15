<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TrangCaNhanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('client.pages.trang-ca-nhan', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $data = $request->validate([
            'ten_doc_gia' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'so_dien_thoai' => 'nullable|string|max:15',
            'dia_chi' => 'nullable|string|max:255',
            'sinh_nhat' => 'nullable|string|max:255',
            'hinh_anh' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'gioi_tinh' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('hinh_anh')) {
            if ($user->hinh_anh && Storage::disk('public')->exists($user->hinh_anh)) {
                Storage::disk('public')->delete($user->hinh_anh); 
            }
            $filePath = $request->file('hinh_anh')->store('uploads/avatar-user', 'public'); 
        } else {
            $filePath = $user->hinh_anh; 
        }
        
        $data['hinh_anh'] = $filePath; 
        
        try {
            $user->update($data);
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
