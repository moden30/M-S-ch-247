<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
        // Bắt đầu truy vấn cơ sở dữ liệu với điều kiện kiểm duyệt
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
            $query->where('tinh_trang', $request->input('tinh_trang_cap_nhat'));
        }

        // Thực hiện phân trang và lấy dữ liệu
        $data = $query->paginate(20);

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

        // Trả về dữ liệu dưới dạng JSON
        return response()->json([
            'current_page' => $data->currentPage(),
            'data' => $formattedData,
            'last_page' => $data->lastPage(),
            'total' => $data->total(),
        ]);
    }


}
