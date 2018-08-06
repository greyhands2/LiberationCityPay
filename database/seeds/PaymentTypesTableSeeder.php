<?php

use Illuminate\Database\Seeder;

class PaymentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentTypes = [
          [
              'id' => 1,
              'name' => 'Tithe',
              'description' => ''
          ],
          [
              'id' => 2,
              'name' => 'Offering',
              'description' => ''
          ],
          [
               'id' => 3,
               'name' => 'Partnership',
               'description' => ''
          ]

        ];

        foreach($paymentTypes as $serial => $paymentType){
             \App\PaymentType::create($paymentType);
        }
    }
}
