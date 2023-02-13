<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Company;
use Hash;



class AdminController extends Controller
{
// use Exception;

// use Validation;
// use Auth;
//  public function login(){
//     return view('admin');
//  }

 public function display(Request $request)
 {
    $data = [];
    $data['companies'] = Company::where('status','!=', 'R')->get();
     return view('company-display', $data);
    //  dd($data);
 }



//   public function table(){
//     $data = [];
//     $data['companies'] = Company::where('status','!=', 'R')->get();
//      return view('dashboard', $data);
//   }
 public function checkCredential(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
              ]);

        $post = $request->all();

         //dd($post);
        $credentials = ['email' => $post['email'], 'password' => $post['password'], 'roleid' => 1];
        if (Auth::attempt($credentials)) {
              // echo "login successful";
            //   session()->flash('message', 'Login successfull.');
            return redirect()->route('details.company')->with('success','login successfull');
        } else {
             return back()->with('message', 'Credentails does not match!!!!');
            // echo " Wrong password or wrong email";


        }
    }
}
