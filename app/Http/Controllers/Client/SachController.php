<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\Chuong;
use App\Models\DanhGia;
use App\Models\DonHang;
use App\Models\Sach;
use App\Models\TheLoai;
use App\Models\UserSach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $query = Sach::with('theLoai')->where('trang_thai', 'hien')->where('kiem_duyet', 'duyet')->whereHas('theLoai', function ($q) {
            $q->where('trang_thai', 'hien');
        });

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

        $data = $query->paginate(12);

        // Định dạng dữ liệu trước khi trả về
        $formattedData = $data->getCollection()->map(function ($item) {
            $gia_sach = $item->gia_khuyen_mai ?
                number_format($item->gia_khuyen_mai, 0, ',', '.') :
                number_format($item->gia_goc, 0, ',', '.');

            return [
                'id' => $item->id,
                'ten_sach' => $item->ten_sach,
                'anh_bia_sach' => Storage::url($item->anh_bia_sach),
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

    public function chiTietSach(string $id, Request $request)
    {
        $sach = Sach::with('theLoai', 'danh_gias', 'chuongs', 'user')->where('id', $id)->first();

        $sachCungTheLoai = $sach->where('the_loai_id', $sach->the_loai_id)->where('trang_thai', 'hien')->where('id', '!=', $sach->id)->where('kiem_duyet', 'duyet')->get();
        $gia_sach = $sach->gia_khuyen_mai ?
            number_format($sach->gia_khuyen_mai, 0, ',', '.') :
            number_format($sach->gia_goc, 0, ',', '.');
        $chuongMoi = $sach->chuongs()->where('trang_thai', 'hien')->where('kiem_duyet', 'duyet')->orderBy('created_at', 'desc')->take(3)->get();

        $userId = auth()->id();

        $userReview = $sach->danh_gias()->where('user_id', $userId)->first();

        $daMuaSach = DonHang::where('user_id', $userId)
            ->where('sach_id', $sach->id)
            ->exists();

        $tongSoChuong = $sach->chuongs->count();

        $soChuongDaDoc = UserSach::query()->where('user_id', $userId)
            ->where('sach_id', $sach->id)->pluck('so_chuong_da_doc')->first();

        $yeuCauDocSach = ceil($tongSoChuong / 3);

        $duocDanhGia =  $soChuongDaDoc >= $yeuCauDocSach;

        if ($userId && $userReview) {
            if ($userReview->muc_do_hai_long == 'rat_hay') {
                $soSao = 5;
            } elseif ($userReview->muc_do_hai_long == 'hay') {
                $soSao = 4;
            } elseif ($userReview->muc_do_hai_long == 'trung_binh') {
                $soSao = 3;
            } elseif ($userReview->muc_do_hai_long == 'te') {
                $soSao = 2;
            } elseif ($userReview->muc_do_hai_long == 'rat_te') {
                $soSao = 1;
            }
        } else {
            $soSao = null;
        }
        // Lấy tất cả các đánh giá của sách
        $listDanhGia = DanhGia::with('sach', 'user')->where('sach_id', $sach->id)->where('trang_thai', 'hien')->latest('id')->get();

        $soLuongDanhGia = $listDanhGia->count();
        $limit = 3;
        $page = $request->input('page', 1);

        $danhGia = DanhGia::with('user')->where('trang_thai', 'hien')
            ->where('sach_id', $request->input('sach_id'))
            ->orderBy('ngay_danh_gia', 'desc')->latest('id')
            ->paginate($limit, ['*'], 'page', $page);


        $trungBinhHaiLong = $sach->danh_gias()->where('trang_thai', 'hien')
            ->whereHas('sach', function ($query) {
                $query->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', 'hien');
            })
            ->selectRaw('AVG(CASE
                        WHEN muc_do_hai_long = "rat_hay" THEN 5
                        WHEN muc_do_hai_long = "hay" THEN 4
                        WHEN muc_do_hai_long = "trung_binh" THEN 3
                        WHEN muc_do_hai_long = "te" THEN 2
                        WHEN muc_do_hai_long = "rat_te" THEN 1
                    END) as average_rating')
            ->value('average_rating');

        if ($trungBinhHaiLong) {
            $trungBinhHaiLong = round($trungBinhHaiLong, 1);
        } else {
            $trungBinhHaiLong = null;
        }
        $chuongDauTien = $sach->chuongs->first();

        return view('client.pages.chi-tiet-sach', compact(
            'sach',
            'chuongMoi',
            'gia_sach',
            'sachCungTheLoai',
            'soLuongDanhGia',
            'trungBinhHaiLong',
            'listDanhGia',
            'userReview',
            'soSao',
            'chuongDauTien',
            'daMuaSach',
            'duocDanhGia',
            'tongSoChuong',
            'yeuCauDocSach'
        ));
    }


    public function dataChuong(string $id)
    {
        $chuongs = Chuong::with('sach')
            ->where('sach_id', $id)->where('trang_thai', 'hien')->where('kiem_duyet', 'duyet')->paginate(10);
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
        $request->validate([
            'sach_id' => 'required|exists:saches,id',
            'user_id' => 'required|exists:users,id',
            'rating_value' => 'required|numeric|min:1|max:5',
            'noi_dung' => 'required|string',
        ]);

        $userId = $request->input('user_id');
        $sachId = $request->input('sach_id');

        $daMuaSach = DonHang::where('user_id', $userId)
            ->where('sach_id', $sachId)
            ->exists();

        if (!$daMuaSach) {
            return response()->json([
                'message' => 'Bạn phải mua sách này trước khi có thể đánh giá.',
            ], 403);
        }

        $ratingValue = $request->input('rating_value');

        $danhGia = DanhGia::create([
            'sach_id' => $sachId,
            'user_id' => $userId,
            'noi_dung' => $request->input('noi_dung'),
            'ngay_danh_gia' => now(),
            'muc_do_hai_long' => $this->getMucDoHaiLong($ratingValue),
            'trang_thai' => 'hien',
        ]);

        $danhGia->load('user');
        $filePath = 'public/' . $danhGia->user->hinh_anh;

        if ($danhGia->user->hinh_anh && Storage::exists($filePath)) {
            $danhGia->user->hinh_anh_url = Storage::url($danhGia->user->hinh_anh);
        } else {
            $danhGia->user->hinh_anh_url = asset('assets/admin/images/users/user-dummy-img.jpg');
        }

        return response()->json([
            'message' => 'Đánh giá đã được thêm thành công.',
            'data' => [
                'danhGia' => $danhGia,
                'rating_value' => $ratingValue,
            ]
        ]);
    }

    private function getMucDoHaiLong($ratingValue)
    {
        switch ($ratingValue) {
            case 5:
                return 'rat_hay';
            case 4:
                return 'hay';
            case 3:
                return 'trung_binh';
            case 2:
                return 'te';
            case 1:
                return 'rat_te';
        }
    }

    public function getDanhGia(Request $request)
    {
        $limit = 3;
        $page = $request->input('page', 1);

        $danhGia = DanhGia::with('user')->where('trang_thai', 'hien')
            ->where('sach_id', $request->input('sach_id'))
            ->orderBy('ngay_danh_gia', 'desc')->latest('id')
            ->paginate($limit, ['*'], 'page', $page);


        $danhGia->getCollection()->transform(function ($item) {
            $filePath = 'public/' . $item->user->hinh_anh;
            if ($item->user->hinh_anh && Storage::exists($filePath)) {
                $item->user->hinh_anh_url = Storage::url($item->user->hinh_anh);
            } else {
                $item->user->hinh_anh_url = asset('assets/admin/images/users/user-dummy-img.jpg');
            }
            return $item;
        });

        return response()->json($danhGia);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sach_id' => 'required|exists:saches,id',
            'user_id' => 'required|exists:users,id',
            'rating_value' => 'required|numeric|min:1|max:5',
            'noi_dung' => 'required|string',
        ]);

        $danhGia = DanhGia::find($id);

        if ($danhGia) {
            $danhGia->update([
                'noi_dung' => $request->noi_dung,
                'muc_do_hai_long' =>  $this->getMucDoHaiLong($request->input('rating_value')),
            ]);
        }

        return response()->json(['message' => 'Đánh giá đã được cập nhật thành công.', 'data' => $danhGia]);
    }
}
