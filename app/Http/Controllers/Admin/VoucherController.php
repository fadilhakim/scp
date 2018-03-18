<?php
namespace App\Http\Controllers\Admin;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
    private $objvoucher;
    function __construct()
    {
        $this->objvoucher = new Voucher();
    }

    function index()
    {
        $data["voucher"] = Voucher::all_voucher();
        $data["title"]   = "Voucher";
        $data['content'] = 'admin/voucher/voucher';
        return view("/admin/index",$data);
    }

    function modal_voucher_insert()
    {
        return view("admin/voucher/modal_voucher_insert");
    }

    function voucher_insert_process(Request $request)
    {
        /*
              'voucher_id',"voucher_code","type","discount","cashback",
            "description","issued_date","expired_date",
            "created_at","ip_address","user_agent"
        */

        $voucher_code = $request->input("voucher_code");
        $type         = $request->input("type");
        $discount     = $request->input("discount");
        $cashback     = $request->input("cashback");
        $description  = $request->input("description");
        $issued_date  = $request->input("issued_date");
        $expired_date = $request->input("expired_date");
        $created_at   = date("Y-m-d H:i:s");
        
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');


        $validator = Validator::make($request->all(), [
            'voucher_code'          => 'required|unique:voucher_tbl|max:255',
            'type'                  => 'required',
            'issued_date'           => 'required',
            "expired_date"          => "required",
        ]);

        if(!$validator->fails())
        {
            $arr = array(
                'voucher_code'  => $voucher_code, 
                'type'          => $type ,
                "discount"      => $discount,
                "cashback"      => $cashback,
                "description"   => $description,
                "issued_date"   => $issued_date,
                "expired_date"  => $expired_date,
                "created_at"    => $created_at,
                "ip_address"    => $ip_address,
                "user_agent"    => $user_agent
            );

            $q = $this->objVoucher->insert_voucher($arr);

            $new_id = $q;
            $voucher_id = $new_id;
           
            echo Alert::success("You successfully Insert new Voucher");
            echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";


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

    function modal_voucher_update(Request $request)
    {
        $voucher = $request->input("voucher_id");
        $data["voucher"] = $voucher =  $this->objVoucher->detail_voucher($voucher_id);
        return view("admin/bank/modal_bank_update",$data);
  
    }

    function bank_update_process(Request $request)
    {
        $voucher_id   = $request->input("voucher_id");
        $voucher_code = $request->input("voucher_code");
        $type         = $request->input("type");
        $discount     = $request->input("discount");
        $cashback     = $request->input("cashback");
        $description  = $request->input("description");
        $issued_date  = $request->input("issued_date");
        $expired_date = $request->input("expired_date");
        $created_at   = date("Y-m-d H:i:s");
        
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');


        $validator = Validator::make($request->all(), [
            'voucher_id'            => "required|integer",
            'voucher_code'          => 'required|max:255',
            'type'                  => 'required',
            'issued_date'           => 'required',
            "expired_date"          => "required",
        ]);

        
        if(!$validator->fails())
        {
            $arr = array(
                "voucher_id"    => $voucher_id,
                'voucher_code'  => $voucher_code, 
                'type'          => $type ,
                "discount"      => $discount,
                "cashback"      => $cashback,
                "description"   => $description,
                "issued_date"   => $issued_date,
                "expired_date"  => $expired_date,
                "created_at"    => $created_at,
                "ip_address"    => $ip_address,
                "user_agent"    => $user_agent
            );

            $q = $this->objVoucher->update_voucher($arr);

           
            echo Alert::success("You successfully Update Voucher");
            echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";


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

    function modal_voucher_delete(Request $request)
    {
        $voucher_id = $request->input("voucher_id");
        $data["voucher"] = $this->objVoucher->detail_voucher($voucher_id);
        return view("admin/voucher/modal_voucher_delete",$data);
    }

    function voucher_delete_process(Request $request){
        
        $voucher_id = $request->input("voucher_id");

        $this->objVoucher->delete_voucher($voucher_id);

        echo Alert::success("You successfully Delete Voucher");
        echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";
    }
}
