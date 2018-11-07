<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

class WordController extends Controller
{
    public function initializeView(Request $request)
    {
        $text        = $request->session()->get('text'        , ''        );
        $countSpace  = $request->session()->get('countSpace'  , false     );
        $wordOrChar  = $request->session()->get('wordOrChar'  , 'word'    );
        $countResult = $request->session()->get('countResult' , ''        );
        $errMsg      = $request->session()->get('errMsg'      , ''        );

        return view('word.count-word')->with(['text'        => $text,
                                              'countSpace'  => $countSpace,
                                              'wordOrChar'  => $wordOrChar,
                                              'countResult' => $countResult,
                                              'errMsg'      => $errMsg]);
    }

    public function countWord(Request $request)
    {
        // use custom validator instead of the validate() function
        // because it gives much much better control:
        // when the validation fails, custom validator continues executing
        // the subsequent code instead of skipping it, which is highly desired
        $validator = Validator::make($request->all(), [
            'textarea' => 'required|regex:/^[a-zA-Z ]+$/'
        ]);

        // get user input 1
        $text = $request->input('textarea');

        // get user input 2
        $countSpace = false;
        if($request->has('countSpace'))
        {
            $countSpace = true;
        }

        // get user input 3
        $wordOrChar = $request->input('wordOrChar');

        // initialize other data that will be returned
        $countResult = '';
        $errMsg = '';

        if($validator->fails())
        {
            $errMsg = $validator->errors()->first('textarea');
        }
        else
        {
            $countResult = 0;
            $charCount = 0;
            $spaceCount = 0;
            $wordCount = 0;

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
        }

        $request->session()->flash('text'        , $text        );
        $request->session()->flash('countSpace'  , $countSpace  );
        $request->session()->flash('wordOrChar'  , $wordOrChar  );
        $request->session()->flash('countResult' , $countResult );
        $request->session()->flash('errMsg'      , $errMsg      );

        return redirect('/count-word');
    }
}
