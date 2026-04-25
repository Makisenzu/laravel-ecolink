<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return $this->unauthorized('Invalid credentials');
        }
        if (! $user->is_active) {
            return $this->forbidden('Your account has been deactivated. Please contact the administrator.');
        }
        $user->update(['last_login_at' => now()]);
        $token = $user->createToken('auth-token')->plainTextToken;
        $user->load('roles.permissions', 'person.contactInformation', 'person.addresses', 'staff.office');
        return $this->success([
            'token' => $token,
            'user' => new UserResource($user),
        ], 'Login successful');
    }
}
