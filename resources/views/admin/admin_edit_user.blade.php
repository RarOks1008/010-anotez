@extends('layouts.admin')
@section('title_part')
    Admin Edit User
@endsection
@section('admin_part')
    <h2>Edit User</h2>
    <form action="{{ url("/admin/edit_user") }}" method="POST" onsubmit="return admin_edit_user()">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" id="email" value="{{$user->email}}" placeholder="someone@something.com"/>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" id="password" placeholder="******"/>
        </div>
        <input type="hidden" name="id" value="{{$user->id}}"/>
        <div>
            <input type="submit" name="btnSubmit" value="Submit"/>
            <a href="{{url("/admin/show_users")}}" class="admin_back_link">Back</a>
        </div>
    </form>
@endsection
