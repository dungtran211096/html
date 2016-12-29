<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use App\Http\Controllers\Api\ArticlesController;
use App\Http\Controllers\Api\SchoolsController;
use App\Http\Controllers\Api\UsersController;
use App\Question;
use App\School;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class SiteController extends Controller
{
    function __construct()
    {
        View::share([
            'categories' => ArticleCategory::active()->get(),
            'user' => Auth::user()
        ]);
    }

    public function index()
    {
        return view('master');
    }

    public function category($slug)
    {
        $cat = ArticleCategory::findBySlugOrFail($slug);
        $articles = $cat->articles()->active()->paginate(getOption('max_article_1_page', 10));
        return view('category', compact([
            'articles', 'cat'
        ]));
    }

    public function question()
    {
        $questions = Question::active()->paginate(getOption('max_article_1_page', 10));
        return view('question', compact(['questions']));
    }

    public function gioiThieu()
    {
        return view('gioithieu');
    }

    public function info()
    {
        return view('thongtincanhan');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Requests\LoginRequest $request)
    {
        $input = $request->only(['email', 'password']);
        if (Auth::attempt($input, $request->get('remember'))) {
            return redirect()->intended();
        }
        return back()->with('error', 1);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();
        return back();
    }

    public function postRegister(Requests\RegisterRequest $request)
    {
        $input = $request->only(['email', 'password', 'name']);
        $input['password'] = bcrypt($input['password']);
        Auth::login(User::create($input));
        return redirect()->route('home');
    }

    public function guongMatTieuBieu(Request $request, $slug = null)
    {
        if ($slug) {
            $school = School::findBySlugOrFail($slug);
            $users = $school->users()->toter()->active();
        } else {
            $users = User::toter()->active();
        }
        if ($name = $request->get('name')) {
            $users->where('name', 'LIKE', "%$name%");
        }
        $users = $users->get();
        $schools = School::active()->get();
        return view('bangxephang', compact('schools', 'users'));
    }
}
