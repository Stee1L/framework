<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class RoleMiddleware
{
    public function handle(Request $request)
    {

        if (Auth::user()->id_role!==1) {

            return;

        }
    }
}