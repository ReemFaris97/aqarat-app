<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Auth;
use App\Http\Resources\UserResource;
use App\Models\User;

class AuthController extends Auth
{
    //
    public function gurad()
    {
        return 'api';
    }

    public function Model()
    {
        return User::class;
    }

    public function registrationRules(): array
    {

        return [
            'name' => 'required|string',
            'phone' => 'required|phone:eg,sa|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|string',
            'image' => 'sometimes|image',
            'fcm_token_android' => 'required_without:fcm_token_ios',
            'fcm_token_ios' => 'required_without:fcm_token_android',
        ];
    }

    public function updateProfileRules($user)
    {
        return[
            'name' => 'sometimes|string',
            'phone' => 'sometimes|phone:eg,sa|unique:users,phone',
            'email' => 'sometimes|email|unique:users,email',
            'password' => 'sometimes|min:6|string',
            'image' => 'sometimes|image',
        ];
    }

    public function loginRules(): array
    {
        return [
            'phone' => 'required|phone:eg,sa|exists:users,phone',
            'password' => 'required|min:6|string',
            'fcm_token_android' => 'required_without:fcm_token_ios',
            'fcm_token_ios' => 'required_without:fcm_token_android',
        ];
    }

    public function resource()
    {
        return UserResource::class;
    }
}
