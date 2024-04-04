<?php

namespace Controller;

use Illuminate\Support\Facades\DB;
use Model\Cat;
use Src\View;
use Src\Request;
use Model\User;


class Site
{


    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function index(Request $request): string
    {
        $posts = !is_null($request->id) ? Cat::where('id', $request->id)->get() : Cat::all();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function signup(Request $request): string
    {
        if ($request->method==='POST' && User::create($request->all())){
            return new View('site.signup', ['message'=>'Вы успешно зарегистрированы']);
        }
        return new View('site.signup');
    }


}
