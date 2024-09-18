<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuaBannerRequest extends FormRequest
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
            'hinh_anh' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'noi_dung' => 'required|string|max:1000',
            'trang_thai' => 'required|in:an,hien',
        ];
    }

    public function messages(): array
    {
        return [
            'noi_dung.required' => 'Nội dung không được bỏ trống',
            'noi_dung.max' => 'Nội dung vượt quá 1000 ký tự',
            'hinh_anh.max' => 'Ảnh vượt quá 1000 ký tự',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, hoặc gif.',
        ];
    }

}
