<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ArticlesController;
use App\Http\Controllers\Api\SchoolsController;
use Illuminate\Http\Request;

use App\Http\Requests;

class SiteCOntroller extends Controller
{
    public function index(){
        return view('master');
    }
    public function category(){
        return view('include.detail');
    }
}
