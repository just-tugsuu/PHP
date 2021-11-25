<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{

    public function getData() {
        $list = array(
            array("B190920004", "Энхтөгс", "Г", "19"),
            array("B190920003", "Төгөлдөр", "А", "20"),
            array("B190920002", "Билгүүн", "У", "21"));  
        return $list;
    }
    
    public function read() {
        $student = $this->getData();
        return view('studentList', ["students" => $student]);
    }

    public function fetch(Request $request) {
        $Studentdata = $this->getData();
        $temp = [];
        $inputValidation = $request->validate([
            'studentCode' => ['bail', 'required', 'max:10'],
        ]);
        $studentCode = $request->input('studentCode');
        foreach($Studentdata as $code) {
            if($code[0] === $studentCode) {
                array_push($temp, $code[0], $code[1], $code[2], $code[3]);
                break;
            }
        }
        return view("studentSearch", ["result" => $temp]);
    }

    public function studentDetails($studentCode) {
        $data = $this->getData();
        foreach($data as $student) {
            if($student[0] === $studentCode){
                return view('studentDetail', ["code" => $student[0], "ner" => $student[1], "ovog" => $student[2], "nas" => $student[3]]);       
            }   
        }
    }

    public function search() {
        return view("studentSearch");
    }

    
}
