<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TheLoaiController extends Controller
{
    public function index()
    {
        $theloais = TheLoai::all();
        return view('admin.the-loai.index', compact('theloais'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_the_loai' => 'required|string|max:255',
            'anh_the_loai' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mo_ta' => 'nullable|string|max:1000',
            'trang_thai' => 'required|in:hien,an',
        ]);

        $imagePath = null;
        if ($request->hasFile('anh_the_loai')) {
            $imagePath = $request->file('anh_the_loai')->store('theloai', 'public');
        }

        TheLoai::create([
            'ten_the_loai' => $request->ten_the_loai,
            'anh_the_loai' => $imagePath,
            'mo_ta' => $request->mo_ta,
            'trang_thai' => $request->trang_thai,
        ]);

        return redirect()->route('the-loai.index')->with('success', 'Thêm mới thể loại thành công.');
    }

    public function show($id)
    {
        $theLoai = TheLoai::find($id);

        if (!$theLoai) {
            abort(404, 'Not found');
        }
        return view('admin.the-loai.detail', compact('theLoai'));
    }

    public function edit(TheLoai $theLoai)
    {
        return view('admin.the-loai.edit', compact('theLoai'));
    }

    public function update(Request $request, TheLoai $theLoai)
    {
        $request->validate([
            'ten_the_loai' => 'required|string|max:255',
            'anh_the_loai' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'mo_ta' => 'nullable|string',
            'trang_thai' => 'required|in:an,hien',
        ]);

        if ($request->hasFile('anh_the_loai')) {
            if ($theLoai->anh_the_loai && Storage::disk('public')->exists($theLoai->anh_the_loai)) {
                Storage::disk('public')->delete($theLoai->anh_the_loai);
            }

            $imagePath = $request->file('anh_the_loai')->store('theloai', 'public');
            $theLoai->anh_the_loai = $imagePath;
        }

        $theLoai->ten_the_loai = $request->ten_the_loai;
        $theLoai->mo_ta = $request->mo_ta;
        $theLoai->trang_thai = $request->trang_thai;
        $theLoai->save();

        return redirect()->route('the-loai.index')->with('success', 'Cập nhật Thể Loại thành công.');
    }

    public function destroy(TheLoai $theLoai)
    {
        if ($theLoai->anh_the_loai && Storage::disk('public')->exists($theLoai->anh_the_loai)) {
            Storage::disk('public')->delete($theLoai->anh_the_loai);
        }

        $theLoai->delete();

        return response()->json(['success' => true]);
    }

    public function updateStatus(Request $request, $id)
    {
        $theLoai = TheLoai::findOrFail($id);

        $theLoai->trang_thai = $request->trang_thai;
        $theLoai->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Trạng thái đã được cập nhật.'
        ]);
    }
}
