<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\Alert;

use Validator;
class ShippingCalculator extends Controller
{
    //
    function index()
    {
        $data["title"]   = "Shipping Calculator";
        $data['content'] = 'admin/shipping_management/shipping_calculator';
        return view('admin/index',$data);
    }

    function calculate(Request $request)
    {
        //dd($request->all());
        /*
            array:7 [▼
                "province_origin" => "5"
                "city_origin" => "210"
                "province_destination" => "5"
                "city_destination" => "210"
                "courer" => "tiki"
                "_token" => "m0SUZqIi0krfPv85wGaqIrLrZhavDEMmhbLreI8D"
                "weight" => "100"
                ]
        */

        $province_origin = $request->input("province_origin");
        $city_origin = $request->input("city_origin");
        $province_destination = $request->input("province_destination");
        $city_destination = $request->input("city_destination");
        $courer = $request->input("courer");
        $weight = $request->input("weight");

        $validator = Validator::make($request->all(),[
            "province_origin"     =>"required",
            "city_origin"         =>"required",
            "province_destination"=>"required",
            "city_destination"    =>"required",
            "courer"              =>"required",
            "weight"              =>"required",
        ]);

        if(!$validator->fails())
        {

            $data = array();
            $data["all"] = $request->all();
            return view("admin/shipping_management/shipping_calculate_result",$data);

        }else
        {
            $errors = $validator->errors();
           
            $err_text = "";
            foreach($errors->all() as $err) 
            {
                $err_text .=  "<li> $err </li>";
            }

            echo Alert::danger($err_text);
        }
    }
}
