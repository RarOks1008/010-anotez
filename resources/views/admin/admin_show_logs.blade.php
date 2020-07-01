@extends('layouts.admin')
@section('title_part')
    Admin Logs
@endsection
@section('admin_part')
    <h2>Logs</h2>
    <table>
        <tr class="fourcolumn">
            <th>IP</th>
            <th>User</th>
            <th>Detail</th>
            <th>Date</th>
        </tr>
        @foreach($logs as $log)
            <tr class="fourcolumn">
                <td>{{$log->ip}}</td>
                <td>{{$log->user}}</td>
                <td>{{$log->detail}}</td>
                <td>{{$log->date}}</td>
            </tr>
        @endforeach
    </table>
@endsection
