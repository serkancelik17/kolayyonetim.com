<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request)
    {

        $loginData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $loginData = $this->credentials($request);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }

    protected function credentials(Request $request)
    {
        if(is_numeric($request->get('email'))){
            return ['phone_number'=>$request->get('email'),'password'=>$request->get('password')];
        }
        return ['email' => $request->get('email'), 'password'=>$request->get('password')];

        /*
        elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {

        }*/
        //return ['username' => $request->get('email'), 'password'=>$request->get('password')];
    }
}
