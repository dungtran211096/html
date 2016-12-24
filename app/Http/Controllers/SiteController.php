<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use App\Http\Controllers\Api\ArticlesController;
use App\Http\Controllers\Api\SchoolsController;
use App\School;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;

class SiteController extends Controller
{
    function __construct()
    {
        View::share([
            'schools' => ArticleCategory::active()->get()
        ]);
    }

    public function index(){
        return view('master');
    }
    public function category($slug){

        $articles = ArticleCategory::findBySlug($slug)->articles()->get();
       // dd($articles);
        return view('include.detail', compact('articles'));
    }

    public function login(){
        return view('include.authentication.login');
    }

    public function register(){
        return view('include.authentication.register');
    }
}
