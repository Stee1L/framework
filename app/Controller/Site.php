<?php

namespace Controller;

use Illuminate\Support\Facades\DB;
use Model\Cat;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;



class Site
{


    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function index(Request $request): string
    {
        if (app()->auth::user()->id_role===1){

            $users = User::all()->filter(fn(User $user)=>$user->id_role!==1)->all();
                 return (new View())->render('site.post', ['objects' => $users,'message'=>'Список пользователей']);

        }else{
            $posts = !is_null($request->id) ? Cat::where('id', $request->id)->get() : Cat::all();
            return (new View())->render('site.post', ['objects' => $posts, 'message'=>'Список котосотрудники']);
        }

    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/go');
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }



}
