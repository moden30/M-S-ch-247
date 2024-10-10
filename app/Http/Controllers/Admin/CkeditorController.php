<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $type = $request->input('type', 'khac');
            $folderPath = 'uploads/';
            switch ($type) {
                case 'bai_viet':
                    $folderPath .= 'bai_viet/';
                    break;
                case 'chuong':
                    $folderPath .= 'chuong/';
                    break;
                case 'lien_he':
                    $folderPath .= 'lien_he/';
                    break;
                default:
                    $folderPath .= 'khac/';
            }
            if (!file_exists(public_path($folderPath))) {
                mkdir(public_path($folderPath), 0777, true);
            }
            $file->move(public_path($folderPath), $filename);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset($folderPath . $filename);
            $msg = 'Tải tệp lên thành công';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

}
