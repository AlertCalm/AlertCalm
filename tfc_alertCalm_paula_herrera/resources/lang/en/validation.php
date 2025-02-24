<?php
return [
    'required' => 'The :attribute field is required.',
    'email' => 'The :attribute must be a valid email address.',
    'max' => [
        'string' => 'The :attribute may not be greater than :max characters.',
    ],
    'unique' => 'The :attribute has already been taken.', // Para el error de correo duplicado
    'numeric' => 'The :attribute must be a number.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
    ],
    'string' => 'The :attribute must be a string.',
    'array' => 'The :attribute must be an array.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'timezone' => 'The :attribute must be a valid zone.',
];
