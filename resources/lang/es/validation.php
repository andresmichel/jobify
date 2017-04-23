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

    // 'accepted'             => 'The :attribute must be accepted.',
    // 'active_url'           => 'The :attribute is not a valid URL.',
    // 'after'                => 'The :attribute must be a date after :date.',
    // 'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    // 'alpha'                => 'The :attribute may only contain letters.',
    // 'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    // 'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    // 'array'                => 'The :attribute must be an array.',
    // 'before'               => 'The :attribute must be a date before :date.',
    // 'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    // 'between'              => [
        // 'numeric' => 'The :attribute must be between :min and :max.',
        // 'file'    => 'The :attribute must be between :min and :max kilobytes.',
        // 'string'  => 'The :attribute must be between :min and :max characters.',
        // 'array'   => 'The :attribute must have between :min and :max items.',
    // ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'La confirmación del campo :attribute no coincide.',
    'date'                 => 'El campo :attribute no es una fecha válida.',
    'date_format'          => 'El campo :attribute no coincide con el formato :format.',
    // 'different'            => 'The :attribute and :other must be different.',
    // 'digits'               => 'The :attribute must be :digits digits.',
    // 'digits_between'       => 'The :attribute must be between :min and :max digits.',
    // 'dimensions'           => 'The :attribute has invalid image dimensions.',
    // 'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'El campo :attribute debe ser una dirección de correo válida.',
    // 'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    // 'filled'               => 'The :attribute field must have a value.',
    'image'                => 'El campo :attribute debe ser una imagen.',
    // 'in'                   => 'The selected :attribute is invalid.',
    // 'in_array'             => 'The :attribute field does not exist in :other.',
    // 'integer'              => 'The :attribute must be an integer.',
    // 'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'El campo :attribute debe ser en formato JSON.',
    'max'                  => [
        'numeric' => 'El campo :attribute no debe ser mayor a :max.',
        'file'    => 'El campo :attribute no debe ser mayor a :max kilobytes.',
        'string'  => 'El campo :attribute no debe tener más de :max caracteres.',
        'array'   => 'El campo :attribute no debe tener más de :max elementos.',
    ],
    'mimes'                => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El campo :attribute no debe ser menor a :min.',
        'file'    => 'El campo :attribute no debe ser menor a :min kilobytes.',
        'string'  => 'El campo :attribute no debe tener menos de :min caracteres.',
        'array'   => 'El campo :attribute no debe tener menos de :min elementos.',
    ],
    'not_in'               => 'El campo :attribute debe tener al menos un elemento.',
    'numeric'              => 'El campo :attribute debe ser un número.',
    // 'present'              => 'The :attribute field must be present.',
    // 'regex'                => 'The :attribute format is invalid.',
    'required'             => 'El campo :attribute es necesario.',
    // 'required_if'          => 'The :attribute field is required when :other is :value.',
    // 'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    // 'required_with'        => 'The :attribute field is required when :values is present.',
    // 'required_with_all'    => 'The :attribute field is required when :values is present.',
    // 'required_without'     => 'The :attribute field is required when :values is not present.',
    // 'required_without_all' => 'The :attribute field is required when none of :values are present.',
    // 'same'                 => 'The :attribute and :other must match.',
    // 'size'                 => [
        // 'numeric' => 'The :attribute must be :size.',
        // 'file'    => 'The :attribute must be :size kilobytes.',
        // 'string'  => 'The :attribute must be :size characters.',
        // 'array'   => 'The :attribute must contain :size items.',
    // ],
    'string'               => 'El campo :attribute debe ser texto.',
    // 'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'El valor del campo :attribute no está disponible.',
    // 'uploaded'             => 'The :attribute failed to upload.',
    // 'url'                  => 'The :attribute format is invalid.',

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
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
