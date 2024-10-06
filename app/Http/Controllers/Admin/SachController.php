<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sach\SuaSachRequest;
use App\Http\Requests\Sach\ThemSachRequest;
use App\Models\Chuong;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SachController extends Controller
{
    public $sach;

    public function __construct(Sach $sach)
    {
        $this->sach = $sach;

        // Quyền truy cập view (index, show)
        $this->middleware('permission:sach-index')->only(['index', 'show']);

        // Quyền tạo (create, store)
        $this->middleware('permission:sach-store')->only(['create', 'store']);

        // Quyền chỉnh sửa (edit, update)
        $this->middleware('permission:sach-update')->only(['edit', 'update']);

        // Quyền xóa (destroy)
        $this->middleware('permission:sach-destroy')->only('destroy');

        $this->middleware('permission:sach-anHien')->only('anHien');
        $this->middleware('permission:sach-capNhat')->only('capNhat');
        $this->middleware('permission:sach-kiemDuyet')->only('kiemDuyet');

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user =auth()->user();
        $saches = Sach::with('theLoai');
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        // Lọc theo chuyên mục
        $theLoais = TheLoai::all();
        if ($request->has('the_loai_id') && !empty($request->the_loai_id)) {
            $saches->where('the_loai_id', $request->the_loai_id);
        }
        // Lọc theo khoảng ngày
        if ($request->has('from_date') && $request->has('to_date')) {
            $saches->whereBetween('ngay_dang', [$request->from_date, $request->to_date]);
        }
        // nếu là cộng tác viên tức i id vai trò = 4 thì chỉ hện sách của mình
        if ($user->vai_tros->contains('id', 4)) {
            $saches = $saches->where('user_id', $user->id);
        } else {
            $saches = $saches->where('kiem_duyet', '!=', 'ban_nhap');
        }

        $saches = $saches->get();

        return view('admin.sach.index', compact('theLoais', 'saches', 'trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat', 'mau_trang_thai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $noi_dung_nguoi_lon = Chuong::NOI_DUNG_NGUOI_LON;
        $theLoais = TheLoai::query()->get();
        return view('admin.sach.add', compact('theLoais', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat', 'noi_dung_nguoi_lon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThemSachRequest $request)
    {
        if ($request->isMethod('post')) {
            $param = $request->all();
            $param['ngay_dang'] = now();
            $param['user_id'] = auth()->id();
            // Thêm ảnh bìa
            if ($request->hasFile('anh_bia_sach')) {
                $filePath = $request->file('anh_bia_sach')->store('uploads/sach', 'public');
            } else {
                $filePath = null;
            }
            $param['anh_bia_sach'] = $filePath;
            //Thêm với 2 trạng thái cho_xac_nhan và ban_nhap

            $statusBtn = $request->input('action') === 'ban_nhap' ? 'ban_nhap' : 'cho_xac_nhan';
            $param['kiem_duyet'] = $statusBtn;
            // khuyến mãi < giá gốc
            $giaGoc = $request->input('gia_goc');
            $giaKhuyenMai = $request->input('gia_khuyen_mai');

            if ($giaKhuyenMai >= $giaGoc) {
                return back()->withErrors(['gia_khuyen_mai' => 'Giá khuyến mãi phải nhỏ hơn giá gốc.'])->withInput();
            }
            $sach = Sach::query()->create($param);
            // Thêm chương đầu tiên
            //lấy id
            $sachID = $sach->id;

            $sach->chuongs()->create([
                'so_chuong' => $request->input('so_chuong'),
                'tieu_de' => $request->input('tieu_de'),
                'noi_dung' => $request->input('noi_dung'),
                'ngay_len_song' => now(),
                'noi_dung_nguoi_lon' => $request->input('noi_dung_nguoi_lon'),
                'trang_thai' => $request->input('trang_thai_chuong'),
                'sach_id' => $sachID,
            ]);
            return redirect()->route('sach.index')->with('success', 'Thêm thành công!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $theLoais = TheLoai::query()->get();
        $sach = Sach::query()->findOrFail($id);
        $chuongs = Chuong::with('sach')
            ->where('sach_id', $id)
            ->get();
        return view('admin.sach.detail', compact('sach', 'theLoais', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat', 'chuongs'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $theLoais = TheLoai::query()->get();
        $sach = Sach::query()->findOrFail($id);
        return view('admin.sach.edit', compact('sach', 'theLoais', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuaSachRequest $request, string $id)
    {
        if ($request->isMethod('put')) {
            $param = $request->except('_token', '_method');
            $sach = Sach::query()->findOrFail($id);
            if ($request->hasFile('anh_bia_sach')) {
                if ($sach->anh_bia_sach && Storage::disk('public')->exists($sach->anh_bia_sach)) {
                    Storage::disk('public')->delete($sach->anh_bia_sach);
                }
                $filePath = $request->file('anh_bia_sach')->store('uploads/sach', 'public');
            } else {
                $filePath = $sach->anh_bia_sach;
            }
            $param['anh_bia_sach'] = $filePath;
            // khuyến mãi < giá gốc
            $giaGoc = $request->input('gia_goc');
            $giaKhuyenMai = $request->input('gia_khuyen_mai');
            if ($giaKhuyenMai >= $giaGoc) {
                return back()->withErrors(['gia_khuyen_mai' => 'Giá khuyến mãi phải nhỏ hơn giá gốc.'])->withInput();
            }
            $sach->update($param);
            return redirect()->route('sach.index')->with('success', 'Sửa thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sach = Sach::query()->findOrFail($id);
        if ($sach->anh_bia_sach && Storage::disk('public')->exists($sach->anh_bia_sach)) {
            Storage::disk('public')->delete($sach->anh_bia_sach);
        }
        $sach->delete();
        $sach->chuongs()->delete();

        return redirect()->route('sach.index')->with('success', 'Xóa thành công');
    }

    // Trạng thái
    public function anHien(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $validStatuses = ['an', 'hien'];
        if (!in_array($newStatus, $validStatuses)) {
            return response()->json([
                'success' => false,
                'message' => 'Trạng thái không hợp lệ'
            ], 400);
        }
        $contact = Sach::find($id);

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

    // Tình trạng cập nhật
    public function capNhat(Request $request, $id)
    {
        $capNhat = Sach::find($id);
        if ($capNhat) {
            // Chuyển đổi trạng thái
            $newStatus = $capNhat->tinh_trang_cap_nhat === 'da_full' ? 'tiep_tuc_cap_nhat' : 'da_full';
            $capNhat->tinh_trang_cap_nhat = $newStatus;
            $capNhat->save();

            return response()->json([
                'thanh_cong' => true,
                'trangThai' => Sach::TINH_TRANG_CAP_NHAT[$newStatus],
            ]);
        }
        return response()->json(['thanh_cong' => false], 404);
    }

    // Tình tran kiểm duyệt
    public function kiemDuyet(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $contact = Sach::find($id);
        if ($contact) {
            $currentStatus = $contact->kiem_duyet;
            if (
                // Khi ở trạng thai từ chôi sẽ không thể chuyển về Chờ xác nhận
                ($currentStatus == 'tu_choi' && $newStatus == 'cho_xac_nhan') ||
                // Khi ở trạng thái từ chôí sẽ không chuyển về trạng thái 'duyệt'
                ($currentStatus == 'tu_choi' && $newStatus == 'duyet') ||
                // Khi ở trạng thái 'duyệt' sẽ không chuyển về trạng thái 'từ chối'
                ($currentStatus == 'duyet' && $newStatus == 'tu_choi') ||
                // Khi ở trạng thái 'duyệt' sẽ không chuyển về trạng thái 'chờ xác nhận'
                ($currentStatus == 'duyet' && $newStatus == 'cho_xac_nhan')
            ) {
                return response()->json(['success' => false, 'message' => 'Không thể chuyển trạng thái này.'], 403);
            }
            $contact->kiem_duyet = $newStatus;
            $contact->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

}
