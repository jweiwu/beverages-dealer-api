<?php

namespace App\Services;

use App\Http\Resources\User as UserResource;

class AuthService
{
    public function login(array $credentials)
    {
        if (!$token = auth()->attempt($credentials)) {
            return [
                'success' => false,
                'data' => ['error' => 'Unauthorized'],
            ];
        }

        $user = new UserResource(auth()->user());

        return [
            'success' => true,
            'data' => $user->additional(['meta' => ['token' => $token]]),
        ];
    }
}
