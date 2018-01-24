<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasTable("admin_tbl"))
        {
            Schema::create("admin_tbl",function(Blueprint $table){
                $table->increment("admin_id");
                $table->string("username");
                $table->string("password");
                $table->string("email");
                $table->integer("role_id");
                $table->integer("status");
                
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
