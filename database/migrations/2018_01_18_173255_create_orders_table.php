<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("order_tbl",function(Blueprint $table){

          $table->increments("order_id");

          $table->ipAddress("ip_address");
          $table->string("user_agent");
          //$table->datetime("created_at");
          $table->timestamps("updated_at");

          $table->integer("user_id")->unsigned();
        });

        Schema::table("order_tbl",function($table)
        {
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
        //
        Schema::dropIfExists("order_tbl");
    }
}
