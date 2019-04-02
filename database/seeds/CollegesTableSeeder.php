<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colleges')->insert([
        	['name' => 'College of Humanities & Social Scieneces', 'lat' => '', 'lng' => ''],
        	['name' => 'College of Health Sciences', 'lat' => '', 'lng' => ''],
        	['name' => 'College of Agric & Natural Resources', 'lat' => '', 'lng' => ''],
        	['name' => 'College of Art & Built Environment', 'lat' => '', 'lng' => ''],
        	['name' => 'College of Science', 'lat' => '', 'lng' => ''],
        	['name' => 'College of Engineering', 'lat' => '', 'lng' => '']
        ]);
    }
}
