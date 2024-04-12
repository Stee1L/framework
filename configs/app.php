<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity' => \Model\User::class,

    'validators' => [
        'required' => \Validators\RequireValidator::class,
        'unique' => \Validators\UniqueValidator::class,
        'year'=> \Validators\YearValid::class,
        'obscene'=>\Validators\ObsceneValid::class,
    ],

    //Классы для middleware
    'routeMiddleware' => [
        'auth' => \Middlewares\AuthMiddleware::class,
        'admin' => \Middlewares\RoleMiddleware::class
    ],

    'routeAppMiddleware' => [
        'csrf' => \Middlewares\CSRFMiddleware::class,
        'trim' => \Middlewares\TrimMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class,

    ],


];

