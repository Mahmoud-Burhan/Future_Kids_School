<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('grades')->delete();

        $grades = [

            [
                'en' => ' Elementary',
                'ar' => 'ابتدائي  '
            ],
            [
                'en' => ' Middle School',
                'ar' => ' متوسط '
            ],
            [
                'en' => ' High School',
                'ar' => '  ثانوي'
            ],
        ];
        foreach ($grades as $g) {
            Grade::create(['name' => $g]);
        }
    }
}
