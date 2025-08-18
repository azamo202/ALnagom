<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'phone' => 'required|string|size:9',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'sometimes|string|in:user,admin',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب.',
            'name.string'   => 'الاسم يجب أن يكون نصاً.',
            'name.max'      => 'الاسم يجب ألا يزيد عن 100 حرف.',

            'phone.required' => 'رقم الهاتف مطلوب.',
            'phone.string'   => 'رقم الهاتف يجب أن يكون نصاً.',
            'phone.size'     => 'رقم الهاتف يجب أن يتكون من 9 أرقام.',

            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email'    => 'صيغة البريد الإلكتروني غير صحيحة.',
            'email.max'      => 'البريد الإلكتروني يجب ألا يزيد عن 100 حرف.',
            'email.unique'   => 'البريد الإلكتروني مستخدم من قبل.',

            'password.required'  => 'كلمة المرور مطلوبة.',
            'password.min'       => 'كلمة المرور يجب ألا تقل عن 8 أحرف.',
            'password.confirmed' => 'كلمتا المرور غير متطابقتين.',
        ];
    }
}
