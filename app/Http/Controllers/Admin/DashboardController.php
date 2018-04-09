<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;


// model
use App\Admin_model\user_admin;
use App\Models\Order;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    //
    //
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/login';

    private $objOrder;
    private $objUser;
    private $objProduct;
    private $objVoucher;
    function __construct()
    {
        $this->objOrder = new Order();
        $this->objUser = new User();
        $this->objProduct = new Product();
        $this->objVoucher = new Voucher();
    }

    function index()
    {
        $data["title"] = "Dashboard";
        $data["content"] = "admin/dashboard/content";
        $data["order"] =  $this->objOrder->get_order();
        $data["user"] =  $this->objUser->list_user();
        $data["product"] =  $this->objProduct->all_product();
        $data["voucher"] =  $this->objVoucher->all_voucher();
        return view("admin.index",$data);
    }
}
