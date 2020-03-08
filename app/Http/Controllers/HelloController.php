<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function beginnerShow(){
        // return 'this is the beginner game';
        return view('about');
    }
    public function guruShow(){
        return 'this is the guru game';
    }
    public function ShowContact(){
        return view('contact');
    }
   
}
