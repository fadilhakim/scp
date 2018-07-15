<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\Alert;
use App\Libraries\Rajaongkir;

use Validator;
class ShippingCalculator extends Controller
{
    private $objRajaongkir;
    function __construct()
    {
        $this->objRajaongkir = new Rajaongkir();
    }
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
            $data["weight"] = $weight;
            
            $dt_city_origin = $this->objRajaongkir->detail_city($city_origin,$province_origin);
            $dt_city_destination = $this->objRajaongkir->detail_city($city_destination,$province_destination);
           
            $data["city_origin"] =  json_decode($dt_city_origin,true);
            $data["city_destination"] = json_decode($dt_city_destination,true);

            $dt_cost             = $this->objRajaongkir->cost([
                "origin" => $city_origin,
                "destination"  => $city_destination,
                "weight"    => $weight,
                "courier"   => $courer
            ]);

            $data["cost"] = json_decode($dt_cost,true);

            
            //dd($data["cost"]);
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
