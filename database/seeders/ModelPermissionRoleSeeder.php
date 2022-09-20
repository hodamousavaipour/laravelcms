<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelPermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            ["role_id"=>"1","permission_id"=>"1","model_name"=>"user"],
            ["role_id"=>"1","permission_id"=>"2","model_name"=>"user"],
            ["role_id"=>"1","permission_id"=>"3","model_name"=>"user"],
            ["role_id"=>"1","permission_id"=>"4","model_name"=>"user"],
            
            ["role_id"=>"1","permission_id"=>"1","model_name"=>"vocab"],
            ["role_id"=>"1","permission_id"=>"2","model_name"=>"vocab"],
            ["role_id"=>"1","permission_id"=>"3","model_name"=>"vocab"],
            ["role_id"=>"1","permission_id"=>"4","model_name"=>"vocab"],

            ["role_id"=>"2","permission_id"=>"1","model_name"=>"vocab"],
            ["role_id"=>"2","permission_id"=>"2","model_name"=>"vocab"],
            ["role_id"=>"2","permission_id"=>"3","model_name"=>"vocab"],
            ["role_id"=>"2","permission_id"=>"4","model_name"=>"vocab"],
        ];

        DB::table('model_permission_role')->insert($records);
    }
}
