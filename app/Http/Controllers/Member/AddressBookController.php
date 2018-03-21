<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\AddressBook;
use App\Http\Controllers\Controller;
use Validator;

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

        $user_id            = $request->input("user_id");
        $contact_person     = $request->input("contact_person");
        $no_hp              = $request->input("no_hp");
        $provinsi           = $request->input("provinsi");
        $kecamatan          = $request->input("kecamatan");
        $kota               = $request->input("kota");
        $kode_pos           = $request->input("kode_pos");
        $shipping_address   = $request->input("shipping_address");
        $billing_address    = $request->input("billing_address");

        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');

        $validator = Validator::make($request->all(),[
            "user_id"           =>"required",
            "contact_person"    =>"required",
            "no_hp"             =>"required",
            "provinsi"          =>"required",
            "kecamatan"         =>"required",
            "kota"              =>"required",
            "kode_pos"          =>"required",
            "shipping_address"  =>"required",
            "billing_address"   =>"required"
        ]);

        if($validator)
        {

        }
        else
        {

        }
    }

    function update_address_book_modal()
    {
        return view("members/address_book_update_modal");
    }

    function update_address_book_process()
    {

    }
}
