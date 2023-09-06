<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $listCategory = Category::all();
        $listGenre = Genre::all();
        $listCountry = Country::all();
        return view('web.home.index', compact('listCategory', 'listGenre', 'listCountry'));
    }

}
