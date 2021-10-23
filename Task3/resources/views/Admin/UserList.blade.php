@extends('layouts.app')
@section('content')
    <table class="table table-borded">
        <tr>
            <th>UserType</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Job Type</th>

        </tr>
        @foreach($User as $user)
            <tr>
                <td>Corporate Employer</td>
                <td>{{$user->Username}}</td>
                <td>{{$user->Name}}</td>
                <td>{{$user->Email}}</td>
                <td>{{$user->Phone}}</td>
                <td>{{$user->Address}}</td>
                <td>{{$user->Job_Type}}</td>
                <td><a class="btn btn-info" href="/Admin/User/Edit/{{$user->id}}/{{$user->Name}}">Edit</a></td>
                <td><a class="btn btn-info" href="/Admin/User/Delete/{{$user->id}}/{{$user->Name}}">delete</a></td>
                  </tr>
        @endforeach
    </table>
@endsection