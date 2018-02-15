<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;

class BankgController extends Controller
{


    function __construct()
    {
        
    }

    function index()
    {
        $data["bank"] = Bank::all_bank();
        $data["title"]   = "Bank Account";
        $data['content'] = 'admin/bank_account';
        return view("/admin/index",$data);
    }


}
