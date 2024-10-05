<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\Sach;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeSachController extends Controller
{

//    public function soLuongSachDaBan(request $request)
//    {
//        // Tuần
//        // Sách đã bán thành công trong tuần hiện tại
//        $sachBanTheoTuan = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'thanh_cong') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfWeek(), now()->endOfWeek()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Sách đã bán thất bại trong tuần hiện tại
//        $sachThatBaiTheoTuan = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'that_bai') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfWeek(), now()->endOfWeek()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Sách đang xử lý trong tuần hiện tại
//        $sachDangXuLyTheoTuan = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'dang_xu_ly') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfWeek(), now()->endOfWeek()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Tổng số lượng sách bán thành công tuần
//        $soLuongTuan = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'thanh_cong') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfWeek(), now()->endOfWeek()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuoc = $soLuongTuan->sum('so_luong_ban');
//        // Tổng số lượng sách bán đang xử lý tuần
//        $soLuongTuanXL = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'dang_xu_ly') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfWeek(), now()->endOfWeek()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuocXL = $soLuongTuanXL->sum('so_luong_ban');
//        // Tổng số lượng sách bán thất bại tuần
//        $soLuongTuanTB = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'that_bai') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfWeek(), now()->endOfWeek()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuocTB = $soLuongTuanTB->sum('so_luong_ban');
//        // Tổng tiền thành công tuần
//        $tongDoanhThuTuanNay = DonHang::where('trang_thai', 'thanh_cong')
//            ->where('created_at', '>=', now()->startOfWeek())
//            ->where('created_at', '<=', now()->endOfWeek())
//            ->sum('so_tien_thanh_toan');
//
//        // Tháng
//        // Sách đã bán thành công trong tháng hiện tại
//        $sachBanTheoThang = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'thanh_cong') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfMonth(), now()->endOfMonth()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Sách đã bán thất bại trong tháng hiện tại
//        $sachThatBaiTheoThang = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'that_bai') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfMonth(), now()->endOfMonth()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Sách đang xử lý trong tháng hiện tại
//        $sachDangXuLyTheoThang = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'dang_xu_ly') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfMonth(), now()->endOfMonth()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Tổng số lượng sách bán thành công tháng
//        $soLuongThang = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'thanh_cong') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfMonth(), now()->endOfMonth()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuocThang = $soLuongThang->sum('so_luong_ban');
//        // Tổng số lượng sách bán đang xử lý tuần
//        $soLuongThangXL = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'dang_xu_ly') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfMonth(), now()->endOfMonth()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuocXLThang = $soLuongThangXL->sum('so_luong_ban');
//        // Tổng số lượng sách bán thất bại tuần
//        $soLuongThangTB = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'that_bai') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfMonth(), now()->endOfMonth()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuocTBThang = $soLuongThangTB->sum('so_luong_ban');
//        // Tổng tiền thành công tuần
//        $tongDoanhThuThangNay = DonHang::where('trang_thai', 'thanh_cong')
//            ->where('created_at', '>=', now()->startOfMonth())
//            ->where('created_at', '<=', now()->endOfMonth())
//            ->sum('so_tien_thanh_toan');
//
//        // Năm
//        // Sách đã bán thành công trong năm hiện tại
//        $sachBanTheoNam = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'thanh_cong') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfYear(), now()->endOfYear()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Sách đã bán thất bại trong tháng hiện tại
//        $sachThatBaiTheoNam = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'that_bai') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfYear(), now()->endOfYear()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Sách đang xử lý trong tháng hiện tại
//        $sachDangXuLyTheoNam = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'dang_xu_ly') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfYear(), now()->endOfYear()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Tổng số lượng sách bán thành công tháng
//        $soLuongNam = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'thanh_cong') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfYear(), now()->endOfYear()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuocNam = $soLuongNam->sum('so_luong_ban');
//        // Tổng số lượng sách bán đang xử lý tuần
//        $soLuongNamXL = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'dang_xu_ly') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfYear(), now()->endOfYear()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuocXLNam = $soLuongNamXL->sum('so_luong_ban');
//        // Tổng số lượng sách bán thất bại tuần
//        $soLuongNamTB = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'that_bai') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfYear(), now()->endOfYear()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuocTBNam = $soLuongNamTB->sum('so_luong_ban');
//        // Tổng tiền thành công tuần
//        $tongDoanhThuNamNay = DonHang::where('trang_thai', 'thanh_cong')
//            ->where('created_at', '>=', now()->startOfYear())
//            ->where('created_at', '<=', now()->endOfYear())
//            ->sum('so_tien_thanh_toan');
//
//        // Qúy
//        // Sách đã bán thành công trong quý hiện tại
//        $sachBanTheoQuy = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'thanh_cong') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfQuarter(), now()->endOfQuarter()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Sách đã bán thất bại trong quý hiện tại
//        $sachThatBaiTheoQuy = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'that_bai') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfQuarter(), now()->endOfQuarter()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Sách đang xử lý trong quý hiện tại
//        $sachDangXuLyTheoQuy = DB::table('don_hangs')
//            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                'saches.ten_sach', // Tên sách
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'dang_xu_ly') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfQuarter(), now()->endOfQuarter()]) // Trong tuần hiện tại
//            ->groupBy('ngay', 'saches.ten_sach') // Nhóm theo ngày và tên sách
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        // Tổng số lượng sách bán thành công tháng
//        $soLuongQuy = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'thanh_cong') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfQuarter(), now()->endOfQuarter()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuocQuy = $soLuongQuy->sum('so_luong_ban');
//        // Tổng số lượng sách bán đang xử lý quý
//        $soLuongQuyXL = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'dang_xu_ly') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfQuarter(), now()->endOfQuarter()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuocXLQuy = $soLuongQuyXL->sum('so_luong_ban');
//        // Tổng số lượng sách bán thất bại tuần
//        $soLuongQuyTB = DB::table('don_hangs')
//            ->select(
//                DB::raw('DATE(don_hangs.created_at) as ngay'), // Ngày bán
//                DB::raw('COUNT(don_hangs.id) as so_luong_ban'), // Tổng số đơn hàng (số sách bán)
//                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu') // Tổng doanh thu
//            )
//            ->where('don_hangs.trang_thai', 'that_bai') // Chỉ tính các đơn hàng thành công
//            ->whereBetween('don_hangs.created_at', [now()->startOfQuarter(), now()->endOfQuarter()]) // Trong tuần hiện tại
//            ->groupBy('ngay') // Nhóm theo ngày
//            ->orderBy('tong_doanh_thu', 'desc') // Sắp xếp theo tổng doanh thu giảm dần
//            ->get();
//        $tongSoLuongBanDuocTBQuy = $soLuongQuyTB->sum('so_luong_ban');
//        // Tổng tiền thành công tuần
//        $tongDoanhThuQuyNay = DonHang::where('trang_thai', 'thanh_cong')
//            ->where('created_at', '>=', now()->startOfQuarter())
//            ->where('created_at', '<=', now()->endOfQuarter())
//            ->sum('so_tien_thanh_toan');
//        return view('admin.thong-ke.thong-ke-so-luong-sach-da-ban', compact(
//            'sachBanTheoTuan',
//            'sachDangXuLyTheoTuan',
//            'sachThatBaiTheoTuan',
//            'tongSoLuongBanDuoc',
//            'tongSoLuongBanDuocXL',
//            'tongSoLuongBanDuocTB',
//            'tongDoanhThuTuanNay',
//            // Tháng
//            'sachBanTheoThang',
//            'sachDangXuLyTheoThang',
//            'sachThatBaiTheoThang',
//            'tongSoLuongBanDuocThang',
//            'tongSoLuongBanDuocXLThang',
//            'tongSoLuongBanDuocTBThang',
//            'tongDoanhThuThangNay',
//            // Nam
//            'sachBanTheoNam',
//            'sachDangXuLyTheoNam',
//            'sachThatBaiTheoNam',
//            'tongSoLuongBanDuocNam',
//            'tongSoLuongBanDuocXLNam',
//            'tongSoLuongBanDuocTBNam',
//            'tongDoanhThuNamNay',
//            // Qúy
//            'sachBanTheoQuy',
//            'sachDangXuLyTheoQuy',
//            'sachThatBaiTheoQuy',
//            'tongSoLuongBanDuocQuy',
//            'tongSoLuongBanDuocXLQuy',
//            'tongSoLuongBanDuocTBQuy',
//            'tongDoanhThuQuyNay',
//        ));
//    }
    public function soLuongSachDaBan(Request $request)
    {
        function getDonHangTheoThoiGian($trangThai, $start, $end) {
            return DB::table('don_hangs')
                ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                ->select(
                    DB::raw('DATE(don_hangs.created_at) as ngay'),
                    'saches.ten_sach',
                    DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
                    DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu')
                )
                ->where('don_hangs.trang_thai', $trangThai)
                ->whereBetween('don_hangs.created_at', [$start, $end])
                ->groupBy('ngay', 'saches.ten_sach')
                ->orderBy('tong_doanh_thu', 'desc')
                ->get();
        }

        $sachBanTheoTuan = getDonHangTheoThoiGian('thanh_cong', now()->startOfWeek(), now()->endOfWeek());
        $sachThatBaiTheoTuan = getDonHangTheoThoiGian('that_bai', now()->startOfWeek(), now()->endOfWeek());
        $sachDangXuLyTheoTuan = getDonHangTheoThoiGian('dang_xu_ly', now()->startOfWeek(), now()->endOfWeek());

        $tongSoLuongBanDuoc = $sachBanTheoTuan->sum('so_luong_ban');
        $tongSoLuongBanDuocXL = $sachDangXuLyTheoTuan->sum('so_luong_ban');
        $tongSoLuongBanDuocTB = $sachThatBaiTheoTuan->sum('so_luong_ban');

        $tongDoanhThuTuanNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('so_tien_thanh_toan');

        $sachBanTheoThang = getDonHangTheoThoiGian('thanh_cong', now()->startOfMonth(), now()->endOfMonth());
        $sachThatBaiTheoThang = getDonHangTheoThoiGian('that_bai', now()->startOfMonth(), now()->endOfMonth());
        $sachDangXuLyTheoThang = getDonHangTheoThoiGian('dang_xu_ly', now()->startOfMonth(), now()->endOfMonth());

        $tongSoLuongBanDuocThang = $sachBanTheoThang->sum('so_luong_ban');
        $tongSoLuongBanDuocXLThang = $sachDangXuLyTheoThang->sum('so_luong_ban');
        $tongSoLuongBanDuocTBThang = $sachThatBaiTheoThang->sum('so_luong_ban');

        $tongDoanhThuThangNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->sum('so_tien_thanh_toan');

        $sachBanTheoNam = getDonHangTheoThoiGian('thanh_cong', now()->startOfYear(), now()->endOfYear());
        $sachThatBaiTheoNam = getDonHangTheoThoiGian('that_bai', now()->startOfYear(), now()->endOfYear());
        $sachDangXuLyTheoNam = getDonHangTheoThoiGian('dang_xu_ly', now()->startOfYear(), now()->endOfYear());

        $tongSoLuongBanDuocNam = $sachBanTheoNam->sum('so_luong_ban');
        $tongSoLuongBanDuocXLNam = $sachDangXuLyTheoNam->sum('so_luong_ban');
        $tongSoLuongBanDuocTBNam = $sachThatBaiTheoNam->sum('so_luong_ban');

        $tongDoanhThuNamNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()])
            ->sum('so_tien_thanh_toan');

        $sachBanTheoQuy = getDonHangTheoThoiGian('thanh_cong', now()->startOfQuarter(), now()->endOfQuarter());
        $sachThatBaiTheoQuy = getDonHangTheoThoiGian('that_bai', now()->startOfQuarter(), now()->endOfQuarter());
        $sachDangXuLyTheoQuy = getDonHangTheoThoiGian('dang_xu_ly', now()->startOfQuarter(), now()->endOfQuarter());

        $tongSoLuongBanDuocQuy = $sachBanTheoQuy->sum('so_luong_ban');
        $tongSoLuongBanDuocXLQuy = $sachDangXuLyTheoQuy->sum('so_luong_ban');
        $tongSoLuongBanDuocTBQuy = $sachThatBaiTheoQuy->sum('so_luong_ban');

        $tongDoanhThuQuyNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereBetween('created_at', [now()->startOfQuarter(), now()->endOfQuarter()])
            ->sum('so_tien_thanh_toan');

        $sachBanChay = DonHang::select(
            'sach_id',
            DB::raw('COUNT(*) as so_luong_ban'),
            DB::raw('SUM(so_tien_thanh_toan) as tong_tien')
        )
            ->with('sach')  // Gọi quan hệ với bảng sách
            ->where('trang_thai', 'thanh_cong')  // Lọc những đơn hàng thành công
            ->groupBy('sach_id')  // Nhóm theo sách
            ->orderBy('so_luong_ban', 'desc')  // Sắp xếp theo số lượng bán
            ->limit(5)  // Lấy ra 5 cuốn bán chạy nhất
            ->get();
        $tongTienBanChay = $sachBanChay->sum('tong_tien');
        return view('admin.thong-ke.thong-ke-so-luong-sach-da-ban', compact(
            'sachBanTheoTuan', 'sachDangXuLyTheoTuan', 'sachThatBaiTheoTuan',
            'tongSoLuongBanDuoc', 'tongSoLuongBanDuocXL', 'tongSoLuongBanDuocTB', 'tongDoanhThuTuanNay',
            'sachBanTheoThang', 'sachDangXuLyTheoThang', 'sachThatBaiTheoThang',
            'tongSoLuongBanDuocThang', 'tongSoLuongBanDuocXLThang', 'tongSoLuongBanDuocTBThang', 'tongDoanhThuThangNay',
            'sachBanTheoNam', 'sachDangXuLyTheoNam', 'sachThatBaiTheoNam',
            'tongSoLuongBanDuocNam', 'tongSoLuongBanDuocXLNam', 'tongSoLuongBanDuocTBNam', 'tongDoanhThuNamNay',
            'sachBanTheoQuy', 'sachDangXuLyTheoQuy', 'sachThatBaiTheoQuy',
            'tongSoLuongBanDuocQuy', 'tongSoLuongBanDuocXLQuy', 'tongSoLuongBanDuocTBQuy', 'tongDoanhThuQuyNay',
            'tongTienBanChay', 'sachBanChay'
        ));
    }

    public function layDuLieuTheoKy(Request $request)
    {
        $period = $request->query('period');

        switch ($period) {
            case '1': // Tuần
                $sachBanTheoKy = $this->getDonHangTheoThoiGian('thanh_cong', now()->startOfWeek(), now()->endOfWeek());
                $sachDangXuLyTheoKy = $this->getDonHangTheoThoiGian('dang_xu_ly', now()->startOfWeek(), now()->endOfWeek());
                $sachThatBaiTheoKy = $this->getDonHangTheoThoiGian('that_bai', now()->startOfWeek(), now()->endOfWeek());
                break;
            case '2': // Tháng
                $sachBanTheoKy = $this->getDonHangTheoThoiGian('thanh_cong', now()->startOfMonth(), now()->endOfMonth());
                $sachDangXuLyTheoKy = $this->getDonHangTheoThoiGian('dang_xu_ly', now()->startOfMonth(), now()->endOfMonth());
                $sachThatBaiTheoKy = $this->getDonHangTheoThoiGian('that_bai', now()->startOfMonth(), now()->endOfMonth());
                break;
            case '3': // Năm
                $sachBanTheoKy = $this->getDonHangTheoThoiGian('thanh_cong', now()->startOfYear(), now()->endOfYear());
                $sachDangXuLyTheoKy = $this->getDonHangTheoThoiGian('dang_xu_ly', now()->startOfYear(), now()->endOfYear());
                $sachThatBaiTheoKy = $this->getDonHangTheoThoiGian('that_bai', now()->startOfYear(), now()->endOfYear());
                break;
            case '4': // Quý
                $sachBanTheoKy = $this->getDonHangTheoThoiGian('thanh_cong', now()->startOfQuarter(), now()->endOfQuarter());
                $sachDangXuLyTheoKy = $this->getDonHangTheoThoiGian('dang_xu_ly', now()->startOfQuarter(), now()->endOfQuarter());
                $sachThatBaiTheoKy = $this->getDonHangTheoThoiGian('that_bai', now()->startOfQuarter(), now()->endOfQuarter());
                break;
            default:
                return response()->json(['error' => 'Invalid period'], 400);
        }

        // Tính tổng số lượng sách và tổng doanh thu
        $tongSoLuongBanDuoc = $sachBanTheoKy->sum('so_luong_ban');
        $tongSoLuongBanDuocXL = $sachDangXuLyTheoKy->sum('so_luong_ban');
        $tongSoLuongBanDuocTB = $sachThatBaiTheoKy->sum('so_luong_ban');
        $tongDoanhThu = $sachBanTheoKy->sum('tong_doanh_thu');

        // Trả về dữ liệu dưới dạng JSON
        return response()->json([
            'tongSoLuongBanDuoc' => $tongSoLuongBanDuoc,
            'tongSoLuongBanDuocXL' => $tongSoLuongBanDuocXL,
            'tongSoLuongBanDuocTB' => $tongSoLuongBanDuocTB,
            'tongDoanhThu' => $tongDoanhThu
        ]);
    }

    public function getSachBan(Request $request)
    {
        $period = $request->query('period');

        switch ($period) {
            case 'Tuần':
                $start = now()->startOfWeek();
                $end = now()->endOfWeek();
                break;
            case 'Tháng':
                $start = now()->startOfMonth();
                $end = now()->endOfMonth();
                break;
            case 'Năm':
                $start = now()->startOfYear();
                $end = now()->endOfYear();
                break;
            case 'Qúy':
                $start = now()->startOfQuarter();
                $end = now()->endOfQuarter();
                break;
            default:
                return response()->json(['error' => 'Khoảng thời gian không hợp lệ'], 400);
        }

        // Truy vấn lấy 5 cuốn sách bán chạy nhất theo khoảng thời gian
        $sachBanChay = DonHang::select(
            'sach_id',
            DB::raw('SUM(so_luong) as so_luong_ban'),  // Tổng số lượng sách bán ra
            DB::raw('SUM(so_tien_thanh_toan) as tong_tien')  // Tổng tiền đã thanh toán
        )
            ->with('sach')  // Gọi quan hệ với bảng sách
            ->where('trang_thai', 'thanh_cong')  // Lọc những đơn hàng thành công
            ->whereBetween('created_at', [$start, $end])  // Lọc theo khoảng thời gian
            ->groupBy('sach_id')  // Nhóm theo sách
            ->orderBy('so_luong_ban', 'desc')  // Sắp xếp theo số lượng bán
            ->limit(5)  // Lấy ra 5 cuốn bán chạy nhất
            ->get();

        return response()->json($sachBanChay);  // Trả về JSON cho frontend
    }

}
