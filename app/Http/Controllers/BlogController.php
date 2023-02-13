<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class BlogController extends Controller
{
    //
     public function innerJoinCaulse(){
        $request = DB::table('teachers')
        ->join('blog','teachers.id','=' ,'blog.teachers_id')
        ->select('teachers.name','blog.title','blog.description')
        ->get();
        return $request;

     }
      public function leftJoinCaulse(){
        $result = DB::table('teachers')
            ->leftJoin('blog','teachers.id', '=','blog.teachers_id')
            ->get();
             return $result;
      }
       public function rightJoinCaulse(){
         $result = DB::table('teachers')
         ->rightjoin('blog','teachers.id', '=','blog.teachers_id')
         ->get();
         return $result;
       }
}
