<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\Chuong;
use App\Models\DanhGia;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theloais = TheLoai::all();
        return view('client.pages.tim-kiem-nang-cao', compact('theloais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dataSach(Request $request)
    {
        $query = Sach::with('theLoai')->where('kiem_duyet', 'duyet');

        // Lọc theo tên sách
        if ($request->filled('title')) {
            $query->where('ten_sach', 'like', '%' . $request->input('title') . '%');
        }

        // Lọc theo thể loại
        if ($request->has('the_loai')) {
            $query->whereIn('the_loai_id', $request->input('the_loai'));
        }

        // Lọc theo tình trạng cập nhật
        if ($request->filled('tinh_trang_cap_nhat') && $request->input('tinh_trang_cap_nhat') != 'all') {
            $query->where('tinh_trang_cap_nhat', $request->input('tinh_trang_cap_nhat'));
        }

        // Lọc theo nội dung người lớn
        if ($request->filled('noi_dung_nguoi_lon') && $request->input('noi_dung_nguoi_lon') != 'all') {
            $query->where('noi_dung_nguoi_lon', $request->input('noi_dung_nguoi_lon'));
        }

        // Lọc theo thời gian
        if ($request->filled('ngay_dang') && $request->input('ngay_dang') != 'all') {
            if ($request->input('ngay_dang') == 'new') {
                $query->orderBy('ngay_dang', 'desc');
            } else {
                $query->orderBy('ngay_dang', 'asc');
            }
        }

        $data = $query->paginate(10);

        // Định dạng dữ liệu trước khi trả về
        $formattedData = $data->getCollection()->map(function ($item) {
            $gia_sach = $item->gia_khuyen_mai ?
                number_format($item->gia_khuyen_mai, 0, ',', '.') :
                number_format($item->gia_goc, 0, ',', '.');

            return [
                'id' => $item->id,
                'ten_sach' => $item->ten_sach,
                'anh_bia_sach' => $item->anh_bia_sach,
                'tac_gia' => $item->tac_gia,
                'tom_tat' => $item->tom_tat,
                'theloai' => $item->theLoai->ten_the_loai,
                'gia_sach' => $gia_sach,
                'format_ngay_cap_nhat' => date('d/m/Y', strtotime($item->updated_at)),
            ];
        });

        return response()->json([
            'current_page' => $data->currentPage(),
            'data' => $formattedData,
            'last_page' => $data->lastPage(),
            'total' => $data->total(),
            'per_page' => $data->perPage(),
        ]);
    }

    public function chiTietSach(string $id)
    {
        $sach = Sach::with('theLoai', 'danh_gias', 'chuongs', 'user')->where('id', $id)->first();
        $sachCungTheLoai = $sach->where('the_loai_id', $sach->the_loai_id)->get();
        $gia_sach = $sach->gia_khuyen_mai ?
            number_format($sach->gia_khuyen_mai, 0, ',', '.') :
            number_format($sach->gia_goc, 0, ',', '.');
        $chuongMoi = $sach->chuongs()->orderBy('created_at', 'desc')->take(3)->get();

        // Lấy tất cả các đánh giá của sách
        $listDanhGia = DanhGia::with('sach', 'user')->where('sach_id', $sach->id)->where('trang_thai', 'hien')->get();

        $soLuongDanhGia = $listDanhGia->count();

        $trungBinhHaiLong = $sach->danh_gias()
            ->selectRaw('AVG(CASE
                        WHEN muc_do_hai_long = "rat_hay" THEN 5
                        WHEN muc_do_hai_long = "hay" THEN 4
                        WHEN muc_do_hai_long = "trung_binh" THEN 3
                        WHEN muc_do_hai_long = "te" THEN 2
                        WHEN muc_do_hai_long = "rat_te" THEN 1
                    END) as average_rating')
            ->value('average_rating');

        if ($trungBinhHaiLong) {
            $trungBinhHaiLong = round($trungBinhHaiLong, 2);
        } else {
            $trungBinhHaiLong = null;
        }

        return view('client.pages.chi-tiet-sach', compact('sach', 'chuongMoi', 'gia_sach', 'sachCungTheLoai', 'soLuongDanhGia', 'trungBinhHaiLong', 'listDanhGia'));
    }

    public function dataChuong(string $id)
    {
        $chuongs = Chuong::with('sach')
            ->where('sach_id', $id)->paginate(10);
        return response()->json([
            'current_page' => $chuongs->currentPage(),
            'data' => $chuongs->items(),
            'last_page' => $chuongs->lastPage(),
            'total' => $chuongs->total(),
            'per_page' => $chuongs->perPage(),
        ]);
    }

    public function store(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'noi_dung' => 'required|max:255',
            'sach_id' => 'required|exists:saches,id', // Đảm bảo ID sách tồn tại
        ]);

        // Lưu bình luận vào database
        $binhLuan = new BinhLuan();
        $binhLuan->noi_dung = $request->noi_dung;
        $binhLuan->user_id = auth()->id(); // Lấy ID người dùng hiện tại
        $binhLuan->sach_id = $request->sach_id; // ID sách từ form
        $binhLuan->save();

        // Trả về phản hồi JSON cho AJAX
        return response()->json([
            'message' => 'Bình luận đã được thêm thành công!',
            'binhLuan' => $binhLuan
        ]);
    }
}
