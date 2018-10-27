@extends('layouts.master')

@section('content')

<form method='GET' action='/count-process' id='word_count'>
    <label>Write down sentences (do not enter line break!)</label>
    <br>
    <textarea form='word_count'
              name='textarea'
              rows="3" cols="40"
              placeholder='Type in your text here...'
              rows=5 value='{{$text}}'></textarea>
    <br><br>


    <input type='checkbox'
           name='countSpace'
        {{($countSpace) ? 'checked' : ''}}
        >
    <label>Count space character</label>
    <br><br>

    <label>Count by character or word </label>
    <select name='wordOrChar' form='word_count'>
        <option value='character'
            @if (isset($wordOrChar_cache) && $wordOrChar_cache == 'character')
                {{"selected"}}
            @else
                {{""}}
            @endif
            >Character
        </option>
        <option value='word'
            @if (isset($wordOrChar_cache) && $wordOrChar_cache == 'word')
                {{"selected"}}
            @else
                {{""}}
            @endif
            >Word
        </option>
    </select>
    <br><br><br>

    <fieldset>
        <legend>Count result</legend>
        <br>
        <output> @if (isset($countResult_cache)) {{$countResult_cache}} @endif </output>
    </fieldset>

    <br><br>

    <input type='submit' value='Count!'>
</form>

@endsection