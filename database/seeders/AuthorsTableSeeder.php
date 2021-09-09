<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('authors')->insert([
            array('first_name' => 'Jordan', 'last_name' => 'Peterson', 'created_at' => Carbon::now()),
            array('first_name' => 'Kazuo', 'last_name' => 'Ishiguro', 'created_at' => Carbon::now()),
            array('first_name' => 'Ransom', 'last_name' => 'Riggs', 'created_at' => Carbon::now()),
            array('first_name' => 'Robert', 'last_name' => 'Pirsig', 'created_at' => Carbon::now()),
            array('first_name' => 'Paulo', 'last_name' => 'Coelho', 'created_at' => Carbon::now()),
            array('first_name' => 'Paolo', 'last_name' => 'Sorrentino', 'created_at' => Carbon::now())
        ]);
    }
}
