@extends('layouts.master')

@section('content')

<form method='GET' action='/count-word-calculate' id='word_count'>
    <label>Write down sentences (do not enter line break!)</label>
    <br>
    @if($errors->any())
        <textarea form='word_count'
                  name='textarea'
                  rows="3" cols="40"
                  placeholder='Type in your text here...'
                  rows=5>{{ old('textarea') }}</textarea>
        <br><br>
            <div class='error'>{{ $errors->first('textarea') }}</div>
    @else
        <textarea form='word_count'
                  name='textarea'
                  rows="3" cols="40"
                  placeholder='Type in your text here...'
                  rows=5>{{ $text }}</textarea>
        <br><br>
    @endif


	<input type='checkbox' name='countSpace' {{ ($countSpace) ? 'checked' : '' }}>
	<label>Count space character</label>
	<br><br>
		
	<label>Count by character or word </label>
	<select name='wordOrChar' form='word_count'>
		@if (isset($wordOrChar) && $wordOrChar == 'character')
			<option value='character' selected>Character</option>
			<option value='word'>Word</option>
		@else
			<option value='character'>Character</option>
			<option value='word' selected>Word</option>			
		@endif
		
	</select>
	<br><br><br>

		
		
    <fieldset>
        <legend>Count result</legend>
        <br>
        <output> {{ $countResult }} </output>
    </fieldset>

    <br><br>

    <input type='submit' value='Count!'>
</form>

@endsection