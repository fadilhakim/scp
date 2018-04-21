<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    private $objRole;
    //
    function __construct()
    {
        $this->objRole = new Role();
    }

    function index()
    {
        $data["role"]    = $this->objRole->get_role();
        
    	$data["title"]   = "Role";
        $data['content'] = 'admin/role/role';
        return view('admin/index',$data);
    }
}
