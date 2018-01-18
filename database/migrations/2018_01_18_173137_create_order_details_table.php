<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail_tbl', function (Blueprint $table) {
            $table->increments('order_detail_id');

            $table->ipAddress("ip_address");
            $table->string("user_agent",150);
            //$table->datetime("created_at");
            $table->timestamps("updated_at");

            $table->integer("order_id")->unsigned();
            $table->integer("product_id")->unsigned();
            $table->integer("user_id")->unsigned();

        });

        Schema::table("order_detail_tbl",function($table){
          //foreign key
          //$table->foreign("order_id")->references("order_id")->on("order_tbl");
          //$table->foreign("product_id")->references("product_id")->on("product_tbl");
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
        Schema::dropIfExists('order_detail_tbl');
    }
}
