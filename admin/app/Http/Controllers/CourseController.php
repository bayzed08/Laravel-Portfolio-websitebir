<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    function CoursesIndex(){
         return view('Course');
    }

    function getCoursesData(){
        $result=json_encode(CourseModel::all());
        return $result;
    }
}
