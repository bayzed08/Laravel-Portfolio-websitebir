<?php

namespace App\Http\Controllers;

use App\Models\ServicesModel;
use Illuminate\Http\Request;


class ServicesController extends Controller
{
    function ServicesIndex(){

        $servicesData=json_decode(ServicesModel::all());
        return view('Services',['servicesDataKey'=>$servicesData]);
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
    function addNewServiceData(Request $req){
        $ServiceName=$req->input('ServiceName');
        $ServiceDesc=$req->input('ServiceDesc');
        $ServiceImgLink=$req->input('ServiceImgLink');
        $result=ServicesModel::insert(['service_name'=>$ServiceName,'service_des'=>$ServiceDesc,'service_img'=>$ServiceImgLink]);
        if ($result==true) {
            return 1;
        } else {
            return 0;
        }
        // return $ServiceName." ". $ServiceDesc." ".$ServiceImgLink;
    }
}
