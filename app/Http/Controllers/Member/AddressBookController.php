<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\AddressBook;
use App\Http\Controllers\Controller;
use Validator;

use App\Libraries\Alert;
use App\Libraries\FolderHelper;

class AddressBookController extends Controller
{
    private $objAddress;
    //
    function __construct()
    {
        $this->objAddress = new AddressBook();
    }

    function add_address_book_modal()
    {
        return view("members/address_book_add_modal");
    } 

    function add_address_book_process(Request $request)
    {
        /*
            "user_id",
            "contact_person",
            "no_hp",
            "provinsi",
            "kecamatan",
            "kota",
            "kode_pos",
            "shipping_address",
            "billing_address"
        */
        //dd('masuk sini');
        $user_id            = $request->input("user_id");
        $contact_person     = $request->input("contact_person");
        $address_name       = $request->input("address_name");
        $no_hp              = $request->input("no_hp");
        $provinsi           = $request->input("provinsi");
        $kecamatan          = $request->input("kecamatan");
        $kota               = $request->input("city");
        $kode_pos           = $request->input("kode_pos");
        $shipping_address   = $request->input("shipping_address");
        $billing_address    = $request->input("billing_address");

        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');

        $validator = Validator::make($request->all(),[
            "user_id"           =>"required",
            "address_name"      =>"required",
            "contact_person"    =>"required",
            "no_hp"             =>"required",
            "provinsi"          =>"required",
            "kecamatan"         =>"required",
            "city"              =>"required",
            "kode_pos"          =>"required",
            "shipping_address"  =>"required",
            "billing_address"   =>"required"
        ]);

        if(!$validator->fails())
        {
            $arr = array(
                'user_id'           => $user_id,
                'address_name'      => $address_name,
                'contact_person'    => $contact_person,
                'no_hp'             => $no_hp,
                'provinsi'          => $provinsi,
                'kecamatan'         => $kecamatan,
                'kota'              => $kota,
                'kode_pos'          => $kode_pos,
                'shipping_address'  => $shipping_address,
                'billing_address'   => $billing_address,
                'created_at'        => $datetime,
                'updated_at'        => $datetime,
                'ip_address'        => $ip_address,
                'user_agent'        => $user_agent
            );
            
            $this->objAddress->insert_address($arr);

            $url  = url('memberarea/account');
            echo '
                <script>
                    setTimeout(function(){ window.location.href = "'.$url.'"; },2000);
                </script>
            ';
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

    function update_address_book_modal()
    {
        return view("members/address_book_update_modal");
    }

    function update_address_book_process(Request $request)
    {
        
    }
}
