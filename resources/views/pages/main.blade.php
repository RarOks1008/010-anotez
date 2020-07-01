@extends('layouts.index')
@section('title_part')
    My notes
@endsection
@section('middle_part')
    <h2>My notes</h2>
    <p class="note_count">{{$note_count}} notes</p>
    @include("partials.notes_filter")
    <div id="my_notes"></div>
    <p class="error_text">
        @if(session()->has('message'))
            {{ session('message') }}
        @endif
    </p>
    @if(strtolower(session('user')->name) == 'admin')
        <a class="admin_panel_link" href="{{url('/admin')}}"><p>Click here to visit admin panel..</p></a>
    @endif
    <a class="admin_panel_link" href="{{url('/contact')}}"><p>Click here to contact us..</p></a>
    <script type="text/javascript" src="{{ asset('search.js') }}"></script>
@endsection
@include('partials.addnote')
