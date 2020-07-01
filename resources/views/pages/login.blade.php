@extends('layouts.index')
@section('title_part')
    Login
@endsection
@section('middle_part')
    <h2>Login</h2>
    <form action="{{ url("/login") }}" method="POST" onsubmit="return login_check()">
        @csrf
        <div class="divform">
            <label>Email:</label>
            <input type="email" name="email" id="email" placeholder="someone@something.com"/>
        </div>
        <div class="divform">
            <label>Password:</label>
            <input type="password" name="password" id="password" placeholder="******"/>
        </div>
        <div class="divform">
            <input type="submit" name="btnLogin" value="Login"/>
        </div>
        <p class="error_text" id="error_text_place">
            @if(session()->has('message'))
                {{ session('message') }}
            @endif
            @isset($errors)
                @foreach(($errors->all()) as $er)
                    {{$er}}
                @endforeach
            @endisset
        </p>
    </form>
    <a class="login_register_link" href="{{url('/register')}}">Don't have an account? Click here to register...</a>
@endsection
