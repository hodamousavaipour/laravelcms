<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VocabMeaningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $records = [
            ["vocab_id" => "1","type"=>"noun","meaning" => "an official examination of business and financial records to see that they are true and correct","sample" => "an annual audit"],
            ["vocab_id" => "2","type"=>"noun","meaning" => "an official rule made by a government or some other authority","sample" => "the strict regulations government the sale of weapons."],
            ["vocab_id" => "2","type"=>"adjective","meaning" => "that must be worn or used according to the official rules.","sample" => "in regulaton uniform."],
            ["vocab_id" => "3","type"=>"noun","meaning" => "a person who supports or speaks in favour of somebody of a public plan of action","sample" => "an advocate for hospital workers."],
            ["vocab_id" => "13","type"=>"noun","meaning" => "an official examination of business and financial records to see that they are true and correct","sample" => "an annual audit"],
            ["vocab_id" => "14","type"=>"noun","meaning" => "an official rule made by a government or some other authority","sample" => "the strict regulations government the sale of weapons."],
            ["vocab_id" => "14","type"=>"adjective","meaning" => "that must be worn or used according to the official rules.","sample" => "in regulaton uniform."],
        ];

        DB::table('vocab_meanings')->insert($records);
    }
}
