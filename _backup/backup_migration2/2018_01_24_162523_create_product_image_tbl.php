<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImageTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasTable("product_image_tbl"))
        {
            Schema::create("product_image_tbl",function(Blueprint $table){
               $table->increment("image_id",4);
               $table->integer("product_id");
               $table->string("image_name");
               $table->timestamp("updated_at")->nullable();

               $table->ipAddress('ip_address');
               $table->string("user_agent");
               $table->datetime("created_at");
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
        //
    }
}
