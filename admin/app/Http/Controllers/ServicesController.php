<?php

namespace App\Http\Controllers;

use App\Models\ServicesModel;
use App\Models\SevicesModel;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    function ServicesIndex(){

        // $servicesData=json_decode(SevicesModel::all());
        // return view('Services',['servicesDataKey'=>$servicesData]);
        return view('Services');
    }
    function getServiceData(){
        $result=json_encode(SevicesModel::all());
        return $result;
    }
}
