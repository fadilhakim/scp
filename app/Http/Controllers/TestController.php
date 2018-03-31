<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use App\Libraries\Autoload;

use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public $autoObj;
    function __construct()
    {

    }

    public function index()
    {
        //
        echo asset("");
        echo "<br>";
        echo url("");
        //echo URL::asset("");
    }

    function session(Request $request)
    {
        //$request = new Request();
        echo "<h1> Session </h1><hr>";
        //echo $aaaaaaaaaaaaaaaaa["aaa"];
        //$session = $request->session()->all();
        $user = Auth::guard("user")->user();

        $user = session()->all();

        //echo $user->name;
        print_r($user);
        dd($user);        
    }

    function invoice()
    {
        return view("invoice/invoice-fancy-page-inline");
    }

    function send_email()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender   = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
 
        Mail::to("receiver@example.com")->send(new DemoEmail($objDemo));
    }

    function dimas()
    {
        $obj = new Autoload;
        $obj->run();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
