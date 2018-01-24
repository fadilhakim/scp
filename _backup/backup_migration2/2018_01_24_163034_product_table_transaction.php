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
                $this->text("product_title");

            }
            $this->enum("product_availability",["Ready Stock","Pre Order","Sales Stock"]);
            $this->string("product_category",20);
            $this->string("status",20);
            $this->integer("price",15);
            $this->integer("old_price",15);
            $this->integer("stock",8);
            $this->integer("weight",8);

            $table->datetime("created_at");
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
