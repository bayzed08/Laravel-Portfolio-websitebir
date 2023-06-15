<?php

namespace App\Http\Controllers;

use App\Models\ServicesModel;
use App\Models\visitorModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function HomeIndex(){
        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");
        visitorModel::insert(['ip_address'=>$UserIP,'visit_time'=>$timeDate]);

        $servicesData=json_decode(ServicesModel::all());
        return view('Home',['servicesDataKey'=>$servicesData]);
    }
}
