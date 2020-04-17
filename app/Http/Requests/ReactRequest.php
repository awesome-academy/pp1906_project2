<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReactRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $type = config('react');

        return [
            'reactable_id' => 'required',
            'type' => [
                Rule::in($type),
            ],
        ];
    }
}
