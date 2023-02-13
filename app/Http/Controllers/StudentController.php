<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Student;
use Exception;
 use Validator;

class StudentController extends Controller
{
    public function index(){
        return view('students');

    }
    public function addStudent(Request $request){
        try {
            $message = 'Student Added Successfully.';
            $type = 'success';
            $ruleArray = [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'phonenumber' => 'required'
            ];
            $messageArray = [
                'firstname.required' => 'Please, enter firstname.',
                'lastname.required' => 'Please, enter lastname.',
                'email.required' => 'Please, enter email address.',
                'email.email' => 'Please, enter valid email address.',
                'phonenumber.required' => 'Please, provide phone number.'
            ];
            $validator = Validator::make($request->all(), $ruleArray, $messageArray);
            if ($validator->fails()) {
                throw new Exception ($validator->errors()->first(), 1);
            }

            $student = new Student();
            //$message = "Data inserted successfully.";

            $student->firstname =$request->firstname;
            $student->lastname =$request->lastname;
            $student->email =$request->email;
            $student->phonenumber =$request->phonenumber;
            $result = $student->save();
            if (!$result) {
                throw new Exception ('Something went wrong.Please, try again.', 1);
            }
        } catch (Exception $e) {
            $type = 'error';
            $message = $e->getMessage();
        }
        echo json_encode(['type' => $type, 'message' => $message]);
        exit;
    }


public function deleteStudent(Request $request) {
    try {
        $type = 'success';
        $message = 'Studen Deleted Successfully.';
        $student = Student::find($request->studentid);
        $result = $student->delete();
        if (!$result) {
            throw new Exception ("Couldn't delete student. Please, try again.", 1);
        }
    } catch (Exception $e) {
        $type = 'error';
        $message = $e->getMessage();
    }
    echo json_encode(['type' => $type, 'message' => $message]);
    exit;
}

public function getStudents()
{
    $students = Student::orderBy('id',"DESC")->get();
    $html = "";
    foreach($students as $student) {
        $html .= " <tr id='sid{{$student->id}}'>\
        <td>{{$student->firstname}}</td>\
        <td>{{$student->lastname}}</td>\
        <td>{{$student->email}}</td>\
        <td>{{$student->phonenumber}}</td>\
        <td><a href='javascript:void(0)' data-id='$student->id' class='btn btn-danger deleteStudent'>Delete</a></td>\
        </tr>";
    }

    echo $html;
}

}
