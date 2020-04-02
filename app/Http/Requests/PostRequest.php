<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $type = config('post.type');

        return [
            'content' => 'required',
            'type' => [
                'required',
                Rule::in($type),
            ],
        ];
    }
}
