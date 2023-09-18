<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Specialization;
use App\Models\Gender;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{

    public function run()
    {
        DB::table('teachers')->delete();
        $my_parents = new \App\Models\Teacher();
        $my_parents->email = 'm.burhan11@outlook.com';
        $my_parents->password = Hash::make('1234567890');
        $my_parents->name = ['en' => 'Mahmoud Mohammed Burhan', 'ar' => ' محمود محمد برهان'];
        $my_parents->specialization_id =Specialization::all()->unique()->random()->id;
        $my_parents->gender_id =Gender::all()->unique()->random()->id;
        $my_parents->joining_date = '2022-11-01';
        $my_parents->address = 'Jeddah - Saudi Arabia';
        $my_parents->save();
    }
}
