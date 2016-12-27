<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use App\Http\Controllers\Api\ArticlesController;
use App\Http\Controllers\Api\SchoolsController;
use App\School;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    function __construct()
    {
        View::share([
            'schools' => ArticleCategory::active()->get()
        ]);
    }

    public function index()
    {
        return view('master');
    }

    public function category($slug)
    {

        $articles = ArticleCategory::findBySlug($slug)->articles()->get();
        // dd($articles);
        return view('include.detail', compact('articles'));
    }

    public function login()
    {
        return view('include.authentication.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //verify $credentials and create token for users
        $token = JWTAuth::attempt($credentials);
        if($token){
            return redirect()->route('home');
            //  return response()->json(compact('token'))->withCookie(cookie('auth_token', $token));
        }
        else{
            return $this->WrongEmailOrPassword();
        }
    }

    protected function WrongEmailOrPassword(){
        return response()->json([
            'error' => [
                'code' => 'BAD_REQUEST',
                'http_code' => 400,
                'message' => 'Sai email hoac mat khau'
                ]
        ], 400);
    }

    public function register()
    {
        $var = false;
        return view('include.authentication.register',compact('var'));
    }

    public function postRegister(Requests\RegisterRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
        $var = true;
        return view('include.authentication.register',compact('var'));
    }
}
