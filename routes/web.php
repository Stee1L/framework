<?php

use Src\Route;

Route::add('cats', [Controller\Site::class, 'index']);
Route::add('hello', [Controller\Site::class, 'hello']);
Route::add('', [Controller\Site::class, 'startPage']);
Route::add('signup', [Controller\Site::class, 'signup']);


