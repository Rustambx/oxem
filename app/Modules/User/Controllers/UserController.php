<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UserService;

class UserController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function signIn()
    {
        return UserService::signIn();
    }

    public function signUp (Request $request)
    {
        return UserService::signUp($request);
    }
}
