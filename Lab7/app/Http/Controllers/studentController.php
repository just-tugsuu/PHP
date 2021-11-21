<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{

    public function getData() {
        $list = array(
            array("B190920001", "Энхтөгс", "Г", "19"),
            array("B190920002", "Төгөлдөр", "А", "20"),
            array("B190920003", "Билгүүн", "У", "21"));  
        return $list;
    }
    
    public function read() {
        $student = $this->getData();
        return view('studentList', ["students" => $student]);
    }

    public function studentDetails($studentCode) {
        $data = $this->getData();
        foreach($data as $student) {
            if($student[0] === $studentCode){
                return view('studentDetail', ["code" => $student[0], "ner" => $student[1], "ovog" => $student[2], "nas" => $student[3]]);       
            }
        }
    }

    
}
