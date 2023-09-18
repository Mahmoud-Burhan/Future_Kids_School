<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')->delete();

        $payment = [

            [
                'en'=> 'Full Payment',
                'ar'=> 'المبلغ كامل'
            ],
            [
                'en'=> 'First Installment',
                'ar'=> ' الدفعة الاولى'
            ],
            [
                'en'=> 'Second Installment',
                'ar'=> ' الدفعة الثانية '
            ],

        ];

        foreach($payment as $bg){
            PaymentType::create(['name' => $bg]);
        }
    }
}
