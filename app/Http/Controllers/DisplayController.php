<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Display;

class DisplayController extends Controller
{
    public function show(){
        return view('display');
    }
//     public function ajaxCall(){
//         $data =array("anil","sandeshsir");
//         return response()->json(['data'=>$data]);
//     }


    public function saveData(Request $request) {
        $type = 'success';
        $message = "Data inserted successfully.";
        $post = $request->all();
        $display = new Display;
        $display->name = $post['name'];
        $display->address = $post['address'];
        $display->number = $post['number'];
        $display->education = $post['education'];
        $result = $display->save();
        if (!$result) {
            $type ='error';
            $message = "Not able to insert data.";
        }

        return json_encode(["type"=>$type, "message"=>$message]);
    }
}
