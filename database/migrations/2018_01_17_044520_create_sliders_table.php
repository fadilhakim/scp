<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable("sliders"))
        {
            Schema::create('sliders', function (Blueprint $table) {
                $table->increments('id');
                $table->string('image_name',100);
                $table->string('url_image',200);
                
                $table->timestamp("updated_at");
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
        Schema::dropIfExists('sliders');
    }
}
