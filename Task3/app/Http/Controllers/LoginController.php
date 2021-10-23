<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\CorporateEmployer;


class LoginController extends Controller
{
    //

        function login()
    {
        return view('CorporateEmployer.login');
    }


    function loginSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                'username'=>'required',
                'password'=>'required|min:5',
            ],
            [
                'username.required'=>'Username is required !',
                'password.required'=>'Please Enter Password!',
                'password.min'=>'Enter at least 5 characters !'
            ]
        );




     $CorporateEmployer=CorporateEmployer::where('Username',$request->username)
                            ->where('Password',$request->password)
                            ->first();
    
    
    $Admin=Admin::where('Username',$request->username)
                ->where('Password',$request->password)->first();



        if($CorporateEmployer)
        {
            $request->session()->put('corporate_id',$CorporateEmployer->id);
            $request->session()->put('corporate_username',$CorporateEmployer->Username);
            return redirect()->route('corporateDash');
        }

        else if($Admin)
        {
            $request->session()->put('admin_id',$Admin->id);
            return redirect()->route('AdminDash');
        }

        else{
            return("Account not found");
        }

    }



    public function logout(){
        session()->forget('corporate_id');
        session()->forget('admin_id');
        return redirect()->route('login');
    }




    public function CorporateDash(){

         $CorporateEmployer=CorporateEmployer::where('id',Session()->get('corporate_id'))->first();

         return view('Dashboard')->with('CorporateEmployer',$CorporateEmployer);
    }


    public function AdminDash(){

        $Admin=Admin::where('id',Session()->get('admin_id'))->first();

        return view('Dashboard')->with('Admin',$Admin);
   }
}
