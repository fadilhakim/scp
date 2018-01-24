<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderTableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


         //
         Schema::table("order_tbl",function($table)
         {
            $table->integer("grand_total")->unsigned();
            $table->integer("ongkir")->unsigned();
            $table->integer("subtotal")->unsigned();
            $table->enum("kurir",["jne","tiki","pos","pickup"]);
            $table->integer("total_berat")->unsigned();
            $table->string("kurir_service",20);
            $table->float("tax");
            $table->string("pupose_bank",20);
            $table->enum("status",
            ["pending","confirm","shipping","cancel","done"]);
            $table->integer("user_addtr_id")->unsigned();
            
            // foreign
            $table->foreign("user_id")->references("id")->on("users");
         });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
