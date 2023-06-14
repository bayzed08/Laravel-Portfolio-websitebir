<?php

namespace App\Http\Controllers;

use App\Models\visitorModel;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    function VisitorIndex(){

        // $visitorData=json_decode(visitorModel::all());
        $visitorData=json_decode(visitorModel::orderBy('id','desc')->take(5)->get());
         return view('Visitor',['visitorDataKey'=>$visitorData]);
    }
}
