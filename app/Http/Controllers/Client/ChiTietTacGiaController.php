<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\Sach;
use App\Models\User;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChiTietTacGiaController extends Controller
{
    public function show($id)
    {
        $author = User::findOrFail($id);
        $filter = request()->input('filter', 'all');

        // Lọc danh sách sách dựa trên giá trị của filter
        $books = Sach::where('user_id', $id)
            ->where('trang_thai', Sach::HIEN)
            ->where('kiem_duyet', Sach::DUYET)
            ->whereHas('theLoai', function ($query) {
                $query->where('trang_thai', 'hien');
            });

        // Áp dụng bộ lọc nếu có
        switch ($filter) {
            case 'new':
                $books->where('tinh_trang_cap_nhat', Sach::DA_FULL);
                break;
            case 'updating':
                $books->where('tinh_trang_cap_nhat', Sach::TIEP_TUC_CAP_NHAT);
                break;
            case 'newest':
                $books->orderBy('created_at', 'desc');
                break;
            case 'top-favorite':
                $books->withCount('nguoiYeuThich')
                    ->having('nguoi_yeu_thich_count', '>', 0)
                    ->orderBy('nguoi_yeu_thich_count', 'desc');
                break;
        }

        $books = $books->get();

        // Đảm bảo các URL ảnh bìa sách đã được xử lý
        $books->each(function ($book) {
            $book->anh_bia_sach_url = Storage::url($book->anh_bia_sach);
        });

        if (request()->ajax()) {
            return response()->json($books);
        }

        $yeuThichCount = YeuThich::whereHas('sach', function ($query) use ($id) {
            $query->where('user_id', $id)
                ->where('trang_thai', Sach::HIEN)
                ->where('kiem_duyet', Sach::DUYET);
        })->count();

        $soLuongSachCount = DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) use ($id) {
                $query->where('user_id', $id);
            })
            ->count();

        return view('client.pages.chi-tiet-tac-gia', compact('author', 'books', 'yeuThichCount', 'soLuongSachCount', 'filter'));
    }

    public function fetchBooks2(Request $request, $id)
    {
        $query = Sach::where('user_id', $id)
            ->where('kiem_duyet', 'duyet')
            ->where('trang_thai', 'hien')
            ->whereHas('user', function ($q) {
                $q->where('trang_thai', 'hoat_dong');
            });

        // Lọc theo tiêu đề sách nếu có
        if ($request->filled('title')) {
            $query->where('ten_sach', 'like', '%' . $request->input('title') . '%');
        }

        // Lọc theo nội dung người lớn
        if ($request->input('noi_dung_nguoi_lon') !== 'all') {
            $query->where('noi_dung_nguoi_lon', $request->input('noi_dung_nguoi_lon'));
        }

        // Lọc theo tình trạng cập nhật
        if ($request->input('tinh_trang_cap_nhat') !== 'all') {
            $query->where('tinh_trang_cap_nhat', $request->input('tinh_trang_cap_nhat'));
        }

        // Lọc theo thời gian cập nhật
        if ($request->input('ngay_dang') === 'new') {
            $query->orderBy('updated_at', 'desc');
        } elseif ($request->input('ngay_dang') === 'old') {
            $query->orderBy('updated_at', 'asc');
        }

        // Phân trang kết quả
        $books = $query->paginate(10);

        // Format dữ liệu trước khi trả về
        $books->getCollection()->transform(function ($book) {
            return [
                'id' => $book->id,
                'ten_sach' => $book->ten_sach,
                'anh_bia_sach' => Storage::url($book->anh_bia_sach),
                'gia_sach' => number_format($book->gia_sach) . ' VNĐ',
            ];
        });

        // Trả về dữ liệu dưới dạng JSON cho AJAX
        return response()->json([
            'data' => $books->items(),
            'current_page' => $books->currentPage(),
            'last_page' => $books->lastPage(),
            'total' => $books->total(),
        ]);
    }




}
