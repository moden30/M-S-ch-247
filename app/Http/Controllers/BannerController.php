<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Http\Requests\SuaBannerRequest;
use App\Models\Banner;
use App\Models\HinhAnhBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{

    public function index()
    {
        // lấy tất cả các bản ghi của Banner từ cơ sở dữ liệu và trả về view
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'noi_dung' => 'required|string',
            'loai_banner' => 'required|string',
            'trang_thai' => 'required|string',
            'list_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate cho ảnh
        ]);

        // Thêm mới banner
        $banner = Banner::create([
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'loai_banner' => $request->input('loai_banner'),
            'trang_thai' => $request->input('trang_thai'),
        ]);

        // Lấy ID banner vừa tạo
        $bannerID = $banner->id;

        // Xử lý thêm album ảnh
        if ($request->hasFile('list_image')) {
            foreach ($request->file('list_image') as $image) {
                if ($image) {
                    $path = $image->store('uploads/hinhanhbanner/id_' . $bannerID, 'public');

                    // Thêm ảnh vào bảng HinhAnhBanner
                    HinhAnhBanner::create([
                        'banner_id' => $bannerID,
                        'hinh_anh' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('banner.index')->with('success', 'Thêm banner và ảnh thành công');
    }

    public function show($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            abort(404, 'Not found');
        }
        return view('admin.banner.detail', compact('banner'));
    }


    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, string $id)
    {

        $params = $request->except('_token', '_method');

        $banner = Banner::query()
            ->findOrFail($id);



        $currentImages = $banner->hinhAnhBanner->pluck('id')->toArray();
        $arrayCombine = array_combine($currentImages, $currentImages);

        foreach ($arrayCombine as $key => $value) {
            // Tìm kiếm id hình trong mảng hình ảnh mới đẩy lên
            // Nếu ko tồn tại ID thì tức là người dùng đã xóa hình ảnh đó
            if (!array_key_exists($key, $request->list_hinh_anh)) {
                $hinhAnhBanner = HinhAnhBanner::query()->find($key);
                if ($hinhAnhBanner && Storage::disk('public')->exists($hinhAnhBanner->hinh_anh)) {
                    Storage::disk('public')->delete($hinhAnhBanner->hinh_anh);
                    $hinhAnhBanner->delete();
                }
            }
        }


        // Trường hợp thêm hoặc sửa
        foreach ($request->list_hinh_anh as $key => $image) {
            if (!array_key_exists($key, $arrayCombine)) {
                if ($request->hasFile("list_hinh_anh.$key")) {
                    $path = $image->store('uploads/hinhanhbanner/id_' . $id, 'public');
                    $banner->hinhAnhBanner()->create([
                        'banner_id' => $id,
                        'hinh_anh' => $path,
                    ]);
                }
            } else if (is_file($image) && $request->hasFile("list_hinh_anh.$key")) {
                // Trường hợp thay đổi hình ảnh
                $hinhAnhBanner = HinhAnhBanner::query()->find($key);
                if ($hinhAnhBanner && Storage::disk('public')->exists($hinhAnhBanner->hinh_anh)) {
                    Storage::disk('public')->delete($hinhAnhBanner->hinh_anh);
                }

                $path = $image->store('uploads/hinhanhbanner/id_' . $id, 'public');
                $hinhAnhBanner->update([
                    'hinh_anh' => $path,
                ]);
            }

            $banner->update($params);
            return redirect()->route('banner.index')->with('success', 'Cập nhật Banner thành công.');
        }
    }

    public function destroy(Banner $banner)
    {
        // Nếu banner có hình ảnh, cũng xóa hình ảnh đó khỏi storage.
        if ($banner->hinh_anh && Storage::disk('public')->exists($banner->hinh_anh)) {
            Storage::disk('public')->delete($banner->hinh_anh);
        }

        $banner->delete();

        return response()->json(['success' => true]);
    }
    public function updateStatus(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $banner->trang_thai = $request->trang_thai;
        $banner->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Trạng thái đã được cập nhật.'
        ]);
    }

    public function getBannersByType($type)
    {
        // Lấy tối đa 3 banner theo loại được chọn
        $banners = Banner::where('loai_banner', $type)
            ->where('trang_thai', 'hien')
            ->take(3)
            ->get();

        return response()->json(['banners' => $banners]);
    }
}
