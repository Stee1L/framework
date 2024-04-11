<?php

namespace Controller;

use Illuminate\Support\Facades\DB;
use Model\Cat;
use Model\Composition;
use Model\Division;
use Model\Position;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Model\View as ViewData;
use Src\Validator\Validator;



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
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
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

    public function creatCat(Request $request): string
    {


        $composition =  Composition::all();
        $position =  Position::all();
        $division =  Division::all();

        if ($request->method === 'POST' && Cat::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.creatCats', ['compositions' => $composition,
            'divisions' => $division, 'positions' => $position,]);
    }

    public function creatDivision(Request $request): string
    {

        $views =  ViewData::all();

        if ($request->method === 'POST' && Division::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.creatDivision', ['views' => $views]);
    }





}
