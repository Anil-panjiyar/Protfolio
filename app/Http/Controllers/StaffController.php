<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use DB;

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
        $staffs = DB::table('staff as s')
                ->selectRaw('s.id, s.name, s.address, s.number, si.image')
                ->leftJoin('staffimages as si', 'si.staffid', '=', 's.id')
                ->get();

        // $idArray = [];
        // $masterArray = [];
        // $imageArray = [];
        // foreach($staff as $key => $val) {
        //     $imageArray[$val->id][] = $val->image;

        // }

        // foreach($staff as $dkey => $dval) {
        //     if (!in_array($dval->id, $idArray)) {
        //         //$im=(json_decode($imageArray[$masterArray]));
        //         $masterArray[$dkey]['id'] = $dval->id;
        //         $masterArray[$dkey]['name'] = $dval->name;
        //         $masterArray[$dkey]['address'] = $dval->address;
        //         $masterArray[$dkey]['number'] = $dval->number;
        //         $masterArray[$dkey]['image'] = $imageArray[$dval->id];
        //         $myJSON = json_encode($masterArray);
        //         array_push($idArray, $dval->id);

        //     }
        // }
        // dd($masterArray[0]['image']);
        //var_dump(json_decode($imageArray[$dval->id]));
        // dd($staffs);
        return view('show',compact('staffs'));

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
        $staff->name =$post['name'];
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
