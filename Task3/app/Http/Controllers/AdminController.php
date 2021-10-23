<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\CorporateEmployer;

class AdminController extends Controller
{
    //

        function Registration()
    {
        return view('Admin.Registration');
    }
    
    function RegistrationSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                'username'=>'required',
                'email'=>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password'=>'required|min:5',
                'phone'=>'required|min:11',


            ],
            [
                'username.required'=>'Username is required !',
                'phone.required'=>'Phone Number is required!!',
                'phone.min'=>'Invalid Phone number',
                'email.required'=>'Email is required !',
                'email.regex'=>'Invalid Email Format!',
                'password.required'=>'Please Enter Password !',
                'password.min'=>'Enter at least 5 characters !'
            ]
        );
        $var = new Admin();
        $var->Username= $request->username;
        $var->Email = $request->email;
        $var->Phone=$request->phone;
        $var->Password = $request->password;
        $var->save();
    

        return redirect()->route('login');
    
      
    }

    function Update(Request $request)
    {
        $id = $request->id;
        $Admin = Admin::where('id',$id)->first();
        return view('Admin.AdminProfileUpdate')->with('Admin', $Admin);
    }

    function UpdateSubmit(Request $request){

        $this->validate(
            $request,
            [
                'email'=>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password'=>'required|min:5',
                'phone'=>'required|min:11',


            ],
            [
                'phone.required'=>'Phone Number is required!',
                'phone.min'=>'Invalid Phone number!',
                'email.required'=>'Email is required !',
                'email.regex'=>'Invalid Email Format!',
                'password.required'=>'Please Enter Password !',
                'password.min'=>'Enter at least 5 characters !'
            ]
        );
        $var = Admin::where('id',Session()->get('admin_id'))->first();
        $var->Email = $request->email;
        $var->Phone=$request->phone;
        $var->Password = $request->password;
        $var->save();
    

        return redirect()->route('AdminDash');
    

    }



    public function UserList(){
        $User = CorporateEmployer::all();
        return view('Admin.UserList')->with('User',$User);
    }


    public function UserEdit(Request $request){
        //
        $id = $request->id;
        $user = CorporateEmployer::where('id',$id)->first();
        return view('Admin.CorporateUpdate')->with('Corporate', $user);

    }


    public function UserEditSubmit(Request $request){


        $this->validate(
            $request,
            [
                'name'=>'required|min:3|max:30',
                'username'=>'required',
                'email'=>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'address'=>'required',
                'password'=>'required|min:5',
                'phone'=>'required|min:11',
                'jobtype'=>'required'


            ],
            [
                'name.required'=>'Please Enter Your Name',
                'name.min'=>'Name must be more than 2 characters',
                'username.required'=>'Username Required',
                'address.required'=>'Please Enter Address',
                'phone.required'=>'Phone Number Needed!!',
                'phone.min'=>'Phone number not valid',
                'jobtype.required'=>'Enter job category please',
                'email.required'=>'Email is required!',
                'email.regex'=>'Invalid Email Format!',
                'password.required'=>'Please Enter Password !',
                'password.min'=>'Enter at least 5 characters !'
            ]
        );
        $var = CorporateEmployer::where('Username',$request->username)->first();
        $var->Username= $request->username;
        $var->Name= $request->name;
        $var->Email = $request->email;
        $var->Phone=$request->phone;
        $var->Address = $request->address;
        $var->Password = $request->password;
        $var->Job_Type = $request->jobtype;
        
        $var->save();
    

        return redirect()->route('userList');
    
//
    }

    public function UserDelete(Request $request){
        $var = CorporateEmployer::where('id',$request->id)->first();
        $var->delete();
        return redirect()->route('userList');

    }
}
