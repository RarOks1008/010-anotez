@extends('layouts.admin')
@section('title_part')
    Admin Add Category
@endsection
@section('admin_part')
    <h2>Add Category</h2>
    <form action="{{ url("/admin/add_category") }}" method="POST" onsubmit="return addcategory_check()">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="categoryname" id="categoryname" placeholder="Name"/>
        </div>
        <div>
            <label>Color:</label>
            <input type="color" name="categorycolor" id="categorycolor"/>
        </div>
        <div>
            <input type="submit" name="btnSubmit" value="Submit"/>
        </div>
    </form>
@endsection
