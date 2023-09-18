<?php

namespace Database\Seeders;

use App\Models\BloodType;
use App\Models\Nationality;
use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Family extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('families')->delete();
        $my_parents = new \App\Models\Family();
        $my_parents->email = 'hani@yahoo.com';
        $my_parents->password = Hash::make('1234567890');
        $my_parents->father_name = ['en' => 'Hani', 'ar' => ' هاني'];
        $my_parents->father_national_id = '12345678';
        $my_parents->father_passport_id = '12345678';
        $my_parents->father_phone = '1234567810';
        $my_parents->father_job = ['en' => 'programmer', 'ar' => 'مبرمج'];
        $my_parents->father_nationality_id = Nationality::all()->unique()->random()->id;
        $my_parents->father_blood_type_id =BloodType::all()->unique()->random()->id;
        $my_parents->father_religion_id = Religion::all()->unique()->random()->id;
        $my_parents->father_address ='جدة';
        $my_parents->mother_name = ['en' => 'SS', 'ar' => 'سس'];
        $my_parents->mother_national_id = '0987654321';
        $my_parents->mother_passport_id = '0987654321';
        $my_parents->mother_phone = '0987654321';
        $my_parents->mother_job = ['en' => 'Teacher', 'ar' => 'معلمة'];
        $my_parents->mother_nationality_id = Nationality::all()->unique()->random()->id;
        $my_parents->mother_blood_type_id =BloodType::all()->unique()->random()->id;
        $my_parents->mother_religion_id = Religion::all()->unique()->random()->id;
        $my_parents->mother_address ='جدة';
        $my_parents->save();
    }
}
