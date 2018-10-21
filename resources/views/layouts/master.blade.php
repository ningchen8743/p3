<!DOCTYPE html>
<html lang='en'>

<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>
    <link href='/css/app.css' type='text/css' rel='stylesheet'>
    @stack('head')
</head>
<body>

<header>
    <a href='/'><img src='/images/WordCounter.png' id='logo' alt='WordCounter Logo'></a>
</header>

<section>
    @yield('content')
</section>

@stack('body')
</body>
</html>