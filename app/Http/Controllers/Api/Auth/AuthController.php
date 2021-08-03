<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Auth;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use responder;
use Tymon\JWTAuth\Facades\JWTAuth;

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
            'phone' => 'sometimes|phone:eg,sa|unique:users,phone,'.$user->id,
            'email' => 'sometimes|email|unique:users,email,'.$user->id,
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

    public function forgetPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:users,phone',
        ]);
        $user = User::where('phone', $request->phone);
        $user->first()->update([
            'reset_code' => 123456,
            'reset_sent_at' => now()->toDateTimeString()
        ]);

        return \responder::success(__('reset code sent successfully !'));
    }

    public function checkCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:users,phone',
            'code' => 'required'
        ]);
        $user = User::where('phone', $request->phone)->where('reset_code', $request->code)->exists();

        return responder::success($user);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:users,phone',
            'code' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('phone', $request->phone)->where('reset_code', $request->code)->first();
        if (!$user) return responder::error(__('wrong reset code '));

        $user->update([
            'password' => $request->password,
            'reset_code' => Str::random(15)
        ]);
        $user->token = JWTAuth::fromUser($user);
        return responder::success(new UserResource($user));
    }
}
