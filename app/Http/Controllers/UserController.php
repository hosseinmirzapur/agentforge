<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function __construct(private readonly AuthService $authService) {}

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function login(Request $request): JsonResponse
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => Password::required(),
        ]);

        return response()->json(
            $this->authService->login($data),
        );
    }

    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();

        return response()->json(
            $this->authService->register($data),
        );
    }
}
