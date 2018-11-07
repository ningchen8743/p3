<!DOCTYPE html>
<html lang='en'>

<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>
    <link href='/css/p3.css' type='text/css' rel='stylesheet'>
</head>

<div>
    <body>

    <header>
        <a href='/'><img src='/images/WordCounter.png' id='logo' alt='WordCounter Logo'></a>
        @include('modules.nav')
    </header>
    <br>

    <section>
        @yield('content')
    </section>

    </body>
</div>

</html>