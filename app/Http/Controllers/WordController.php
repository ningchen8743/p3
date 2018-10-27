<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordController extends Controller
{
    public function textArea(Request $request)
    {
        return view('word.textarea')->with([
            'text' => $request->session()->get('text', ''),
            'countSpace' => $request->session()->get('countSpace', false),
            'wordOrChar' => $request->session()->get('wordOrChar', false),
            'countResult' => $request->session()->get('countResult', ''),
        ]);
    }

    public function countProcess(Request $request)
    {
        $countResult = 0;
        $charCount = 0;
        $spaceCount = 0;
        $wordCount = 0;

        $text = $request->input('text', null);

        if ($text) {
            // perform calculation
            $charArray = str_split($text);
            $charCount = count($charArray);
            foreach ($charArray as $char) {
                if ($char == ' ') {
                    ++$spaceCount;
                }
            }

            $wordArray = explode(" ", $text);
            foreach ($wordArray as $word) {
                if ($word != '') {
                    ++$wordCount;
                }
            }
        }
            // get result
            if ($request->has('countSpace')) {
                if ($wordOrChar == 'word') {
                    $countResult = $wordCount + $spaceCount;
                } else {
                    $countResult = $charCount;
                }
            } else {
                if ($wordOrChar == 'word') {
                    $countResult = $wordCount;
                } else {
                    $countResult = $charCount - $spaceCount;
                }
            }
        return redirect('/text-area')->with([
            'text' => $text,
            'countSpace' => $request->has('countSpace'),
            'countResult' => $countResult,
        ]);
    }
}
