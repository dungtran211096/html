<?php

namespace App\Http\Controllers\Api;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use App\User;
use App\Http\Requests\Api\AuthenticateRequest;

class AuthController extends Controller
{

    protected $statusCode = 200;

    function __construct()
    {
        $this->middleware('cors');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $credentials['admin'] = true;
        $credentials['active'] = true;
        // verify the credentials and create a token for the user
        $token = JWTAuth::attempt($credentials);
        if ($token) {
            $object = User::where('username', $credentials['username'])->first();
            $user = [
                'username' => $object->username,
                'name' => $object->name,
                'avatar' => $object->avatar,
                'email' => $object->email
            ];
            return response()->json(compact('token', 'user'))->withCookie(cookie('auth_token', $token));
        } else {
            return $this->respondWrongEmailOrPassword();
        }

        // if no errors are encountered we can return a JWT
    }

    protected function respondWrongEmailOrPassword()
    {
        return response()->json([
            'error' => [
                'code' => 'BAD_REQUEST',
                'http_code' => 400,
                'message' => 'Sai tài khoản hoặc mật khẩu'
            ]
        ], 400);
    }

    protected function respondCouldNotCreateToken()
    {
        return response()->json([
            'error' => [
                'code' => 'SERVER_ERROR',
                'http_code' => 500,
                'message' => 'could not create token'
            ]
        ], 500);
    }

    public function logout(Request $request)
    {
        // todo : handle request 
        return response('', 204)->withCookie(cookie()->forget('auth_token'));
    }

}
