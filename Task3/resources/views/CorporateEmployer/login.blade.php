@extends('layouts.app')
@section('content')
    <form action="{{route('loginsubmit')}}" class="col-md-6" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}

            <div class="form-group">
            <span>Username</span>
            <input type="text" name="username" value="{{old('username')}}" class="form-control">
            @error('username')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="form-group">
            <span>Password</span>
            <input type="password" name="password" value="{{old('password')}}" class="form-control">
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>  

            @isset($message)
          <div class="alert alert-success">
          <strong>{{@message}}</strong>
          </div>
            @endif
            

            <div class="form-group">    
                <span> </span>
             <input type="submit" class="btn btn-success" value="Log In">
            </div>
    </form>

    @endsection