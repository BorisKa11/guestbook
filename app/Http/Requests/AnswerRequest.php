<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message'     => 'min:1|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'message.min'          => 'Минимальная длина сообщения - 1 символ',
            'message.max'          => 'Максимальная длина сообщения - 1000 символов',
        ];
    }
}
