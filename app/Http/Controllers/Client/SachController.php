<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BanSaoSach;
use App\Models\BinhLuan;
use App\Models\Chuong;
use App\Models\DanhGia;
use App\Models\DonHang;
use App\Models\PhanHoiDanhGia;
use App\Models\Sach;
use App\Models\TheLoai;
use App\Models\ThongBao;
use App\Models\User;
use App\Models\UserSach;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $query = Sach::with('theLoai', 'DonHang')->where('trang_thai', 'hien')->where('kiem_duyet', 'duyet')->whereHas('theLoai', function ($q) {
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

        $data = $query->paginate(32);

        // Định dạng dữ liệu trước khi trả về
        $formattedData = $data->getCollection()->map(function ($item) {
            $user = Auth::user();
            $da_mua = '';
            if (Auth::check()) {
                $checkVaiTro = $user->hasRole(1) || $user->hasRole(3) || ($user->hasRole(4) && $item->user_id == $user->id);
                $mua_sach = $item->DonHang
                    ->where('sach_id', $item->id)
                    ->where('user_id', Auth::user()->id)
                    ->where('trang_thai', 'thanh_cong')
                    ->isNotEmpty();
                if ($checkVaiTro) {
                    $da_mua = 'Đã Sở Hữu';
                } elseif ($mua_sach) {
                    $da_mua = 'Đã Mua';
                }
            }
            $gia_goc = $item->gia_goc > 0 ? number_format($item->gia_goc, 0, ',', '.') . ' VNĐ' : 'Miễn phí';
            $gia_khuyen_mai = $item->gia_khuyen_mai > 0 ? number_format($item->gia_khuyen_mai, 0, ',', '.') . ' VNĐ' : null;

            return [
                'id' => $item->id,
                'user_id' => $item->user_id,
                'ten_sach' => $item->ten_sach,
                'anh_bia_sach' => Storage::url($item->anh_bia_sach),
                'tom_tat' => $item->tom_tat,
                'theloai' => $item->theLoai->ten_the_loai,
                'gia_goc' => $gia_goc,
                'gia_khuyen_mai' => $gia_khuyen_mai,
                'da_mua' => $da_mua,
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
        $sach = Sach::with('theLoai', 'danh_gias', 'chuongs', 'user')->where('id', $id)->withTrashed()->first();
        $sachCungTheLoai = $sach->withTrashed()->where('the_loai_id', $sach->the_loai_id)->where('trang_thai', 'hien')->where('id', '!=', $sach->id)->where('kiem_duyet', 'duyet')
            ->limit(6)->get();
        $chuongMoi = $sach->chuongs()->where('trang_thai', 'hien')->where('kiem_duyet', 'duyet')->orderBy('created_at', 'desc')->take(3)->get();
        $chuongDauTien = $sach->chuongs->where('kiem_duyet', 'duyet')->where('trang_thai', 'hien')->first();
        if ($sach->kiem_duyet != 'duyet') {
            $sach = BanSaoSach::with('theLoai', 'danh_gias', 'chuongs', 'user')->where('sach_id', $id)->orderBy('so_phien_ban', 'desc')->first();
            $sachCungTheLoai = Sach::where('the_loai_id', $sach->the_loai_id)->where('trang_thai', 'hien')->where('id', '!=', $id)->where('kiem_duyet', 'duyet')->limit(6)->get();
            $chuongMoi = Chuong::where('sach_id', $id)->orderBy('created_at', 'desc')->take(3)->get();
            $chuongDauTien = Chuong::where('sach_id', $id)->first();
        }

        $gia_goc = number_format($sach->gia_goc, 0, ',', '.');
        $gia_khuyen_mai = number_format($sach->gia_khuyen_mai, 0, ',', '.');

        $userId = auth()->id();

        $userReview = $sach->danh_gias()->where('user_id', $userId)->first();

        $daMuaSach = DonHang::where('user_id', $userId)
            ->where('sach_id', $sach->id)
            ->exists();

        $tongSoChuong = $sach->chuongs->count();

        if (auth()->id() === $sach->user_id) {
            $duocPhanHoi = true;
        } else {
            $duocPhanHoi = false;
        }

        $soChuongDaDoc = UserSach::query()->where('user_id', $userId)
            ->where('sach_id', $sach->id)->pluck('so_chuong_da_doc')->first();

        $yeuCauDocSach = ceil($tongSoChuong / 3);

        $duocDanhGia = $soChuongDaDoc >= $yeuCauDocSach;

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

        $authorId = $sach->user_id;

        $listDanhGia = DanhGia::with('sach', 'user', 'phanHoiDanhGia')->where('sach_id', $sach->id)->where('trang_thai', 'hien')->latest('id')->get();

        $listDanhGia->transform(function ($danhGia) use ($authorId) {

            $hasResponseFromAuthor = $danhGia->phanHoiDanhGia->contains(function ($phanHoi) use ($authorId) {
                return $phanHoi->user_id == $authorId;
            });

            $danhGia->has_author_response = $hasResponseFromAuthor;

            return $danhGia;
        });

        $soLuongDanhGia = $listDanhGia->count();
        $limit = 5;
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



        $soChuongDaDoc = UserSach::query()->where('user_id', $userId)
            ->where('sach_id', $sach->id)->pluck('so_chuong_da_doc')->first();

        $yeuCauDocSach = ceil($tongSoChuong / 3);

        $duocDanhGia = $soChuongDaDoc >= $yeuCauDocSach;

        //Kiểm tra đã mua sách chưa
        $user = auth()->user();
        $userId = auth()->id();
        $hasPurchased = '';
        if (Auth::check()) {
            $checkVaiTro = $user->hasRole(1) || $user->hasRole(3) || ($user->hasRole(4) && $sach->user_id == $user->id);
            $hasPurchased = $checkVaiTro || DonHang::where('user_id', $userId)->where('sach_id', $id)->where('trang_thai', 'thanh_cong')->exists();
        }

        if ($hasPurchased) {
            $sachCungTheLoai = Sach::where('the_loai_id', $sach->the_loai_id)->where('trang_thai', 'hien')->where('id', '!=', $id)->where('kiem_duyet', 'duyet')->limit(6)->get();
            $chuongMoi = Chuong::where('sach_id', $id)->orderBy('created_at', 'desc')->take(3)->get();
            $chuongDauTien = Chuong::where('sach_id', $id)->first();
        }

        if ($hasPurchased) {

            $soChuongDaDoc = UserSach::query()->where('user_id', $userId)
                ->where('sach_id', $sach->id)
                ->pluck('so_chuong_da_doc')->first();
            $yeuCauDocSach = ceil($tongSoChuong / 3);

            $duocDanhGia = $soChuongDaDoc >= $yeuCauDocSach;
        } else {
            $duocDanhGia = false;
        }

        $yeuThich = YeuThich::where('user_id', $userId)
            ->where('sach_id', $id)
            ->first();

        return view('client.pages.chi-tiet-sach', compact(
            'sach',
            'chuongMoi',
            'gia_goc',
            'gia_khuyen_mai',
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
            'yeuCauDocSach',
            'hasPurchased',
            'duocPhanHoi',
            'yeuThich',
            'id'
        ));
    }


    public function dataChuong(string $id)
    {
        $user = auth()->user();
        $userId = $user ? $user->id : null; // Kiểm tra xem người dùng đã đăng nhập hay chưa
        $hasPurchased = '';

        if (Auth::check()) {
            $checkVaiTro = $user->hasRole(1) || $user->hasRole(3) ||
                ($user->hasRole(4) && Sach::where('id', $id)->where('user_id', $userId)->exists());

            $hasPurchased = $checkVaiTro || DonHang::where('user_id', $userId)
                ->where('sach_id', $id)
                ->where('trang_thai', 'thanh_cong')
                ->exists();
        }

        $sach = Sach::withTrashed()->find($id);

        if ($sach && $sach->kiem_duyet != 'duyet' || $hasPurchased) {
            $banSaoSach = BanSaoSach::where('sach_id', $id)
                ->orderBy('so_phien_ban', 'desc')
                ->first();
            $chuongs = Chuong::with('sach')
                ->where('sach_id', $id)
                ->paginate(10);
        } else {
            $chuongs = Chuong::with('sach')
                ->where('sach_id', $id)
                ->where('trang_thai', 'hien')
                ->where('kiem_duyet', 'duyet')
                ->paginate(10);
        }


        return response()->json([
            'current_page' => $chuongs->currentPage(),
            'data' => $chuongs->items(),
            'last_page' => $chuongs->lastPage(),
            'total' => $chuongs->total(),
            'per_page' => $chuongs->perPage(),
            'hasPurchased' => $hasPurchased
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

        $checkVaiTro = auth()->user()->hasRole(1) || auth()->user()->hasRole(3);

        $daMuaSach =  $checkVaiTro || DonHang::where('user_id', $userId)
            ->where('sach_id', $sachId)
            ->exists();

        if (!$daMuaSach) {
            return response()->json([
                'message' => 'Bạn phải mua sách này trước khi có thể đánh giá.',
            ], 403);
        }

        // Tạo đánh giá
        $sach = Sach::findOrFail($sachId);
        $ratingValue = $request->input('rating_value');
        $noiDung = $request->input('noi_dung');

        $danhGia = DanhGia::create([
            'sach_id' => $sachId,
            'user_id' => $userId,
            'noi_dung' => $noiDung,
            'ngay_danh_gia' => now(),
            'muc_do_hai_long' => $this->getMucDoHaiLong($ratingValue),
            'trang_thai' => 'hien',
        ]);

        // Tải thông tin người đánh giá
        $danhGia->load('user');
        $filePath = 'public/' . $danhGia->user->hinh_anh;

        if ($danhGia->user->hinh_anh && Storage::exists($filePath)) {
            $danhGia->user->hinh_anh_url = Storage::url($danhGia->user->hinh_anh);
        } else {
            $danhGia->user->hinh_anh_url = asset('assets/admin/images/users/user-dummy-img.jpg');
        }

        // Gửi thông báo cho quản trị viên
        $adminUsers = User::whereHas('vai_tros', function ($query) {
            $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
        })->get();
        // $url = route('notificationDanhGia', ['id' => $danhGia->id]);
        //  foreach ($adminUsers as $adminUser) {
        //      ThongBao::create([
        //          'user_id' => $adminUser->id,
        //          'tieu_de' => 'Có đánh giá mới cho sách "' . $sach->ten_sach . '"',
        //          'noi_dung' => 'Người dùng "' . $danhGia->user->name . '" đã đánh giá cuốn sách "' . $sach->ten_sach . '" với nội dung: ' . $noiDung . '.',
        //          'trang_thai' => 'chua_xem',
        //          'url' => $url,
        //          'type' => 'chung',
        //      ]);

        //     Mail::raw('Người dùng "' . $danhGia->user->name . '" đã đánh giá cuốn sách "' . $sach->ten_sach . '" với nội dung: ' . $noiDung . '. Bạn hãy kiểm tra tại đây: ' . $url, function ($message) use ($adminUser) {
        //         $message->to($adminUser->email)
        //             ->subject('Thông báo đánh giá mới cho sách');
        //     });
        // }

        // Gửi thông báo cho cộng tác viên (người đăng sách)
        $congTacVien = $sach->user;
        $urlForCongTacVien = route('notificationDanhGia', ['id' => $danhGia->id]);
        // ThongBao::create([
        //     'user_id' => $congTacVien->id,
        //     'tieu_de' => 'Có đánh giá mới cho sách của bạn: "' . $sach->ten_sach . '"',
        //     'noi_dung' => 'Người dùng "' . $danhGia->user->name . '" đã đánh giá cuốn sách "' . $sach->ten_sach . '" với nội dung: ' . $noiDung . '.',
        //     'trang_thai' => 'chua_xem',
        //     'url' => $urlForCongTacVien,
        //     'type' => 'chung',
        // ]);

        // Mail::raw('Người dùng "' . $danhGia->user->name . '" đã đánh giá cuốn sách của bạn "' . $sach->ten_sach . '" với nội dung: ' . $noiDung . '. Bạn hãy kiểm tra tại đây: ' . $urlForCongTacVien, function ($message) use ($congTacVien) {
        //     $message->to($congTacVien->email)
        //         ->subject('Thông báo đánh giá mới cho sách của bạn');
        // });

        return response()->json([
            'data' => [
                'danhGia' => $danhGia,
                'rating_value' => $ratingValue,
                'noi_dung' => $danhGia->noi_dung,
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
        $sachId = $request->input('sach_id');
        if (!$sachId) {
            return response()->json(['error' => 'sach_id không được cung cấp.'], 400);
        }

        $sach = Sach::find($sachId);
        if (!$sach) {
            return response()->json(['error' => 'Sách không tồn tại.'], 404);
        }

        $limit = 5;
        $page = $request->input('page', 1);
        $danhGia = DanhGia::with(['user', 'phanHoiDanhGia.user'])
            ->where('trang_thai', 'hien')
            ->where('sach_id', $sachId)
            ->orderBy('ngay_danh_gia', 'desc')
            ->paginate($limit, ['*'], 'page', $page);

        \Log::info('Dữ liệu đánh giá:', $danhGia->toArray());

        $danhGia->getCollection()->transform(function ($item) use ($sach) {
            // Xử lý ảnh người dùng
            $filePath = 'public/' . $item->user->hinh_anh;
            $item->user->hinh_anh_url = $item->user->hinh_anh && Storage::exists($filePath)
                ? Storage::url($item->user->hinh_anh)
                : asset('assets/admin/images/users/user-dummy-img.jpg');

            // Kiểm tra xem người đánh giá có phải là tác giả không
            $item->is_author = auth()->id() === $sach->user_id;

            // Kiểm tra xem tác giả đã phản hồi hay chưa
            $hasAuthorResponse = false;
            foreach ($item->phanHoiDanhGia as $phanHoi) {
                if ($phanHoi->user_id === $sach->user_id) {
                    $hasAuthorResponse = true;
                    break;
                }
            }

            // Thêm trường để kiểm tra tác giả đã phản hồi chưa
            $item->has_author_response = $hasAuthorResponse;

            // Kiểm tra thông tin phản hồi
            foreach ($item->phanHoiDanhGia as $phanHoi) {
                $filePath = 'public/' . $phanHoi->user->hinh_anh;
                $phanHoi->user->hinh_anh_url = $phanHoi->user->hinh_anh && Storage::exists($filePath)
                    ? Storage::url($phanHoi->user->hinh_anh)
                    : asset('assets/admin/images/users/user-dummy-img.jpg');
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
                'muc_do_hai_long' => $this->getMucDoHaiLong($request->input('rating_value')),
            ]);
        }

        return response()->json(['message' => 'Đánh giá đã được cập nhật thành công.', 'data' => $danhGia]);
    }


    public function phanHoiDanhGia(Request $request)
    {
        try {
            $validated = $request->validate([
                'danh_gia_id' => 'required|exists:danh_gias,id',
                'user_id' => 'required|exists:users,id',
                'noi_dung_phan_hoi' => 'required|string'
            ]);

            $phanHoi = new PhanHoiDanhGia();
            $phanHoi->danh_gia_id = $validated['danh_gia_id'];
            $phanHoi->user_id = $validated['user_id'];
            $phanHoi->noi_dung_phan_hoi = $validated['noi_dung_phan_hoi'];
            $phanHoi->save();

            $user = $phanHoi->user;
            $hinhAnhUrl = $user->hinh_anh ? Storage::url($user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg');

            return response()->json([
                'success' => true,
                'ten_doc_gia' => $user->ten_doc_gia,
                'danh_gia_id' => $phanHoi->danh_gia_id,
                'hinh_anh_url' => $hinhAnhUrl,
                'noi_dung_phan_hoi' => $phanHoi->noi_dung_phan_hoi,
                'created_at' => $phanHoi->created_at->format('d/m/Y')
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function getPhanHoi($danhGiaId)
    {
        // Lấy phản hồi cho đánh giá từ cơ sở dữ liệu
        $danhGia = DanhGia::find($danhGiaId);

        if ($danhGia && $danhGia->phan_hoi) {
            return response()->json([
                'success' => true,
                'response' => $danhGia->phan_hoi,
            ]);
        }

        return response()->json(['success' => false]);
    }
}
