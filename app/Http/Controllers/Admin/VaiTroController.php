<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quyen;
use App\Models\TheLoai;
use App\Models\VaiTro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VaiTroController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        // Quyền truy cập view (index, show)
        $this->middleware('permission:roles-index')->only(['index', 'show']);

        // Quyền tạo (create, store)
        $this->middleware('permission:roles-store')->only(['create', 'store']);

        // Quyền chỉnh sửa (edit, update)
        $this->middleware('permission:roles-update')->only(['edit', 'update']);

        // Quyền xóa (destroy)
        $this->middleware('permission:roles-destroy')->only('destroy');
    }
    public function index(): View
    {
        return view('admin.user.role.index', [
            'theLoais' => theLoai::all(),
            'roles' => VaiTro::all(),
            'permissions' => Quyen::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.user.role.create', [
            'quyens' => Quyen::all(),
            'groupedPermissions' => Quyen::groupedPermissions(),


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'ten_vai_tro' => 'required|max:50|unique:vai_tros,ten_vai_tro',
            'mo_ta' => 'nullable',
            'quyen' => 'required|array',
            'quyen.*' => 'exists:quyens,id',
        ], [
            'ten_vai_tro.required' => 'Vui lòng nhập tên vai trò',
            'ten_vai_tro.unique' => 'Tên vai trò đã tồn tại',
            'quyen.required' => 'Vui lòng chọn ít nhất một quyền',
        ]);
        $vaiTro = VaiTro::create([
            'ten_vai_tro' => $request->ten_vai_tro,
            'mo_ta' => $request->mo_ta,
        ]);
        // Thêm quyền mới vào bảng trung gian quyen_vai_tros (sử dụng vòng lặp)
        foreach ($request->quyen as $quyenId) {
            $vaiTro->quyens()->attach($quyenId);
        }
        return redirect()->route('roles.index')->with('success', 'Vai trò đã được tạo thành công!');
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
        // Lấy tất cả các quyền từ bảng Quyen
        $quyens = Quyen::all();

        // Tìm vai trò theo ID
        $vaiTro = VaiTro::query()->findOrFail($id);

        // Nhóm quyền dựa trên cách bạn đã định nghĩa
        // Giả sử bạn có phương thức groupedPermissions trong model Quyen
        $groupedPermissions = Quyen::groupedPermissions();

        // Truyền các biến vào view
        return view('admin.user.role.edit', compact('vaiTro', 'quyens', 'groupedPermissions'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validate = $request->validate([
            'ten_vai_tro' => 'required|max:50|unique:vai_tros,ten_vai_tro,' . $id,
            'mo_ta' => 'nullable',
            'quyen' => 'required|array',
            'quyen.*' => 'exists:quyens,id',
        ], [
            'ten_vai_tro.required' => 'Vui lòng nhập tên vai trò',
            'ten_vai_tro.unique' => 'Tên vai trò đã tồn tại',
            'quyen.required' => 'Vui lòng chọn ít nhất một quyền',
        ]);

        $vaiTro = VaiTro::query()->findOrFail($id);
        $vaiTro->update([
            'ten_vai_tro' => $request->ten_vai_tro,
            'mo_ta' => $request->mo_ta,
        ]);

        // thêm, sửa, xóa quyền
        $vaiTro->quyens()->sync($request->quyen);

        return redirect()->route('roles.index')->with('success', 'Vai trò đã được sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vaiTro = VaiTro::query()->findOrFail($id);
        $vaiTro->quyens()->detach();
        $vaiTro->delete();
        return redirect()->route('roles.index')->with('success', 'Vai trò đã được xóa thành công!');
    }

    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $validStatuses = ['an', 'hien'];

        if (!in_array($newStatus, $validStatuses)) {
            return response()->json([
                'success' => false,
                'message' => 'Trạng thái không hợp lệ'
            ], 400);
        }
        $contact = VaiTro::find($id);

        if ($contact) {
            $contact->trang_thai = $newStatus;
            $contact->save();

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái thành công'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy thể loại'
        ], 404);
    }
}
