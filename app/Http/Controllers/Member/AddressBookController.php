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

    function delete_address_book_modal(Request $request)
    {
        //dd($request->all());
        $user_addtr_id = $request->input("user_addtr_id");
        $data["user_addtr_id"] = $user_addtr_id;
        $data["user_address"] =  $this->objAddress->address_book_detail($user_addtr_id);
        
        //dd($data);
        return view("members/address_book_delete_modal",$data);
    }

    function delete_address_book_process(Request $request)
    {
        //dd($request->all());
        $user_addtr_id = $request->input("user_addtr_id");
       
        if(!empty($user_addtr_id))
        {
            $this->objAddress->address_book_delete($user_addtr_id);
            echo Alert::success("You Successfully Delete this Address ");
            $url  = url('memberarea/account');
            echo '
                <script>
                    setTimeout(function(){ window.location.href = "'.$url.'"; },2000);
                </script>
            ';
        }else{
            
        }
    }

    function address_book_list()
    {
        // list untuk 1 user
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
            echo Alert::success("You Successfully Add Address ");
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

    function update_address_book_modal(Request $request)
    {
        $user_addtr_id = $request->input("user_addtr_id");
        $data["user_addtr_id"] = $user_addtr_id;
        $data["user_address"] =  $this->objAddress->address_book_detail($user_addtr_id);
        
        //dd($data["user_address"]);
        /*
             +"user_addtr_id": 1
            +"user_id": 1
            +"address_name": "Alamat Rumah"
            +"contact_person": "Aries Dimas Yudhistira"
            +"billing_address": "werwerwer"
            +"shipping_address": "swefwerf"
            +"provinsi": 6
            +"kota": 152
            +"kecamatan": "Pinang"
            +"kode_pos": "15140"
            +"no_hp": "081325612339"
            +"updated_at": "2018-06-19 14:59:47"
            +"created_at": "2018-06-19 14:59:47"
            +"ip_address": "::1"
            +"user_agent": "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:60.0) Gecko/20100101 Firefox/60.0"
        */
        /*
        $data["address_name"] = "Plumpang semper";*/
        return view("members/address_book_update_modal",$data);
    }

    function update_address_book_process(Request $request)
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
        //dd($request->all());
        $user_addtr_id      = $request->input("user_addtr_id");
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
            "user_addtr_id"     =>"required",
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
                "user_addtr_id"     => $user_addtr_id,
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
            
            $this->objAddress->address_book_update($arr);

            $url  = url('memberarea/account');
            echo Alert::success("You Successfully updated Address ");
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
}
