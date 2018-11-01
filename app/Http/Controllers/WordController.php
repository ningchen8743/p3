<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordController extends Controller
{
    public function initializeView(Request $request)
    {
        return view('word.count-word')->with([
            'text' => $request->session()->get('text_cache', ''),
            'countSpace' => $request->session()->get('countSpace_cache', false),
            'wordOrChar' => $request->session()->get('wordOrChar_cache', 'word'),
            'countResult' => $request->session()->get('countResult_cache', ''),
        ]);
    }

    public function countWord(Request $request)
    {
        $countResult = 0;
        $charCount = 0;
        $spaceCount = 0;
        $wordCount = 0;

        $text = $request->input('textarea', null);
		
		$countSpace = false;
		if($request->has('countSpace'))
		{
			$countSpace = true;
		}
		
		$wordOrChar = $request->input('wordOrChar', 'word');		
		
		$charArray = str_split($text);
		foreach ($charArray as $char) 
		{
			++$countResult;
		}		
			
        if ($text) 
		{
            // perform calculation
            $charArray = str_split($text);
            $charCount = count($charArray);
            foreach ($charArray as $char) 
			{
                if ($char == ' ') 
				{
                    ++$spaceCount;
                }
            }

            $wordArray = explode(" ", $text);
            foreach ($wordArray as $word) 
			{
                if ($word != '') 
				{
                    ++$wordCount;
                }
            }
        }
		
        // get result
        if ($countSpace) 
		{
            if ($wordOrChar == 'word') 
			{
                $countResult = $wordCount + $spaceCount;
            } else 
			{
                $countResult = $charCount;
            }
        } else 
		{
            if ($wordOrChar == 'word') 
			{
                $countResult = $wordCount;
            } else 
			{
                $countResult = $charCount - $spaceCount;
            }
        }

		$request->session()->put('text_cache', $text);
		$request->session()->put('countSpace_cache', $countSpace);
		$request->session()->put('wordOrChar_cache', $wordOrChar);
		$request->session()->put('countResult_cache', $countResult);
		
        return redirect('/count-word');
    }
}
