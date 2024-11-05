<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TheLoaiController extends Controller
{
    public function index(string $id)
    {
        $topDocNhieu = Sach::with('theLoai')->where('trang_thai', 'hien')->where('kiem_duyet', 'duyet')->where('the_loai_id', $id) ->orderBy('luot_xem', 'DESC')->take(10)->get();
        $theLoai = TheLoai::with('saches')->where('id', $id)->first();
        return view('client.pages.the-loai', compact('theLoai', 'topDocNhieu'));
    }

    public function dataTheLoai(Request $request, string $id)
    {
        try {
            $query = Sach::where('trang_thai', 'hien')->where('kiem_duyet', 'duyet')
                ->where('the_loai_id', $id)
                ->orderBy('id', 'DESC');

            if ($request->filter === 'new-chap') {
                $query->orderBy('updated_at', 'DESC');
            } elseif ($request->filter === 'new-full') {
                $query->where('tinh_trang_cap_nhat', 'da_full');
            } elseif ($request->filter === 'updating') {
                $query->where('tinh_trang_cap_nhat', 'tiep_tuc_cap_nhat');
            }

            $perPage = $request->input('per_page', 14);
            $data = $query->paginate($perPage);

            // Format the data before returning
            $format = $data->map(function ($item) {
                $da_mua = $item->DonHang
                    ->where('sach_id', $item->id)
                    ->where('user_id', Auth::user()->id)
                    ->where('trang_thai', 'thanh_cong')
                    ->isNotEmpty() ? 'Đã Mua' : '';
                $gia_goc = $item->gia_goc > 0 ? number_format($item->gia_goc, 0, ',', '.') . ' VNĐ' : 'Miễn phí';
                $gia_khuyen_mai = $item->gia_khuyen_mai > 0 ? number_format($item->gia_khuyen_mai, 0, ',', '.') . ' VNĐ' : null;


                return [
                    'id' => $item->id,
                    'ten_sach' => $item->ten_sach,
                    'tinh_trang_cap_nhat' => $item->tinh_trang_cap_nhat,
                    'anh_bia_sach' => Storage::url($item->anh_bia_sach),
                    'tac_gia' => $item->tac_gia,
                    'tom_tat' => $item->tom_tat,
                    'theloai' => $item->theLoai->ten_the_loai,
                    'gia_goc' => $gia_goc,
                    'gia_khuyen_mai' => $gia_khuyen_mai,
                    'da_mua' => $da_mua,
                    'format_ngay_cap_nhat' => date('d/m/Y', strtotime($item->updated_at)),
                ];
            });

            return response()->json([
                'data' => $format,
                'total' => $data->total(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }


}
