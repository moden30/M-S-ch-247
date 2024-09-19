<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LienHe;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    public $lien_he;
    public function __construct()
    {
        $this->lien_he = new LienHe();
    }

    // Hiển thị và lọc trạng thái
    public function index(Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            // Lọc liên hệ theo trạng thái
            $list = $this->lien_he->where('trang_thai', $status)->get();
        } else {
            // Lấy tất cả liên hệ
            $list = $this->lien_he->allLienHe();
        }
        return view('admin.lien-he.index', ['list' => $list, 'status' => $status]);
    }

    // Hiển thị chi tiết
    public function show($id)
    {
        $lien_he = LienHe::with('taiKhoan')->find($id);

        if (!$lien_he) {
            return response()->json(['error' => 'Liên hệ không tồn tại'], 404);
        }

        return response()->json($lien_he);
    }

    // Sử lý chuyển đổi trạng thái
    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $contact = LienHe::find($id);

        if ($contact) {
            $currentStatus = $contact->trang_thai;

            // Trạng thái
            if (
                // Khi ở trạng thái 'dang_ho_tro' sẽ không chuyển về trạng thái 'mo'
                ($currentStatus == 'dang_ho_tro' && $newStatus == 'mo') ||
                // Khi ở trạng thái 'dong' sẽ không chuyển về trạng thái 'dang_ho_tro'
                ($currentStatus == 'dong' && $newStatus == 'dang_ho_tro') ||
                // Khi ở trạng thái 'dong' sẽ không chuyển về trạng thái 'mo'
                ($currentStatus == 'dong' && $newStatus == 'mo')
            ) {
                return response()->json(['success' => false, 'message' => 'Không thể chuyển trạng thái này.'], 403);
            }

            $contact->trang_thai = $newStatus;
            $contact->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    //Sử lý chuyển sang trang form phản hồi
    public function phanHoiForm($id)
    {
        $lienHe = LienHe::findOrFail($id);
        return view('admin.lien-he.phanhoi', compact('lienHe'));
    }
}
