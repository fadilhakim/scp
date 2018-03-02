<?php



namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Libraries\Alert;
use App\Libraries\FolderHelper;

class BankController extends Controller
{
    private $objbank;
    function __construct()

    {

        $this->objbank = new Bank();

    }



    function index()

    {

        $data["bank"] = Bank::all_bank();

        $data["title"]   = "Bank Account";

        $data['content'] = 'admin/bank/bank';

        return view("/admin/index",$data);

    }



    function modal_bank_insert()

    {

        return view("admin/bank/modal_bank_insert");

    }



    function bank_insert_process(Request $request)

    {

        // dd($request->file('bank_logo')->getClientOriginalName());

        $bank_name          = $request->input("bank_name");

        $bank_logo          = $request->file('bank_logo');

        $bank_acc_no        = $request->input("bank_acc_no"); 

        $bank_owner         = $request->input("bank_owner");

        $new_image_name = str_replace(" ","-",strtolower($bank_logo->getClientOriginalName()));



        $validator = Validator::make($request->all(), [

            'bank_name'             => 'required|unique:bank_tbl|max:255',

            'bank_logo'             => 'required',

            'bank_acc_no'           => 'required',

            "bank_owner"            => "required",

        ]);



        if(!$validator->fails())

        {

            $arr = array(

                'bank_name' => $bank_name, 

                'bank_logo' => $new_image_name ,

                "bank_acc_no"=>$bank_acc_no,

                "bank_owner"=>$bank_owner,

            );



            $q = $this->objbank->insert_bank($arr);



            $new_id = $q;

            $bank_id = $new_id;

            $arr_image["bank_id"] = $new_id;

            if($request->hasFile("bank_logo"))

            {

                

                $arr_image["bank_logo"] = $new_image_name;



                $this->objbank->update_bank_image($arr_image);

                //dd($new_image_name);

                //Move Uploaded File

                $destinationPath = "public/banks";

                //FolderHelper::create_folder_bank($bank_id);

                $request->file("bank_logo")->move($destinationPath,$new_image_name);

                

            }

            echo Alert::success("You successfully Insert new bank Account");

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



    function modal_bank_update(Request $request)

    {

        $bank_id = $request->input("bank_id");

        $data["bank"] = $bank =  $this->objbank->detail_bank($bank_id);

        return view("admin/bank/modal_bank_update",$data);

  

    }



    function bank_update_process(Request $request)

    {

        $bank_id            = $request->input("bank_id");

        $bank_name          = $request->input("bank_name");

        $old_logo           = $request->input("old_logo");

        $bank_logo          = $request->file('bank_logo');

        $bank_acc_no        = $request->input("bank_acc_no"); 

        $bank_owner         = $request->input("bank_owner");





        $validator = Validator::make($request->all(), [

            'bank_id'               => "required|integer",

            'bank_name'             => 'required|max:255',

            'bank_acc_no'           => 'required',

            "bank_owner"            => "required",

            "old_logo"              => "required"

        ]);



        

        if(!$validator->fails())

        {

            $arr = array(

                "bank_id"       => $bank_id,

                'bank_name'     => $bank_name, 

                "bank_acc_no"   =>  $bank_acc_no,

                "bank_logo"     =>  $bank_logo,

                "bank_owner"    =>  $bank_owner,

                "old_logo"      => $old_logo

            );



            $q = $this->objbank->update_bank($arr);



            if($request->hasFile("bank_logo"))

            {

                $new_logo = str_replace(" ","-",strtolower($bank_logo->getClientOriginalName()));

                $data["bank_logo"] = $new_logo;

                $data["bank_id"] = $bank_id;

                $this->objbank->update_bank_image($data);

                

                //Move Uploaded File

                $destinationPath = "public/banks";

                //FolderHelper::create_folder_bank($bank_id);

                $request->file("bank_logo")->move($destinationPath,$new_logo);

                

            }

            echo Alert::success("You successfully Update Bank Account");

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



    function modal_bank_delete(Request $request)

    {

        $bank_id = $request->input("bank_id");

        $data["bank"] = $this->objbank->detail_bank($bank_id);

        return view("admin/bank/modal_bank_delete",$data);

    }



    function bank_delete_process(Request $request){

        

        $bank_id = $request->input("bank_id");



        $this->objbank->delete_bank($bank_id);



        echo Alert::success("You successfully Delete Product");

        echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";

    }





}

