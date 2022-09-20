<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            ["role_id"=>"1","user_id"=>"1"],
            ["role_id"=>"1","user_id"=>"2"],
        ];

        DB::table('role_user')->insert($records);
    }
}
