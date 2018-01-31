<?php

use Illuminate\Database\Seeder;
use App\Admin\User_admin; // ambil dari model

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $create = User_admin::firstOrCreate (
            
        );
    }
}
