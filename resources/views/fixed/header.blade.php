<!DOCTYPE html>
<html>
<head>
    <title>AnoteZ - @yield('title_part')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content="Nikola Nedeljkovic"/>
    <meta name="copyright" content="RarOks 1008 Entertainment @ 2020"/>
    <meta name="robots" content="index,follow"/>
    <meta name="keywords" content="notes, anotez"/>
    <meta name="description" content="From any device access your notes."/>
    <meta name="abstract" content="Best notes app around."/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('style.css') }}"/>

    <script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script type="text/javascript" src="{{ asset('jquery.min.js') }}"></script>
    <script type="text/javascript">
        var csrf = '{{csrf_token()}}';
    </script>
</head>
<body>
<div class="header_holder">
    <a href="{{url('/')}}" >
        <h1>AnoteZ</h1>
    </a>
    @if(session()->has('user'))
        <a href="{{url('/logout')}}" class="login_logout_button">Logout</a>
    @else
        <a href="{{url('/login')}}" class="login_logout_button">Login</a>
    @endif
</div>
