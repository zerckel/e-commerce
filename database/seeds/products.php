<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        DB::table('products')->insert([
            'name' => $faker->name,
            'text' => $faker->text,
            'price' => $faker->numberBetween(10,100),
            'pics' => 'https://picsum.photos/id/'. $faker->numberBetween(1, 99) . '/600/400'
        ]);
    }
}
