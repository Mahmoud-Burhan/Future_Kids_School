<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->delete();
        $classrooms = [
            ['en'=> 'Grade 1', 'ar'=> 'الصف الاول'],
            ['en'=> 'Grade 2 ', 'ar'=> 'الصف الثاني'],
            ['en'=> 'Grade 3 ', 'ar'=> 'الصف الثالث'],
            ['en'=> 'Grade 4', 'ar'=> 'الصف الرابع'],
            ['en'=> 'Grade 5 ', 'ar'=> 'الصف الخامس'],
            ['en'=> 'Grade 6 ', 'ar'=> 'الصف السادس'],
            ['en'=> 'Grade 7', 'ar'=> ' الصف الاول المتوسط'],
            ['en'=> 'Grade 8 ', 'ar'=> 'الصف الثاني المتوسط'],
            ['en'=> 'Grade 9 ', 'ar'=> 'الصف الثالث المتوسط'],
            ['en'=> 'Grade 10', 'ar'=> 'الصف الاول الثانوي'],
            ['en'=> 'Grade 11 ', 'ar'=> 'الصف الثاني الثانوي'],
            ['en'=> 'Grade 12 ', 'ar'=> 'الصف الثالث الثانوي'],

        ];

        foreach ($classrooms as $classroom) {
            Classroom::create([
                'class_name' => $classroom,
                'grade_id' => Grade::all()->unique()->random()->id
            ]);
        }
    }
}
