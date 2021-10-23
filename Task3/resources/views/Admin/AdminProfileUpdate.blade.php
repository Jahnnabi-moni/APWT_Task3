@extends('layouts.app')
@section('content')
    <form action="{{route('AdminProfileUpdateSubmit')}}" class="col-md-6" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}


            <div class="form-group">
            <span>Username</span>
            <input type="text" name="username" value="{{$Admin->Username}}"  readonly="readonly" class="form-control">
            @error('username')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="form-group">
            <span>Email</span>
            <input type="text" name="email" value="{{$Admin->Email}}" class="form-control">
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="form-group">
            <span>Phone</span>
            <input type="phone" name="phone" value="{{$Admin->Phone}}" class="form-control">
            @error('phone')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>


            <div class="form-group">
            <span>Password</span>
            <input type="text" name="password" value="{{$Admin->Password}}" class="form-control">
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>


        <div class="form-group">
        
        <input type="submit" class="btn btn-success" value="Update Profile" ></li>
        </div>
    </form>

    @endsection