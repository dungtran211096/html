<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use App\Http\Controllers\Api\ArticlesController;
use App\Http\Controllers\Api\SchoolsController;
use App\School;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Namshi\JOSE\JWS;
use Namshi\JOSE\JWT;
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
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
        $var = true;
        return view('include.authentication.register',compact('var'));
    }
}
