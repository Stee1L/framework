<?php

use Src\Route;

Route::add('cats', [Controller\Site::class, 'index']);
Route::add('hello', [Controller\Site::class, 'hello']);
Route::add('signup', [Controller\Site::class, 'signup']);
Route::add('login', [Controller\Site::class, 'login']);
Route::add('logout', [Controller\Site::class, 'logout']);


