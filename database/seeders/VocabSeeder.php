<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VocabSeeder extends Seeder
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
            ["user_id" => "1","title"=>"Audit","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "1","title"=>"regulation","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "1","title"=>"advocate","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "1","title"=>"coverage","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "1","title"=>"script","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "1","title"=>"cultivate","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "1","title"=>"To take an early retirement","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "1","title"=>"Demanding job","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "1","title"=>"Hand over fist","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "1","title"=>"A cashless society","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "1","title"=>"Fraud","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "1","title"=>"Under the table","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "2","title"=>"Audit","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "2","title"=>"regulation","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "2","title"=>"advocate","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "2","title"=>"coverage","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "2","title"=>"script","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
            ["user_id" => "2","title"=>"cultivate","last_seen" => $created_at,"last_status" => "notknow","repeat_number" => "0", "created_at" => $created_at],
        ];

        DB::table('vocabs')->insert($records);
    }
}
