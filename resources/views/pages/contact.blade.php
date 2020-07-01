@extends('layouts.index')
@section('title_part')
    Contact Us
@endsection
@section('middle_part')
    <h2>Contact:</h2>
    <form class="contact_form" action="{{url('contact_us')}}" method="POST" onsubmit="return contact_check()">
        @csrf
        <label>Title: </label>
        <input type="text" id="title" name="title"/>
        <label>Content: </label>
        <textarea name="content" id="content" rows="15" columns="50"></textarea>
        <div>
            <input type="submit" value="Submit" name="note_submit"/>
            <a href="{{url('/')}}">Back</a>
        </div>
        <p class="error_text">
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
@endsection
