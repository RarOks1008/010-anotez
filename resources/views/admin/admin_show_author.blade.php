@extends('layouts.admin')
@section('title_part')
    Admin Show Author Images
@endsection
@section('admin_part')
    <h2>Author Images</h2>
    <table>
        <tr class="fourcolumn">
            <th>Image</th>
            <th>Is Author?</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($author_images as $img)
            <tr class="fourcolumn">
                <td><img src="{{asset($img->author_image)}}" alt="Author Image {{$img->id}}"/></td>
                <td>{{$img->is_author?'true':'false'}}</td>
                <td><a href="{{url('admin/edit_author/'.$img->id)}}"><span class="fas fa-edit"></span></a></td>
                <td><a href="{{url('admin/delete_author/'.$img->id)}}"><span class="fa fa-trash" aria-hidden="true"></span></a></td>
            </tr>
        @endforeach
    </table>
@endsection
