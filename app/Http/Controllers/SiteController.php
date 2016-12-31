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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class SiteController extends Controller
{
    private $user;

    function __construct()
    {
        $this->user = Auth::user();
        View::share([
            'categories' => ArticleCategory::active()->get(),
            'user' => $this->user
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
        $is_question = true;
        $questions = Question::active()->paginate(getOption('max_article_1_page', 10));
        return view('question', compact(['questions', 'is_question']));
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
        $input = $request->only(['email', 'password', 'name', 'school_id']);
        $input['password'] = bcrypt($input['password']);
        $input['active'] = 1;
        Auth::login(User::create($input));
        return redirect()->route('home');
    }

    public function guongMatTieuBieu(Request $request, $slug = null)
    {
        return $this->showUsers($request, $slug);
    }

    public function bangXepHang(Request $request, $slug = null)
    {
        return $this->showUsers($request, $slug, 0);
    }

    private function showUsers(Request $request, $slug = null, $is5tot = true)
    {
        $a = $is5tot ? 'toter' : 'notToter';
        $route = $is5tot ? 'guongMatTieuBieu' : 'bangXepHang';
        if ($slug) {
            $school = School::findBySlugOrFail($slug);
            $users = $school->users()->$a()->active();
        } else {
            $users = User::$a()->active();
        }
        if ($name = $request->get('name')) {
            $users->where('name', 'LIKE', "%$name%");
        }
        $users = $users->get();
        $schools = School::active()->get();
        return view('bangxephang', compact('schools', 'users', 'route'));
    }

    public function thongTinCaNhan()
    {
        $questions = [
            'daoduc' => 'đạo đức',
            'hoctap' => 'học tập',
            'theluc' => 'thể lực',
            'tinhnguyen' => 'tình nguyện',
            'hoinhap' => 'hội nhập'
        ];
        return view('thongtincanhan', compact('questions'));
    }

    public function postThongTinCaNhan(Request $request)
    {
        $input = $request->only('password', 'name', 'msv', 'birthday', 'newPassword');
        if (Hash::check($input['password'], $this->user->password)) {
            $input['password'] = $input['newPassword'] ? bcrypt($input['newPassword']) : bcrypt($input['password']);
            $this->user->update($input);
            $this->user->newData = $request->get('data');
        } else {
            return back()->with('error', 1)->withInput();
        }
        return back();
    }

    public function article($slug)
    {
        $article = Article::findBySlugOrFail($slug);
        return view('article', compact('article'));
    }

    public function questionDetail($slug)
    {
        $article = Question::findBySlugOrFail($slug);
        return view('article', compact('article'));
    }

    public function userInfo($id)
    {
        $u = User::findOrFail($id);
        $questions = [
            'daoduc' => 'đạo đức',
            'hoctap' => 'học tập',
            'theluc' => 'thể lực',
            'tinhnguyen' => 'tình nguyện',
            'hoinhap' => 'hội nhập'
        ];
        return view('userInfo', compact('u', 'questions'));
    }
}
