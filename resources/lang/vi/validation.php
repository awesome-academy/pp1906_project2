<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute phải được chấp nhận.',
    'active_url' => 'Đường dẫn của :attribute không hợp lệ.',
    'before' => ':attribute phải trước ngày :date.',
    'after' => ':attribute phải sau ngày :date.',
    'after_or_equal' => ':attribute phải là ngày :date hoặc các ngày sau nó.',
    'between' => [
        'numeric' => ':attribute phải nằm trong khoảng từ :min đến :max.',
        'file' => ':attribute phải nằm trong khoảng từ :min đến :max kB.',
        'string' => ':attribute phải nằm trong khoảng từ :min đến :max ký tự.',
        'array' => ':attribute phải nằm trong khoảng từ :min đến :max phần tử.',
    ],
    'boolean' => ':attribute phải là true hoặc false.',
    'confirmed' => ':attribute không trùng khớp.',
    'date' => 'Định dạng ngày tháng của :attribute không hợp lệ.',
    'date_equals' => 'Ngày của :attribute phải là :date.',
    'date_format' => 'Định dạng của :attribute phải là :format.',
    'email' => ':attribute phải là địa chỉ email hợp lệ.',
    'exists' => ':attribute chỉ định không hợp lệ.',
    'file' => ':attribute phải là dạng file.',
    'max' => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file' => 'Dung lượng :attribute không được lớn hơn :max kB.',
        'string' => ':attribute không được lớn hơn :max ký tự.',
        'array' => ':attribute không được lớn hơn :max phần tử.',
    ],
    'mimes' => ':attribute phải là file dưới dạng: :values.',
    'mimetypes' => ':attribute phải là file dưới dạng: :values.',
    'min' => [
        'numeric' => ':attribute cần có số lượng ít nhất là :min.',
        'file' => 'Dung lượng của :attribute ít nhất :min kB.',
        'string' => ':attribute cần ít nhất :min ký tự.',
        'array' => ':attribute cần ít nhất :min phần tử.',
    ],
    'numeric' => ':attribute phải dưới dạng số.',
    'password' => 'Mật khẩu không chính xác.',
    'required' => 'Trường :attribute là bắt buộc.',
    'same' => ':attribute và :other phải giống nhau.',
    'size' => [
        'numeric' => ':attribute phải là :size.',
        'file' => 'Kích cỡ :attribute phải là :size kB.',
        'string' => ':attribute phải chứa :size ký tự.',
        'array' => ':attribute phải chứa :size phần tử.',
    ],
    'string' => 'Trường :attribute phải dưới dạng chữ.',
    'unique' => ':attribute đã tồn tại.',
    'uploaded' => 'Tải :attribute lên thất bại.',
    'image' => ':attribute phải là dạng ảnh.',
    'in' => ':attribute đã chọn không hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message'
        ],
        'datetimepicker' => [
            'before' => ':attribute phải trước ngày hôm nay.'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'new_password' => 'Mật khẩu mới',
        'new_password_confirm' => 'Mật khẩu mới',
        'current_password' => 'Mật khẩu hiện tại',
        'name' => 'Họ và tên',
        'gender' => 'Giới tính',
        'language' => 'Ngôn ngữ',
        'datetimepicker' => 'Ngày sinh',
        'content' => 'Nội dung',
        'type' => 'Kiểu',
        'image.*' => 'Ảnh',
        'image' => 'Ảnh',
    ],

];
