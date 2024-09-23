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
            'quyens' => Quyen::all()
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
