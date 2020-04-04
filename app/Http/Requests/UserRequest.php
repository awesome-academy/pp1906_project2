<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $gender = config('user.gender');
        $languageSetting = config('user.language');

        return [
            'name' => 'min:6|max:50',
            'gender' => [
                Rule::in($gender)
            ],
            'birthday' => 'date|date_format:Y-m-d',
            'language' => [
                Rule::in($languageSetting),
            ],
        ];
    }
}
