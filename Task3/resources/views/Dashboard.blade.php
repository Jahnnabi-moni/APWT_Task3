@extends('layouts.app')
@section('content')


<?php if(Session::has('corporate_id')) {?>
    <h1>This is Corporate Employer Dashboard</h1>


        <h4 style="color:blue">Name : {{ $CorporateEmployer->Name }} </h4>
        <h4 style="color:blue">Username :  {{ $CorporateEmployer->Username }}</h4>
        <h4 style="color:blue">Email :  {{ $CorporateEmployer->Email }}</h4>
        <h4 style="color:blue">Phone :  {{ $CorporateEmployer->Phone }}</h4>
        <h4 style="color:blue">Address : {{ $CorporateEmployer->Address }} </h4>
        <h4 style="color:blue">Job Type :  {{ $CorporateEmployer->Job_Type }}</h4>

        <td><a  class="btn btn-info" href="/Corporate/update/{{$CorporateEmployer->id}}/{{$CorporateEmployer->Username}}">Update</a></td>


<?php }
else if(Session::has('admin_id')) {?>
    <h1>This is Admin's Dashboard page </h1>

    
        <h4 style="color:blue">Username :{{ $Admin->Username }} </h4>
        <h4 style="color:blue">Email :  {{ $Admin->Email }}</h4>
        <h4 style="color:blue">Phone :  {{ $Admin->Phone }}</h4>

        <td><a  class="btn btn-info" href="/Admin/update/{{$Admin->id}}/{{$Admin->Username}}">Update</a></td>



<?php }?>


@endsection