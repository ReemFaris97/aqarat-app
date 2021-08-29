<?php


namespace App\Http\Controllers;


use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

abstract class Auth extends Controller implements iAuth
{

    public function __construct()
    {

       auth()->shouldUse($this->gurad());
    }

    public function loginCredentials()
    {
        return [
            'phone','password'
        ];
    }
    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate($this->registrationRules());
        \DB::beginTransaction();
        $user = $this->Model()::create($validated);
//        $user->logout = $user->devices()->create($validated)->refresh()->id;
        $user->token = \JWTAuth::fromUser($user);
        \DB::commit();
        $resource= $this->resource();
        return \responder::success(new $resource($user));
    }

    public function login(Request $request)
    {
        $validated = $request->validate($this->loginRules());
        $attemp = auth()->attempt($request->only($this->loginCredentials()));
        if (!$attemp) {
            return \responder::error("wrong credentials");
        }
        if ( auth()->user()->is_active != 1){
            return \responder::error("account not active");
        }
        $user =  auth()->user();

        $user->token = \JWTAuth::fromUser($user);
        $resource= $this->resource();
        return \responder::success(new $resource($user));
    }

    public function profile()
    {
        $user = auth()->user();
        $user->token = \JWTAuth::fromUser($user);
        $resource= $this->resource();
        return \responder::success(new $resource($user));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate($this->updateProfileRules($user));
        $user->update($validated);
        $user->token = \JWTAuth::fromUser($user);
        $resource= $this->resource();
        return \responder::success(new $resource($user));
    }

    public function updateProfileRules($user)
    {
        return [
            'name' => 'sometimes',
            'email' => 'sometimes|email|unique:users,' . $user->id,
            'phone' => 'sometimes|phone:eg,sa|unique:users,phone,' . $user->id,
            'password' => 'sometimes',
        ];
    }

    public function logout(Request $request)
    {
        auth()->user()->update(['fcm_token_android' => null,'fcm_token_ios' => null]);
        auth()->logout();
        return \responder::success(__('logged out successfully !'));
    }
}
