<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable("product_tbl"))
        {
            Schema::create('product_tbl', function (Blueprint $table) {
                $table->increments('product_id');
                $table->timestamp("updated_at");
                $table->datetime("created_at");
    
                // foreign key
                $table->ipAddress("ip_address");
                $table->string("user_agent",150);
               
    
            });
        }

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_tbl');
    }
}
