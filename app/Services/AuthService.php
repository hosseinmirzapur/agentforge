<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function login(array $data): array
    {
        $user = User::where('username', $data['username'])->first();
        if (!$user) {
            throw new Exception('wrong_credentials', 400);
        }

        if (!Hash::check($data['password'], $user->password)) {
            throw new Exception('wrong_credentials', 400);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'token' => $token,
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    public function register(array $data): array
    {
        $data['password'] = Hash::make($data['password']);

        $user = User::createOrFirst($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'token' => $token,
        ];
    }
}