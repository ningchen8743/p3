<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordController extends Controller
{
    public function textArea(){
        return 'Show the criteria and the text area';
    }

    public function countResult(){
        return 'Show the count result and redirect user back to the textArea page';
    }
}
