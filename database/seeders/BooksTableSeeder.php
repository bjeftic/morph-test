<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('books')->insert([
            array('author_id' => 1, 'name' => 'Beyond order', 'created_at' => Carbon::now()),
            array('author_id' => 1, 'name' => 'Maps of Meaning', 'created_at' => Carbon::now()),
            array('author_id' => 1, 'name' => 'Political Correctness Gone Mad?', 'created_at' => Carbon::now()),
            array('author_id' => 2, 'name' => 'The Buried Giant', 'created_at' => Carbon::now()),
            array('author_id' => 3, 'name' => 'Hollow city', 'created_at' => Carbon::now()),
            array('author_id' => 3, 'name' => 'A map of days', 'created_at' => Carbon::now()),
            array('author_id' => 4, 'name' => 'Zen and the Art of Motorcycle Maintenance', 'created_at' => Carbon::now()),
            array('author_id' => 4, 'name' => 'Lilla: An inquiry into Morals', 'created_at' => Carbon::now()),
            array('author_id' => 5, 'name' => 'The Alchemist', 'created_at' => Carbon::now()),
            array('author_id' => 5, 'name' => 'Zahir', 'created_at' => Carbon::now()),
            array('author_id' => 5, 'name' => 'Aleph', 'created_at' => Carbon::now()),
            array('author_id' => 5, 'name' => 'Eleven Minutes', 'created_at' => Carbon::now()),
            array('author_id' => 5, 'name' => 'The Devil and Miss Prym', 'created_at' => Carbon::now()),
            array('author_id' => 6, 'name' => 'Youth', 'created_at' => Carbon::now()),
            array('author_id' => 6, 'name' => 'Tony Pagoda and his friends', 'created_at' => Carbon::now()),
            array('author_id' => 6, 'name' => 'The great beauty', 'created_at' => Carbon::now())
        ]);
    }
}
