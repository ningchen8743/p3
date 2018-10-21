@extends('layouts.master')

@section('content')

<p>Word counter is a small app that calculates the number of words/characters for your input.</p>

<form action="/text-area">
    <input type="submit" value="Get Started!" />
</form>

@endsection