<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\UserSach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TuSachCaNhanController extends Controller
{
    public function sachDangDoc(Request $request, string $id)
    {
        try {
            $query = UserSach::with('chuong', 'sach', 'user')->where('user_id', $id);

            if ($request->filled('title')) {
                $query->whereHas('sach', function ($q) use ($request) {
                    $q->where('ten_sach', 'like', '%' . $request->input('title') . '%');
                });
            }

            $data = $query->paginate(5);
            $format = $data->map(function ($item) {
                $so_chuong_moi_ra = $item->chuong->latest('updated_at')->where('sach_id','=', $item->sach_id)->first();
                return [
                    'id' => $item->id,
                    'sach_id' => $item->sach_id,
                    'chuong_id' => $item->chuong_id,
                    'chuong_moi_id' => $so_chuong_moi_ra->id,
                    'ten_chuong' => $item->chuong->tieu_de,
                    'ten_chuong_moi' => $so_chuong_moi_ra->tieu_de,
                    'ten_sach' => $item->sach->ten_sach,
                    'anh_bia_sach' => Storage::url($item->sach->anh_bia_sach),
                    'tac_gia' => $item->sach->tac_gia,
                    'so_chuong_dang_doc' => $item->chuong->so_chuong,
                    'so_chuong_moi_ra' => $so_chuong_moi_ra ? $so_chuong_moi_ra->so_chuong : null,
                    'tinh_trang_cap_nhat' => $item->sach->tinh_trang_cap_nhat,
                    'updated_at' => date('d/m/Y', strtotime($item->updated_at)),
                ];
            });

            return response()->json([
                'current_page' => $data->currentPage(),
                'data' => $format,
                'last_page' => $data->lastPage(),
                'total' => $data->total(),
                'per_page' => $data->perPage(),
            ]);
        } catch (\Exception $e) {
            \Log::error($e);

            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }
    public function lichSuDoc(Request $request, $userSachId, $chuongId)
    {
        $userId = Auth::user()->id;

        $userSach = UserSach::where('user_id', $userId)
            ->where('sach_id', $userSachId)
            ->first();

        if ($userSach) {
            $userSach->chuong_id = $chuongId;
            $userSach->save();
        } else {
            $userSach = new UserSach();
            $userSach->chuong_id = $chuongId;
            $userSach->sach_id = $userSachId;
            $userSach->user_id = $userId;
            $userSach->save();
        }
    }




}
