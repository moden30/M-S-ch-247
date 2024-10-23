<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\Sach;
use App\Models\User;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChiTietTacGiaController extends Controller
{
    public function show($id)
    {
        $author = User::findOrFail($id);

        $filter = request()->input('filter', 'all');

        // Lọc danh sách sách dựa trên giá trị của filter
        $books = Sach::where('user_id', $id);

        if ($filter == 'new') {
            $books->where('tinh_trang_cap_nhat', Sach::DA_FULL);
        } elseif ($filter == 'updating') {
            $books->where('tinh_trang_cap_nhat', Sach::TIEP_TUC_CAP_NHAT);
        } elseif ($filter == 'newest') {
            $books->orderBy('created_at', 'desc');
        } elseif ($filter == 'top-favorite') {
            $books->withCount('nguoiYeuThich')->orderBy('nguoi_yeu_thich_count', 'desc');
        } elseif ($filter == 'top-revenue') {
            // Tính tổng doanh thu cho mỗi cuốn sách từ các đơn hàng thành công
            $books->withSum(['donHangs' => function ($query) {
                $query->where('trang_thai', 'thanh_cong');
            }], 'so_tien_thanh_toan')
            ->orderBy('don_hangs_sum_so_tien_thanh_toan', 'desc');
        }

        $books = $books->get();
        $books = $books->map(function ($book) {
            $book->anh_bia_sach_url = Storage::url($book->anh_bia_sach);
            return $book;
        });

        // Nếu là yêu cầu AJAX, trả về dữ liệu JSON thay vì HTML
        if (request()->ajax()) {
            return response()->json($books);
        }

        $yeuThichCount = YeuThich::whereHas('sach', function ($query) use ($id) {
            $query->where('user_id', $id);
        })->count();

        $soLuongSachCount = DonHang::where('trang_thai', 'thanh_cong') // Lọc những đơn hàng thành công
            ->whereHas('sach', function ($query) use ($id) {
                $query->where('user_id', $id);
            })
            ->count();

        return view('client.pages.chi-tiet-tac-gia', compact('author', 'books', 'yeuThichCount', 'soLuongSachCount', 'filter'));
    }
}
