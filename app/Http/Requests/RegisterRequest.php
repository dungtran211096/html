<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên.',
            'email.required' => 'Bạn chưa nhập email.',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu chưa trùng',
            'email.email' => 'Nhập email chưa đúng',
            'password_confirmation.required' => 'Nhập lại mật khẩu'
        ];
    }
}
