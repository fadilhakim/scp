<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAddressTrTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("user_address_tr",function(Blueprint $table){
             
        });

        Schema::table("order_tbl",function(Blueprint $table){
           
            //$table->foreign("user_addtr_id")->references("user_addtr_id")->on("user_address_tr");
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
