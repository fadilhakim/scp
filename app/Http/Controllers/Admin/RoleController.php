<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

use App\Libraries\Alert;

use Validator;

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

    function insert_modal()
    {
        $data["menu"] = $this->objRole->get_all_menu();
        return view("admin/role/modal_role_insert",$data);
    }

    function update_modal(Request $request)
    {
        $role_id = $request->input("role_id");
        $data["role"] = $this->objRole->detail_role($role_id);
        $data["menu"] = $this->objRole->get_all_menu();
        return view("admin/role/modal_role_update",$data);
    }

    function update_process(Request $request)
    {
        $role_id   = $request->input("role_id");
        $privilege = $request->input("privilege"); // array
        $role_name = $request->input("role_name");
        $priviege_str = "";

        $validator = Validator::make($request->all(), [
            'role_name'        => 'required|max:255',
            "privilege"        => "required"
       ]);
    
       if(!$validator->fails())
       {
           $coma = ",";
           $i = 0;
            foreach($privilege as $dt)
            {
               
                if($i == count($privilege)-1)
                {
                    $coma = "";
                }
                $priviege_str .= $dt.$coma;

                $i++;
            }
            $arr["role_id"]   = $role_id;
            $arr["role_name"] = $role_name;
            $arr["privilege"] = $priviege_str;

            $this->objRole->update_role($arr);

            echo Alert::success("You successfully update new Role");
            echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
       }
       else
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

    function insert_process(Request $request)
    {
        $privilege = $request->input("privilege"); // array
        $role_name = $request->input("role_name");
        $priviege_str = "";

        $validator = Validator::make($request->all(), [
            'role_name'        => 'required|unique:role_tbl|max:255',
            "privilege"        => "required"
       ]);
    
       if(!$validator->fails())
       {
           $coma = ",";
           $i = 0;
            foreach($privilege as $dt)
            {
                if($i == count($privilege)-1)
                {
                    $coma = "";
                }
                $priviege_str .= $dt.$coma;

                $i++;
            }
            
            $arr["role_name"] = $role_name;
            $arr["privilege"] = $priviege_str;

            $this->objRole->insert_role($arr);

            echo Alert::success("You successfully Insert new Role");
            echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
       }
       else
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
