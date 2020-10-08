<?php

use Illuminate\Database\Seeder;
use App\Models\Sales;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
   {
      $faker = Faker\Factory::create('es_ES');

      for($a = 0; $a < 100 ; $a++) {
         $user = Sales::create(array(
            'amount' => rand(10,300), 
            'customer_document' => $faker->unique()->numberBetween(11111111111,99999999999)
         ));
      }
   }
}