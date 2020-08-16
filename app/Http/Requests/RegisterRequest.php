<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:2|max:30',
            'email' => 'required|unique:users|email',
            'pass' => 'required|min:8|max:20|regex:[^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$]',
            're_pass' => 'required|same:pass'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên!!',
            'name.min' => 'Tên người dùng tối thiểu là 2 ký tự!',
            'name.max' => 'Tên người dùng tối đa là 30 ký tự!',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email này đã tồn tại, vui lòng sử dụng email khác!',
            'email.email' => 'Không đúng định dạng email!',
            'pass.required' => 'Bạn chưa nhập mật khẩu!',
            'pass.min' => 'Mật khẩu tối thiểu là 8 ký tự!',
            'pass.max' => 'Mật khẩu quá dài, tối đa 20 ký tự!',
            'pass.regex' => 'Mật khẩu phải có chữ và số (Không có ký tự đặc biệt!)',
            're_pass.required' => 'Bạn chưa xác nhận mật khẩu!',
            're_pass.same' => 'Mật khẩu nhập lại không chính xác!'
            ];

    }
}
