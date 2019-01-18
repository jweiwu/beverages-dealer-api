<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\User as UserResource;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        // if (!$token = auth()->attempt($credentials)) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        // $user = new UserResource(auth()->user());
        // return $user->additional(['meta' => ['token' => $token]]);

        $result = $this->authService->login($credentials);

        if ($result['success']) {
            return $result['data'];
        } else {
            return response()->json($result['data'], 401);
        }

    }

    public function register(UserRegisterRequest $request)
    {
        $instance = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = new UserResource(auth()->user());
        return $user->additional(['meta' => ['token' => $token]]);
    }

    public function user()
    {
        return new UserResource(auth()->user());
    }

    public function refresh()
    {
        return response()->json([
            'access_token' => auth()->refresh(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->noContent();
    }

}
