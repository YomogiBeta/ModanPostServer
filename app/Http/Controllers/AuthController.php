<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Auth\RegisterRequet;

use App\Http\Resources\UserResource;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * ログイン試行
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\Resources\Json\JsonResource
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::guard(config('auth.defaults.guard'))->attempt($credentials, true)) {
            $request->session()->regenerate();
            return UserResource::make(Auth::guard(config('auth.defaults.guard'))->user());
        }

        return response()->json(["status" => 401, "message" => "Failed login"], 401);
    }

    /**
     * アカウント登録試行
     *
     * @param  App\Http\Requests\Auth\RegisterRequet  $request
     * @return Illuminate\Http\Resources\Json\JsonResource
     */
    public function register(RegisterRequet $request)
    {
        $attributes = $request->validated();
        $attributes['password'] = Hash::make($attributes['password'], [
            'rounds' => 10,
        ]);
        $user = User::create($attributes);
        return UserResource::make($user);
    }

    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->noContent();
    }
}
