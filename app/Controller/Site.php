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
            $posts = null;
            $age = null;
            $posts = !is_null($request->id_composition) ? Cat::where('id_composition', $request->id_composition)->get() : Cat::all();
            if (!is_null($request->id_composition)){
                Cat::where('id_composition', $request->id_composition)->get();
            }
            elseif (!is_null($request->id_divisions)) {
                $posts = Cat::where('id_division', $request->id_divisions)->get();
                if ($posts->sum(fn(Cat $cat)=>$cat->getAge()) > 0) {
                    $age = $posts->sum(fn(Cat $cat)=>$cat->getAge()) / $posts->count();
                }

            } /*elseif (!is_null($request->id_position)) {
                $posts = Cat::where('id_position', $request->id_position)->get();
            }*/ else {
                $posts = Cat::all();
            }
            $compositions = Composition::all();
            return (new View())->render('site.post', ['compositions' => $compositions, 'divisions'=> Division::all(),
                'positions'=>Position::all(),
                'objects' => $posts, 'message'=>'Список котосотрудники', 'age'=>$age]);

        }

    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required', 'obscene'],
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

        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required', 'obscene'],
                'Last_name' => ['required', 'obscene'],
                'Patronymic' => ['required', 'obscene'],
                'gender'=>['required'],
                'Date_birth'=>['required', 'year']
            ], [
                'required' => 'Поле :field пусто',
                'obscene'=>'Поле :field содержит мат',
                'year'=>'Поле :field не валидно'
            ]);

            if($validator->fails()){
                return new View('site.creatCats',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'compositions' => $composition,
                        'divisions' => $division, 'positions' => $position]);
            }

            Cat::create($request->all());
            app()->route->redirect('/hello');
        }
        return new View('site.creatCats', ['compositions' => $composition,
            'divisions' => $division, 'positions' => $position]);
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
