<?php

namespace App\Http\Controllers;
use Illuminate\Support\str;

use Illuminate\Http\Request;
use App\Models\Company;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('company');
    }


    public function create()
    {

    }


    public function store(Request $request)

    {

        $post = $request->all();
        $request->validate([
            'companyname'=>'required',
            'email' => 'required|email|unique:company,email',
            'number'=>'required|min:7|max:10|unique:company,number',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
            'pan' =>'required',
            'person_name' =>'required',
            'person_number' =>'required|digits:10|unique:company,person_number',
            'destination' =>'required'
        ]);

        $imageArray = [];

        $name = $post['image']->getClientOriginalName();
        $newName = time().$name;
        $post['image']->storeAs('public/images/', $newName);
        $imageArray = $newName;
        $img = (json_encode($imageArray));
        $isinserted = Company::create([
            'companyname' =>  $post['companyname'],
            'email' => $post['email'],
            'number' => $post['number'],
            'image' => $img,
            'pan' => $post['pan'],
            'person_name' => $post['person_name'],
            'person_number' => $post['person_number'],
            'destination' => $post['destination']
        ]);

        if (!$isinserted) {
            return back()->with('message', 'Something went wrong');
        } else {
            return back()->with('message', 'Data  Inserted successfully');
        }

        //echo "inserted successfully";
    }


    public function show()
    {
        $data = [];
        $data['companies'] = Company::where('status','!=', 'R')->get();
        // dd($data);
        return view('company-display', $data);
    }


    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
