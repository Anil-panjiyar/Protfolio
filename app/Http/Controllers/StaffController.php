<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       return view('insert');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
        ]);

          $staff= new Staff;
          $staff->name=$request->get('name');
          $staff->address=$request->get('address');
          $staff->number=$request->get('number');
          $staff->save();

          return redirect()->route('staff.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $staff=Staff::all();
        // dd($staff);
        return view('show',['staffs'=>$staff]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff= Staff::find($id);
        return view('edit',['staffs'=>$staff]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // dd($post);
        $post = $request->all();
        $staff= Staff::find($post['staffid']);
        $staff->name =$request['name'];
        $staff->address = $post['address'];
        $staff->number = $post['number'];
        $staff->save();
        return redirect('show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff,$id)
    {
        $star=Staff::find($id);
           $star->delete();
           return redirect('show');
        //
    }
}
