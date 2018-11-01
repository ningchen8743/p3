<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorHandlerController extends Controller
{
    public function abort()
    {
        return view('errors.404');

    }
}
