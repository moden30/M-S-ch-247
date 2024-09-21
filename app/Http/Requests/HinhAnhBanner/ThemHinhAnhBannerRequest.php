<?php

namespace App\Http\Requests\HinhAnhBanner;

use Illuminate\Foundation\Http\FormRequest;

class ThemHinhAnhBannerRequest extends FormRequest
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
            'tieu_de' => 'required|string|max:255',
            'noi_dung' => 'required|string',
            'loai_banner' => 'required',
            'trang_thai' => 'required',
            'list_image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'tieu_de.required' => 'Tiêu đề là bắt buộc.',
            'tieu_de.string' => 'Tiêu đề phải là chuỗi ký tự.',
            'tieu_de.max' => 'Tiêu đề không được vượt quá 255 ký tự.',

            'noi_dung.required' => 'Nội dung là bắt buộc.',
            'noi_dung.string' => 'Nội dung phải là chuỗi ký tự.',

            'loai_banner.required' => 'Loại banner là bắt buộc.',

            'trang_thai.required' => 'Trạng thái là bắt buộc.',

            'list_image.*.required' => 'Trạng thái là bắt buộc.',
            'list_image.*.image' => 'Mỗi tệp phải là một hình ảnh.',
            'list_image.*.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, hoặc gif.',
            'list_image.*.max' => 'Hình ảnh không được vượt quá 2MB.',
        ];
    }

}
