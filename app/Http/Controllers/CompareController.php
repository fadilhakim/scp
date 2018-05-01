<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompareController extends Controller
{
    //
    function __contruct()
    {

    }

    function index()
    {
        $data = array();
        return view("compare/compare",$data);
    }

    function compare_modal()
    {
        // masukkan product ke session

        // passing data ke view 
        $data = array();

        return view("compare/compare_modal",$data);
    }

    function compare_process()
    {   
        
        // masukan data kedalam view 
        // spesification1, spesification2,  spesification3

        header("location:".base_url("compare"));
    }
}
