@extends('layouts.admin')
@section('title_part')
    Admin Show Categories
@endsection
@section('admin_part')
    <h2>Categories</h2>
    <table>
        <tr class="fourcolumn">
            <th>Category</th>
            <th>Color</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($categories as $category)
            <tr class="fourcolumn">
                <td>{{$category->name}}</td>
                <td style="color: {{$category->color}}">{{$category->color}}</td>
                <td><a href="{{url('admin/edit_category/'.$category->id)}}"><span class="fas fa-edit"></span></a></td>
                <td><a href="{{url('admin/delete_category/'.$category->id)}}"><span class="fa fa-trash" aria-hidden="true"></span></a></td>
            </tr>
        @endforeach
    </table>
@endsection
