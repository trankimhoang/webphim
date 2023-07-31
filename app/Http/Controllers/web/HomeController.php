<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('pages.home');
    }
    public function category(){
        return view('pages.category');
    }
    public function genre(){
        return view('pages.genre');
    }
    public function country(){
        return view('pages.country');
    }
    public function movie(){
        return view('pages.movie');
    }
    public function watch(){
        return view('pages.watch');
    }
    public function episode(){
        return view('pages.episode');
    }
}
