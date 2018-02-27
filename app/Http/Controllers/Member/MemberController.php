<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    //
    function __construct()
    {

    }

    function index()
    {
    	$data["title"]   = "Member Area";
        return view('members/generalinfo',$data);
    }

    function detail_order()
    {
        $data["title"]   = "Order Detail";
        return view('members/orderdetail',$data);
    }

}
