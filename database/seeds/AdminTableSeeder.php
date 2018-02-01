<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admin_tbl')->insert(
            ['username' => 'alhusna901',
            'password' => bcrypt('999999'),
            "name" => "Aries Dimas Yudhistira",
            "email"=>"alhusna901@gmail.com",
            "role_id"=>1,
            "status"=>"active",
            "ip_address"=>"127.0.0.1",
            "user_agent"=>"mozilla"]
        );

        /* $create = User_admin::firstOrCreate (
            ['username' => 'alhusna901',
            'password' => bcrypt('999999'),
            "name" => "Aries Dimas Yudhistira",
            "email"=>"alhusna901@gmail.com",
            "role_id"=>1,
            "status"=>"active",
            "ip_address"=>"127.0.0.1",
            "user_agent"=>"mozilla"]
            
        );

        $create->fill();
        $create->save();*/
    }
}
