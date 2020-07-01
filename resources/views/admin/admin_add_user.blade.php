@extends('layouts.admin')
@section('title_part')
    Admin Add User
@endsection
@section('admin_part')
    <h2>Add User</h2>
    <form action="{{ url("/admin/add_user") }}" method="POST" onsubmit="return admin_add_user()">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" id="email" placeholder="someone@something.com"/>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" id="password" placeholder="******"/>
        </div>
        <div>
            <input type="submit" name="btnSubmit" value="Submit"/>
        </div>
    </form>
@endsection
