<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\str;
use App\Models\Sug;


class SugController extends Controller
{
    //
    public function index(){
        return view('sug');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
        ]);

          $sug= new Sug;
          $sug->name=$request->get('name');
          $sug->address=$request->get('address');
          $sug->number=$request->get('number');
          $sug->slug = Str::slug($request->get('slug'));
          $sug->save();

          echo "insert successfully";
    }
}
