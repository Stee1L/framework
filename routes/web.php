<?php

use Src\Route;
use Illuminate\Http\Request;


Route::add('GET', '/hello', [Controller\Site::class, 'index'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])
    ->middleware('admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/creatCats', [Controller\Site::class, 'creatCat']);
Route::add(['GET', 'POST'], '/creatDivision', [Controller\Site::class, 'creatDivision']);





