<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentTableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table("payment_tbl",function($table){
            
            
            $table->datetime("created_at");
            $table->ipAddress("ip_address");
            $table->string("user_agent");

            // foreign key
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("order_id")->references("order_id")->on("order_tbl");
        });*/
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
