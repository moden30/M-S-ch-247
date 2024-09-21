<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChuyenMucController extends Controller
{
    public $chuyen_muc;
    public function __construct(ChuyenMuc $chuyen_muc){
        $this->chuyen_muc = $chuyen_muc;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $chuyen_mucs = ChuyenMuc::where('trang_thai', $status)->with('chuyenMucCha')->get();
        } else {
            $chuyen_mucs = ChuyenMuc::with('chuyenMucCha')->get();
        }
        return view('admin.danh-muc-bai-viet.index', compact('chuyen_mucs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.danh-muc-bai-viet.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten_chuyen_muc' => 'required|string|max:255|unique:chuyen_mucs,ten_chuyen_muc',
            'chuyen_muc_cha_id' => 'nullable|exists:chuyen_mucs,id',
            'trang_thai' => 'nullable',
        ], [
            'ten_chuyen_muc.unique' => 'Tên chuyên mục đã tồn tại.',
            'ten_chuyen_muc.required' => 'Tên chuyên mục là bắt buộc.',
        ]);

        ChuyenMuc::create([
            'ten_chuyen_muc' => $request->ten_chuyen_muc,
            'chuyen_muc_cha_id' => $request->chuyen_muc_cha_id,
            'trang_thai' => $request->has('trang_thai') ? 'hien' : 'an',
        ]);

        return redirect()->route('chuyen-muc.index')->with('success', 'Thêm chuyên mục thành công!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $chuyen_mucs = ChuyenMuc::find($id);
        $parentCategories = ChuyenMuc::whereNull('chuyen_muc_cha_id')->get();
        return view('admin.danh-muc-bai-viet.detail', compact('chuyen_mucs', 'parentCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chuyen_mucs = ChuyenMuc::find($id);
        $parentCategories = ChuyenMuc::whereNull('chuyen_muc_cha_id')->get();
        return view('admin.danh-muc-bai-viet.edit', compact('chuyen_mucs', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $chuyenmuc = $this->chuyen_muc->find($id);
        $request->validate([
            'ten_chuyen_muc' => [
                'required',
                'string',
                'max:255',
                Rule::unique('chuyen_mucs', 'ten_chuyen_muc')->ignore($chuyenmuc->id),
            ],
            'chuyen_muc_cha_id' => 'nullable|exists:chuyen_mucs,id',
            'trang_thai' => [
                'nullable',
                'in:an,hien',
            ],
        ], [
            'ten_chuyen_muc.unique' => 'Tên chuyên mục đã tồn tại.',
            'ten_chuyen_muc.required' => 'Tên chuyên mục là bắt buộc.',
            'trang_thai.in' => 'Trạng thái không hợp lệ.',
        ]);
        $chuyenmuc->update([
            'ten_chuyen_muc' => $request->input('ten_chuyen_muc'),
            'chuyen_muc_cha_id' => $request->input('chuyen_muc_cha_id'),
            'trang_thai' => $request->input('trang_thai'),
        ]);
        return redirect()->route('chuyen-muc.index')->with('success', 'Chuyên mục đã được cập nhật thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chuyenmuc = $this->chuyen_muc->find($id);
        if(!$chuyenmuc){
            return redirect()->route('chuyen-muc.index');
        }
        $chuyenmuc->delete();
        return redirect()->route('chuyen-muc.index');
    }

    public function capNhatTrangThai(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $validStatuses = ['an', 'hien'];

        if (!in_array($newStatus, $validStatuses)) {
            return response()->json([
                'success' => false,
                'message' => 'Trạng thái không hợp lệ'
            ], 400);
        }
        $contact = ChuyenMuc::find($id);

        if ($contact) {
            $contact->trang_thai = $newStatus;
            $contact->save();

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái thành công'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy thể loại'
        ], 404);
    }

}
