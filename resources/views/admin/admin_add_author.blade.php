@extends('layouts.admin')
@section('title_part')
    Admin Add Author Image
@endsection
@section('admin_part')
    <h2>Add Author Image</h2>
    <form action="{{ url("/admin/add_author") }}" method="POST" onsubmit="return admin_add_author()" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Image:</label>
            <input type="file" name="authorimage" id="authorimage" accept=".jpeg, .png, .jpg"/>
        </div>
        <div>
            <label>Is Author?</label>
            <span>True <input type="radio" id="isauthor" name="isauthor" value="true" checked="checked"/></span>
            <span>False <input type="radio" id="isnotauthor" name="isauthor" value="false"/></span>
        </div>
        <div>
            <input type="submit" name="btnSubmit" value="Submit"/>
        </div>
    </form>
@endsection
