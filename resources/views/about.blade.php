@extends('layouts.master')

@section('content')

<ul>
    <li>@include('modules.description')</li>
    <li>This app was created as a prove of concept for CSCI E-15 Dynamic Web Application.</li>
    <li>Line break is prohibited when typing in words/characters into the text box. A warning note is left beside the text box.</li>
    <li>Empty input and numeric values are not accepted as valid.</li>
    <li>The source code of the app can be found here:
    <a href='https://github.com/ningchen8743/p3'>View on Github</a>
    </li>
    <li>Logo design credit: <a href='https://www.freelogoservices.com/home-return'>The FreeLogoServices</a></li>
</ul>

@endsection