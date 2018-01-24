<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /* if(!Schema::hasTable("payment_tbl"))
        {
            Schema::create('payment_tbl', function (Blueprint $table) {
                $table->increments('payment_id');
    
                $table->ipAddress("ip_address");
                $table->string("user_agent",150);
              
                $table->timestamps("updated_at");
    
                $table->integer("user_id")->unsigned();
                $table->integer("order_id")->unsigned();
    
            });
    
            
        }*/
    
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_tbl');
    }
}
