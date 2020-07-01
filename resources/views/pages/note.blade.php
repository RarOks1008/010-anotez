@extends('layouts.index')
@section('title_part')
    @isset($note)
        {{$note->title}}
    @else
        Add note
    @endisset
@endsection
@section('middle_part')
    @isset($note)
        <h2>Edit Note</h2>
    @else
        <h2>Add note</h2>
    @endisset
    <form class="note_form" action="@isset($note) {{url("/editnote")}} @else {{url("/addnote")}} @endisset" method="POST" onsubmit="return note_check()">
        @csrf
        <select name="note_category" id="note_category">
            @foreach( $categories as $cat)
                <option value="{{$cat->id}}" @isset($note) @if($note->name==$cat->name) selected @endif @endisset>{{$cat->name}}</option>
            @endforeach
        </select>
        <div class="divform addedittitle">
            <label>Title: </label>
            <input type="text" @isset($note) value="{{$note->title}}" @endisset id="note_title" name="note_title"/>
        </div>
        <textarea name="note_text" id="note_text" rows="15" columns="50">@isset($note){{$note->text}}@endisset</textarea>
        @isset($note)
            <input type="hidden" value="{{$note->id}}" name="note_id"/>
        @endisset
        <div class="divform">
            <input type="submit" value="Submit" name="note_submit"/>
            <a href="{{url('/')}}">Discard</a>
        </div>
    </form>
    <p class="error_text" id="error_text">
        @if(session()->has('message'))
            {{ session('message') }}
        @endif
        @isset($errors)
            @foreach(($errors->all()) as $er)
                {{$er}}
            @endforeach
        @endisset
    </p>
    <a class="login_register_link" href="{{url('/')}}">Click here to see all your notes...</a>
    <script type="application/x-javascript">
        tinymce.init({selector:'#note_text'});
    </script>
@endsection
