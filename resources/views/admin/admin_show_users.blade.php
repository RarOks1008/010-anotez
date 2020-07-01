@extends('layouts.admin')
@section('title_part')
    Admin Show Users
@endsection
@section('admin_part')
    <h2>Users</h2>
    <table>
        <tr class="fourcolumn">
            <th>Email</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($users as $user)
            <tr class="fourcolumn">
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td><a href="{{url('admin/edit_user/'.$user->id)}}"><span class="fas fa-edit"></span></a></td>
                <td><a href="{{url('admin/delete_user/'.$user->id)}}"><span class="fa fa-trash" aria-hidden="true"></span></a></td>
            </tr>
        @endforeach
    </table>
@endsection
