<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees_types')->delete();

        $fees = [
            ['en'=> 'Registration Fee', 'ar'=> 'رسوم التسجيل'],
            ['en'=> 'Tuition Fee', 'ar'=> 'رسوم الدراسية'],
            ['en'=> 'Books Fee', 'ar'=> 'رسوم الكتب'],
            ['en'=> 'Bus Fee', 'ar'=> 'رسوم الباص'],

        ];
        foreach ($fees as $fee) {
            \App\Models\FeesType::create(['name' => $fee]);
        }
    }
}
