<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $created_at = Carbon::now()->format('Y-m-d H:i:s');

        $records = [
            ["name" => "Sepehr","email"=>"sepehr@gmail.com","password"=>Hash::make('123'), "email_verified_at" => $created_at, "created_at" => $created_at],
            ["name" => "Hoda","email"=>"hoda@gmail.com","password"=>Hash::make('123'), "email_verified_at" => $created_at, "created_at" => $created_at],
        ];

        DB::table('users')->insert($records);
    }
}
