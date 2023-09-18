<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{

    public function run()
    {
        DB::table('settings')->delete();

        $settings =
            [
                ['key'=>'current_academic_year','value'=>'2021-2022'],
                ['key'=>'school_name_acronym','value'=>'F-Kids'],
                ['key'=>'school_name','value'=>'future_kids-school'],
                ['key'=>'end_first_term','value'=>'01-12-2021'],
                ['key'=>'end_second_term','value'=>'01-03-2022'],
                ['key'=>'phone','value'=>'012-6123333'],
                ['key'=>'address','value'=>'Jeddah - Saudi Arabia'],
                ['key'=>'school_email','value'=>'future_kids@gmail.com'],
                ['key'=>'logo','value'=>'school.jpg'],

            ];

        DB::table('settings')->insert($settings);

    }
}
