<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Specialization extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('specializations')->delete();

        $specializations = [

            [
                'en'=> 'English',
                'ar'=> 'إنجليزي'
            ],
            [
                'en'=> 'Mathematics',
                'ar'=> 'الرياضيات'
            ],
            [
                'en'=> 'Biology',
                'ar'=> 'الاحياء '
            ],
            [
                'en'=> 'Physics',
                'ar'=> 'الفيزياء '
            ],
            [
                'en'=> 'Chemistry',
                'ar'=> 'كيمياء'
            ],
            [
                'en'=> 'Science',
                'ar'=> 'علوم'
            ],
            [
                'en'=> 'Social science	',
                'ar'=> 'علوم اجتماعية'
            ],
            [
                'en'=> 'Geography',
                'ar'=> 'تاريخ'
            ],
            [
                'en'=> 'Geography',
                'ar'=> 'جغرافية '
            ],
        ];

        foreach ($specializations as $s) {
            \App\Models\Specialization::create(['name' => $s]);
        }

    }
}
