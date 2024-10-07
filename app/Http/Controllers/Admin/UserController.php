<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VaiTro;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Quyền truy cập view (index, show)
        $this->middleware('permission:users-index')->only(['index', 'show']);

        // Quyền tạo (create, store)
        $this->middleware('permission:users-store')->only(['create', 'store']);

        // Quyền chỉnh sửa (edit, update)
        $this->middleware('permission:users-update')->only(['edit', 'update']);

        // Quyền xóa (destroy)
        $this->middleware('permission:users-destroy')->only('destroy');
    }

//    public function index(Request $request)
//    {
//        $roleCounts = DB::table('vai_tro_tai_khoans')
//            ->join('vai_tros', 'vai_tro_tai_khoans.vai_tro_id', '=', 'vai_tros.id')
//            ->select('vai_tros.id','vai_tros.ten_vai_tro', DB::raw('count(vai_tro_tai_khoans.user_id) as user_count'))
//            ->groupBy('vai_tros.id','vai_tros.ten_vai_tro')
//            ->get();
//
//        return view('admin.user.index', [
//            'users' => User::with('vai_tros')->get(),
//            'vai_tros' => VaiTro::all(),
//            'roles_counts' => $roleCounts
//        ]);
//    }
    public function index(Request $request)
    {
        $roleCounts = DB::table('vai_tro_tai_khoans')
            ->join('vai_tros', 'vai_tro_tai_khoans.vai_tro_id', '=', 'vai_tros.id')
            ->select('vai_tros.id','vai_tros.ten_vai_tro', DB::raw('count(vai_tro_tai_khoans.user_id) as user_count'))
            ->groupBy('vai_tros.id','vai_tros.ten_vai_tro')
            ->get();

        // Lọc người dùng theo vai trò nếu có role_id
        $query = User::with('vai_tros');

        if ($request->has('role_id')) {
            $query->whereHas('vai_tros', function($q) use ($request) {
                $q->where('vai_tros.id', $request->role_id);
            });
        }

        return view('admin.user.index', [
            'users' => $query->get(),
            'vai_tros' => VaiTro::all(),
            'roles_counts' => $roleCounts
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate dữ liệu từ form
        $data = $request->validate([
            'ten_doc_gia' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'so_dien_thoai' => 'nullable|string|max:15',
            'dia_chi' => 'nullable|string|max:255',
            'password' => 'required|string|min:5',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vai_tro' => 'required|exists:vai_tros,id',
        ]);

        // Xử lý upload ảnh đại diện
        if ($request->hasFile('avatar')) {
            // Lưu ảnh vào thư mục uploads trong storage/public
            $avatarPath = $request->file('avatar')->store('uploads/avatar-user', 'public');
            $data['avatar'] = $avatarPath;
        }

        // Mã hóa mật khẩu
//        $data['mat_khau'] = bcrypt($request->mat_khau);
        // Tạo người dùng mới
        try {
            $user = User::query()->create($data);
            $user->vai_tros()->attach($request->vai_tro);
            return redirect()->route('users.index')->with('success', 'Người dùng mới đã được thêm thành công.');
        } catch (\Exception $exception) {
            throw new \Error('Exception: ' . $exception->getMessage());
        }

        // Redirect về trang danh sách người dùng với thông báo thành công

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('vai_tros')->findOrFail($id);
        $data = [
            'id' => $user->id,
            'ten_doc_gia' => $user->ten_doc_gia,
            'email' => $user->email,
            'gioi_tinh' => $user->gioi_tinh,
            'so_dien_thoai' => $user->so_dien_thoai,
            'dia_chi' => $user->dia_chi,
            'vai_tro' => $user->vai_tros->pluck('id'),
        ];

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //        dd($request->all());
        $user = User::with('vai_tros')->findOrFail($id);
        $data = $request->validate([
            'vai_tro' => 'required|exists:vai_tros,id',
        ]);
        try {
            $user->vai_tros()->sync([$data['vai_tro']]);
            $user->save();
            return redirect()->route('users.index')->with('success', 'Người dùng đã được sửa thành công.');
        } catch (\Exception $exception) {
            throw new \Error('Exception: ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function changeStatus($id, $status)
    {
        $user = User::query()->findOrFail($id);
        $user->trang_thai = $status;
        $user->save();
        return response()->json([
            'id' => $id,
            'status' => $status
        ]);
    }

    public function showProfile(string $id)
    {
        $user = User::query()->findOrFail($id);
        $completion = 0;

        if (!empty($user->email)) {
            $completion += 20;
        }

        if (!empty($user->ten_doc_gia)) {
            $completion += 20;
        }

        if (!empty($user->hinh_anh)) {
            $completion += 10;
        }
        if (!empty($user->so_dien_thoai)) {
            $completion += 20;
        }
        if (!empty($user->dia_chi)) {
            $completion += 10;
        }
        if (!empty($user->sinh_nhat)) {
            $completion += 10;
        }
        if (!empty($user->gioi_tinh)) {
            $completion += 10;
        }
        return view('admin.user.profile', compact('user', 'completion'));
    }
    public function updateProfile(Request $request,string $id)
    {
        $user = User::query()->findOrFail($id);
        $data = $request->validate([
            'ten_doc_gia' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'so_dien_thoai' => 'nullable|string|max:15',
            'dia_chi' => 'nullable|string|max:255',
            'sinh_nhat' => 'nullable|string|max:255',
            'hinh_anh' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'gioi_tinh' => 'nullable|string|max:255',
        ]);
        if ($request->hasFile('hinh_anh')) {
            if ($user->hinh_anh && Storage::disk('public')->exists($user->hinh_anh)) {
                Storage::disk('public')->delete($user->hinh_anh);
            }
            $filePath = $request->file('hinh_anh')->store('uploads/avatar-user', 'public');
        } else {
            $filePath = $user->hinh_anh;
        }
        $data['hinh_anh'] = $filePath;
        try {
            $user->update($data);
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
