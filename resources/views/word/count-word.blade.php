@extends('layouts.master')

@section('content')

    <form method='GET' action='/count-word-calculate' id='word_count'>
        <label>Write down sentences (do not enter line break!)</label>
        <br>

        <textarea form='word_count'
                  name='textarea'
                  rows="3" cols="40"
                  placeholder='Type in your text here...'
                  rows=5>{{ $text }}</textarea>
        @if($errMsg != '')
            <div class='error'>{{ $errMsg }}</div>
        @endif
        <br><br>

        <input type='checkbox' name='countSpace' {{ $countSpace ? 'checked' : '' }}>
        <label>Count space character</label>
        <br><br>

        <label>Count by character or word </label>
        <select name='wordOrChar' form='word_count'>
            @if ($wordOrChar == 'character')
                <option value='character' selected>Character</option>
                <option value='word'>Word</option>
            @else
                <option value='character'>Character</option>
                <option value='word' selected>Word</option>
            @endif

        </select>
        <br><br>


        <fieldset>
            <legend>Count result</legend>
            <br>
            <output> {{ $countResult }} </output>
        </fieldset>

        <br>

        <input type='submit' value='Count!'>
    </form>

@endsection