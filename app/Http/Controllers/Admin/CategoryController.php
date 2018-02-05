<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;

class CategoryController extends Controller
{
    //

    function index()
    {
        $data["category"] = Category::all_category();
        $data["title"]   = "Product Category";
        $data['content'] = 'admin/category/category';
        return view("admin/index",$data);
    }

    function subcategory(Request $request)
    {
        $category_id = $request->input("category_id");
        $data["subcategory"] = Category::list_subcategory($category_id);      
       
        return view("admin/category/modal_subcategory",$data);
    }

    function insert_category_modal()
    {

    }

    function insert_subcategory_modal()
    {

    }

    function insert_categoty_process()
    {

    }

    function insert_subcategory_process()
    {

    }

    function update_category_process()
    {

    }

    function delete_category_modal()
    {

    }

    function delete_subcategory_modal()
    {

    }
}
