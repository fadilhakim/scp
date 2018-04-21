<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    private $objAdmin; 

    function __construct()
    {
        $this->objAdmin = new Admin();
    }
    //
    function index()
    {
        $data["admin"]    = $this->objAdmin->get_admin();
    	$data["title"]   = "Admin";
        $data['content'] = 'admin/admin/admin';
        return view('admin/index',$data);
    }

    function insert_modal()
    {
        return view("admin/admin/modal_admin_insert");
    }

    function insert_process()
    {

    }

}
