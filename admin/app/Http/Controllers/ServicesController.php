<?php

namespace App\Http\Controllers;

use App\Models\ServicesModel;
use Illuminate\Http\Request;


class ServicesController extends Controller
{
    function ServicesIndex(){

        // $servicesData=json_decode(SevicesModel::all());
        // return view('Services',['servicesDataKey'=>$servicesData]);
        return view('Services');
    }

    function getServiceData(){
        $result=json_encode(ServicesModel::all());
        return $result;
    }

    function  deleteServiceData(Request $req){
        $resultID=$req->input('id');
        $isDelete=ServicesModel::where('id','=',$resultID)->delete();
        if ($isDelete==true) {
            return 1;
        } else {
            return 0;
        }
    }
}
