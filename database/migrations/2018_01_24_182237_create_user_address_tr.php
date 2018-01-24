<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressTr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        if(!Schema::hasTable("user_address_tr"))
        {
            Schema::create("user_address_tr",function(Blueprint $table){
                $table->increments("user_addtr_id");
                $table->integer("user_id")->unsigned();
                $table->string("contact_person");
                $table->text("billing_address");
                $table->string("shipping_address");
                $table->integer("provinsi")->unsigned();
                $table->integer("kota")->unsigned();
                $table->string("kecamatan",50);
                $table->string("kode_pos",10);
                $table->string("no_hp",11);

                $table->timestamp("updated_at");
                $table->datetime("created_at");
                $table->ipAddress("ip_address");
                $table->string("user_agent");
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
