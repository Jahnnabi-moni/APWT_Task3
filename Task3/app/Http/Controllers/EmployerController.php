<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\CorporateEmployer;

class EmployerController extends Controller
{
    //

    function Home()
    {
        return view('Home');
    }

    function Dashboard()
    {
        return view('Dashboard');
    }


    function Registration()
    {
        return view('CorporateEmployer.Registration');
    }

    function RegistrationSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                'name'=>'required|min:3|max:30',
                'username'=>'required',
                'email'=>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'phone'=>'required|min:11',
                'address'=>'required',
                'password'=>'required|min:5',
                'jobtype'=>'required'


            ],
            [
                'username.required'=>'Username is required !',
                'name.required'=>'Enter Your Name',
                'name.min'=>'Name must be more than 2 characters',
                'phone.required'=>'Phone Number is required !',
                'phone.min'=>'Phone number is not valid',
                'address.required'=>'Please Enter Address',
                'email.required'=>'Email is required !',
                'email.regex'=>'Invalid Email Format!',
                'password.required'=>'Please Enter Password !',
                'password.min'=>'Enter at least 5 characters !',
                'jobtype.required'=>'Enter the job category',



    
    
            ]
        );
        $var = new CorporateEmployer();
        $var->Username= $request->username;
        $var->Name= $request->name;
        $var->Email = $request->email;
        $var->Phone=$request->phone;
        $var->Address = $request->address;
        $var->Password = $request->password;
        $var->Job_Type = $request->jobtype;
        
        $var->save();
    

        return redirect()->route('login');
    
      
    }

}
