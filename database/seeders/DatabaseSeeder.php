<?php

namespace Database\Seeders;

use App\Models\BloodType;
use App\Models\FeesType;
use App\Models\Grade;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(BloodTypeSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(NationalitySeeder::class);
        $this->call(Gender::class);
        $this->call(Specialization::class);
        $this->call(GradeSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(FeesTypeSeeder::class);
        $this->call(Family::class);
        $this->call(PaymentTypeSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
