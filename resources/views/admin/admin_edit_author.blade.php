@extends('layouts.admin')
@section('title_part')
    Admin Edit Author
@endsection
@section('admin_part')
    <h2>Edit Author Image</h2>
    <form action="{{ url("/admin/edit_author") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <img src="{{asset($image->author_image)}}" alt="Author Image {{$image->id}}"/>
        </div>
        <div>
            <label>Image:</label>
            <input type="file" name="authorimage" id="authorimage" accept=".jpeg, .png, .jpg"/>
        </div>
        <div>
            <label>Is Author?</label>
            <span>True <input type="radio" id="isauthor" name="isauthor" value="true" {{$image->is_author ? 'checked' : ''}}/></span>
            <span>False <input type="radio" id="isnotauthor" name="isauthor" value="false" {{$image->is_author ? '' : 'checked'}}/></span>
        </div>
        <input type="hidden" value="{{$image->id}}" name="id"/>
        <input type="hidden" value="{{$image->author_image}}" name="lastImageUrl"/>
        <div>
            <input type="submit" name="btnSubmit" value="Submit"/>
            <a href="{{url("/admin/show_author")}}" class="admin_back_link">Back</a>
        </div>
    </form>
@endsection
