<?php

namespace Controller;

use Illuminate\Support\Facades\DB;
use Model\Cat;
use Src\View;

class Site
{
    public function index(): string
    {
        $posts = Cat::all();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }
}
