<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordController extends Controller
{
    public function textArea(){
        return view('word.textarea');
    }

    public function countResult(){
        return view('word.countresult');
    }
}
