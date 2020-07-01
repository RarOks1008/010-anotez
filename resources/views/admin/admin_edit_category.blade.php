@extends('layouts.admin')
@section('title_part')
    Admin Edit Category
@endsection
@section('admin_part')
    <h2>Edit Category</h2>
    <form action="{{ url("/admin/edit_category") }}" method="POST" onsubmit="return addcategory_check()">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="categoryname" id="categoryname" value="{{$category->name}}"/>
        </div>
        <div>
            <label>Color:</label>
            <input type="color" name="categorycolor" id="categorycolor" value="{{$category->color}}"/>
        </div>
        <input type="hidden" name="id" value="{{$category->id}}"/>
        <div>
            <input type="submit" name="btnSubmit" value="Submit"/>
            <a href="{{url("/admin/show_category")}}" class="admin_back_link">Back</a>
        </div>
    </form>
@endsection
