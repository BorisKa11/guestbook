<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required|email|max:255|unique:users,email',
            'password'  => 'required|string|min:6|',
            'password2'  => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'email.unique'          => 'Email адрес уже используется',
            'password.min'          => 'Минимальная длина пароля 6 символов',
            'password2.same'        => 'Введённые пароли не совпадают',
        ];
    }
}
