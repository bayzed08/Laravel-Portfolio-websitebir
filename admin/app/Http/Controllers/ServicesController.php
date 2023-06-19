<?php

namespace App\Http\Controllers;


use App\Models\SevicesModel;
use Illuminate\Http\Request;
use App\Models\ServicesModel;

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

    function  deleteServiceData(Request $req){
        $resultID=$req->input('id');
        $isDelete=SevicesModel::where('id','=',$resultID)->delete();
        if ($isDelete==true) {
            return 1;
        } else {
            return 0;
        }
    }
}
