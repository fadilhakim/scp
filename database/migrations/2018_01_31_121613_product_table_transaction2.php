<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductTableTransaction2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasTable("category_tbl"))
        {
            Schema::create("category_tbl",function(Blueprint $table){
                $table->increments("category_id") ;
                $table->string("category_name",100);

                $table->timestamp("updated_at");
                $table->datetime("created_at");
                $table->ipAddress("ip_address");
                $table->string("user_agent",150);   
            });
        }

        Schema::table("category_tbl",function(Blueprint $table){
           
        });

        if(!Schema::hasTable("subcategory_tbl")){
            Schema::create("subcategory_tbl",function(Blueprint $table){
                $table->increments("subcategory_id");
                $table->string("subcategory_name",100);
                $table->integer("category_id");
                $table->timestamp("updated_at");
                $table->datetime("created_at");
                $table->ipAddress("ip_address");
                $table->string("user_agent",150);
            });
        }

        Schema::table("subcategory_tbl",function(Blueprint $table){
            //$table->foreign('category_id')->references('category_id')->on('category_tbl');
        });

        Schema::table("product_tbl",function(Blueprint $table){
            $table->text("product_description");
            $table->integer("product_category")->change();
            $table->integer("product_subcategory");

            //$table->foreign('product_category')->references('category_id')->on('category_tbl');
            //$table->foreign('product_subcategory')->references('subcategory_id')->on('subcategory_tbl');
        });

     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
