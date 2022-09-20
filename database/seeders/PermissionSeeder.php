<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            ["title"=>"create"],
            ["title"=>"update"],
            ["title"=>"read"],
            ["title"=>"delete"],
        ];

        DB::table('permissions')->insert($records);
    }
}
