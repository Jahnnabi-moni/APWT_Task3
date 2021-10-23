<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CorporateEmployer;

class CorporateUpdateController extends Controller
{
    //

        function Update(Request $request)
    {
        $id = $request->id;
        $CorporateEmployer = CorporateEmployer::where('id',$id)->first();
        return view('CorporateEmployer.CorporateUpdate')->with('Corporate', $CorporateEmployer);
    }

    function UpdateSubmit(Request $request){

        $this->validate(
            $request,
            [
                'name'=>'required|min:3|max:30',
                'email'=>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'address'=>'required',
                'password'=>'required|min:5',
                'phone'=>'required|min:11',
                'jobtype'=>'required'


            ],
            [
                'name.required'=>'Please Enter Your Name',
                'name.min'=>'Name must be more than 2 characters',
               
                'address.required'=>'Enter your Address',
                'phone.required'=>'Phone Number is required!',

                'phone.min'=>'Phone number is not valid',
                'jobtype.required'=>'Enter job category',
                'email.required'=>'Email required !',
                'email.regex'=>'Invalid Email Format!',
                'password.required'=>'Please Enter Password  !',
                'password.min'=>'Enter at least 5 characters!'
            ]
        );
        $var = new CorporateEmployer();
        $var = CorporateEmployer::where('id',Session()->get('corporate_id'))->first();
        $var->Name= $request->name;
        $var->Email = $request->email;
        $var->Phone=$request->phone;
        $var->Address = $request->address;
        $var->Password = $request->password;
        $var->Job_Type = $request->jobtype;
        
        $var->save();
    

        return redirect()->route('corporateDash');
    

    }
}
