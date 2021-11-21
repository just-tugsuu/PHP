<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{

    public function getData() {
        $list = array(
            array("B190920001", "Enkhtugs", "G", "19"),
            array("B190920002", "Tuguldur", "A", "20"),
            array("B190920003", "Baasanjav", "U", "21"));  
        return $list;
    }
    
    public function read() {
        $student = $this->getData();
        return view('studentList', ["students" => $student]);
    }

    public function studentDetails($studentCode) {
        return view('studentDetail');
    }

    
}
