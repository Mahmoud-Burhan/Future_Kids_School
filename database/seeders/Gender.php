<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;

class Gender extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('genders')->delete();

        $genders = [
            ['en'=> 'Male', 'ar'=> 'ذكر'],
            ['en'=> 'Female', 'ar'=> 'انثي'],

        ];
        foreach ($genders as $ge) {
            \App\Models\Gender::create(['name' => $ge]);
        }
    }
}
