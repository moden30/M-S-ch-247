<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaiViet\SuaBaiVietRequest;
use App\Http\Requests\BaiViet\ThemBaiVietRequest;
use App\Models\BaiViet;
use App\Models\ChuyenMuc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Quyền truy cập view (index, show)
        $this->middleware('permission:bai-viet-index')->only(['index', 'show']);

        // Quyền tạo (create, store)
        $this->middleware('permission:bai-viet-store')->only(['create', 'store']);

        // Quyền chỉnh sửa (edit, update)
        $this->middleware('permission:bai-viet-update')->only(['edit', 'update']);

        // Quyền xóa (destroy)
        $this->middleware('permission:bai-viet-destroy')->only('destroy');

        $this->middleware('permission:bai-viet-capNhatTrangThai')->only('capNhatTrangThai');
    }

    public function index(request $request)
    {
        $mau_trang_thai = BaiViet::MAU_TRANG_THAI;
        $trang_thai = BaiViet::TRANG_THAI;
        $baiviets = BaiViet::with('chuyenMuc', 'tacGia');
        $chuyenMucs = ChuyenMuc::all();
        $tacGias = User::all();
        // Lọc theo chuyên mục
        if ($request->has('chuyen_muc_id')) {
            $baiviets->where('chuyen_muc_id', $request->chuyen_muc_id);
        }
        // Lọc theo tác giả
        if ($request->has('user_id')) {
            $baiviets->where('user_id', $request->user_id);
        }
        // Lọc theo khoảng ngày
        if ($request->has('from_date') && $request->has('to_date')) {
            $baiviets->whereBetween('ngay_dang', [$request->from_date, $request->to_date]);
        }

        $baiviets = $baiviets->get();


        return view('admin.bai-viet.index', compact('baiviets', 'mau_trang_thai', 'trang_thai', 'chuyenMucs', 'tacGias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trang_thai = BaiViet::TRANG_THAI;
        $mau_trang_thai = BaiViet::MAU_TRANG_THAI;
        $chuyenMucs = ChuyenMuc::query()->get();
        return view('admin.bai-viet.add', compact('chuyenMucs', 'mau_trang_thai', 'trang_thai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThemBaiVietRequest $request)
    {
        if ($request->isMethod('post')) {
            $param = $request->all();
            if ($request->hasFile('hinh_anh')) {
                $filePath = $request->file('hinh_anh')->store('uploads/bai-viet', 'public');
            } else {
                $filePath = null;
            }
            $param['hinh_anh'] = $filePath;
            $param['ngay_dang'] = now();
            $param['user_id'] = auth()->id();

            BaiViet::query()->create($param);
            return redirect()->route('bai-viet.index')->with('success', 'Thêm thành công!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trang_thai = BaiViet::TRANG_THAI;
        $mau_trang_thai = BaiViet::MAU_TRANG_THAI;
        $chuyenMucs = ChuyenMuc::query()->get();
        $baiViet = BaiViet::with(['binhLuans.user'])->findOrFail($id);
        return view('admin.bai-viet.detail', compact('chuyenMucs', 'mau_trang_thai', 'trang_thai', 'baiViet'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trang_thai = BaiViet::TRANG_THAI;
        $mau_trang_thai = BaiViet::MAU_TRANG_THAI;
        $chuyenMucs = ChuyenMuc::query()->get();
        $baiViet = BaiViet::query()->findOrFail($id);
        return view('admin.bai-viet.edit', compact('chuyenMucs', 'mau_trang_thai', 'trang_thai', 'baiViet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuaBaiVietRequest $request, string $id)
    {
        if ($request->isMethod('put')) {
            $param = $request->except('_token', '_method', 'ngay_dang');

            $baiViet = BaiViet::query()->findOrFail($id);

            if ($request->hasFile('hinh_anh')) {
                if ($baiViet->hinh_anh && Storage::disk('public')->exists($baiViet->hinh_anh)) {
                    Storage::disk('public')->delete($baiViet->hinh_anh);
                }
                $filePath = $request->file('hinh_anh')->store('uploads/bai-viet', 'public');
            } else {
                $filePath = $baiViet->hinh_anh;
            }

            $param['hinh_anh'] = $filePath;

            $param['ngay_dang'] = now();

            $baiViet->update($param);

            return redirect()->route('bai-viet.index')->with('success', 'Sửa thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
//    public function destroy(string $id)
//    {
//        $baiViet = BaiViet::query()->findOrFail($id);
//        if ($baiViet->hinh_anh && Storage::disk('public')->exists($baiViet->hinh_anh)) {
//            Storage::disk('public')->delete($baiViet->hinh_anh);
//        }
//        $baiViet->delete();
//        return redirect()->route('bai-viet.index');
//    }
    public function destroy(string $id)
    {
        $baiViet = BaiViet::findOrFail($id);
        if ($baiViet->hinh_anh && Storage::disk('public')->exists($baiViet->hinh_anh)) {
            Storage::disk('public')->delete($baiViet->hinh_anh);
        }
        $noidung = $baiViet->noi_dung;
        $this->xoaNoiDung($noidung);

        // Xóa bài viết
        $baiViet->delete();

        return redirect()->route('bai-viet.index');
    }

    // Xóa ảnh CKEditor
    private function xoaNoiDung($noidung)
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $noidung, $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $imgUrl) {
                $path = str_replace(asset(''), '', $imgUrl);
                if (file_exists(public_path($path))) {
                    unlink(public_path($path));
                }
            }
        }
    }

    // Trạng thái
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
        $contact = BaiViet::find($id);

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
