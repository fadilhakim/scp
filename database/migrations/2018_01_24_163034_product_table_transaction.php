<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductTableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("product_tbl",function(Blueprint $table){
            //create column 
            if(!Schema::hasColumn("product_tbl","product_title"))
            {
                $table->text("product_title");

            }
            $table->enum("product_availability",["Ready Stock","Pre Order","Sales Stock"]);
            $table->string("product_category",20);
            $table->string("status",20);
            $table->integer("price")->length(10)->unsigned();
            $table->integer("old_price")->length(10)->unsigned();
            $table->integer("stock")->length(10)->unsigned();
            $table->integer("weight")->length(10)->unsigned();
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
