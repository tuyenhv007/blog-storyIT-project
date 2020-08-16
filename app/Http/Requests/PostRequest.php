<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:4|max:100',
            'desc' => 'max:150',
            'content' => 'required|min:50',
            'image' => 'max:10240'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Bạn chưa viết tiêu đề!',
            'title.min' => 'Tiêu đề tối thiểu từ 4 ký tự!',
            'title.max' => 'Tiêu đề quá dài, tối đa 100 ký tự!',
            'desc.max' => 'Mô tả quá dài, tối đa 150 ký tự!',
            'content.required' => 'Bạn chưa viết nội dung!',
            'content.min' => 'Nội dung bài viết tối thiểu 50 ký tự!',
            'image.max' => 'Dung lượng ảnh cho phép 10Mb'
        ];
    }
}
