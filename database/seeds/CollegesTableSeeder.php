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
        	['name' => 'College of Humanities & Social Scieneces', 'lat' => '6.674717', 'lng' => '-1.565587'],
        	['name' => 'College of Health Sciences', 'lat' => '6.672997', 'lng' => '-1.568432'],
        	['name' => 'College of Agric & Natural Resources', 'lat' => '6.675577', 'lng' => '-1.566665'],
        	['name' => 'College of Art & Built Environment', 'lat' => '6.674102', 'lng' => '-1.564674'],
        	['name' => 'College of Science', 'lat' => '6.673267', 'lng' => '-1.567053'],
        	['name' => 'College of Engineering', 'lat' => '6.673761', 'lng' => '-1.565117']
        ]);
    }
}
