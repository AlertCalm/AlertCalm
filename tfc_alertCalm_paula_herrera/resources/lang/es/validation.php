<?php
return [
    'required' => 'El campo :attribute es obligatorio.',
    'email' => 'El campo :attribute debe ser una dirección de correo válida.',
    'unique' => 'El :attribute ya está registrado.',
    'max' => [
        'string' => 'El campo :attribute no puede ser mayor de :max caracteres.',
    ],
    'regex' => 'El campo :attribute debe tener un formato válido.',
    'numeric' => 'El campo :attribute debe ser un número.',
    'between' => [
        'numeric' => 'El campo :attribute debe estar entre :min y :max.',
        'file' => 'El campo :attribute debe tener entre :min y :max kilobytes.',
    ],
    'string' => 'El campo :attribute debe ser una cadena de texto.',
    'array' => 'El campo :attribute debe ser un arreglo.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'date' => 'El campo :attribute no es una fecha válida.',
    'timezone' => 'El campo :attribute debe ser una zona horaria válida.',
    'password' => [
        'min' => 'La :attribute debe tener al menos :min caracteres.',
        'regex' => 'La :attribute debe contener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial.',
    ],
    'user_id.required' => 'El campo de usuario es obligatorio.',
    'user_id.exists' => 'El usuario seleccionado no existe.',
    'alert_id.exists' => 'La alerta seleccionada no existe.',
    'mensaje.required' => 'El mensaje es obligatorio.',
    'mensaje.string' => 'El mensaje debe ser una cadena de texto.',
    'mensaje.max' => 'El mensaje no puede tener más de 255 caracteres.'

];
