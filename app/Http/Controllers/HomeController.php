<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(){
        return view('frontend.site.index');
    }
    public function About(){
        return view('frontend.about');
    }
}
