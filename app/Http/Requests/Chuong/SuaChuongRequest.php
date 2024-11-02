<?php

namespace App\Http\Requests\Chuong;

use Illuminate\Foundation\Http\FormRequest;

class SuaChuongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'so_chuong' => 'required',
            'tieu_de' => 'required|min:3|max:255',
            'noi_dung' => 'required|min:10',
            'loai_sua' => 'nullable|string|in:sua_ten_sach,sua_the_loai,sua_noi_dung,sua_ten_tac_gia,sua_gia_goc,sua_gia_khuyen_mai,sua_anh_bia,sua_trang_thai',
            'loai_sua_text' => 'nullable|string|max:255|required_without:loai_sua',
        ];
    }

    public function messages(): array
    {
        return [
            'so_chuong.required' => 'Số chương là bắt buộc.',
            'tieu_de.required' => 'Tiêu đề là bắt buộc.',
            'tieu_de.min' => 'Tiêu đề phải có ít nhất 3 ký tự.',
            'tieu_de.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'noi_dung.required' => 'Nội dung là bắt buộc.',
            'noi_dung.min' => 'Nội dung phải có ít nhất 10 ký tự.',
            'ngay_len_song.required' => 'Ngày lên sóng là bắt buộc.',
            'ngay_len_song.date' => 'Ngày lên sóng không hợp lệ.',
            'loai_sua.in' => 'Loại sửa không hợp lệ.',
            'loai_sua_text.max' => 'Loại sửa tùy chỉnh không được vượt quá 255 ký tự.',
            'loai_sua.required_without' => 'Bạn phải chọn một loại sửa hoặc nhập loại sửa tùy chỉnh.',
        ];
    }
}
