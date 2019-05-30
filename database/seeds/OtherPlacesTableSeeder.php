<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtherPlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('other_places')->insert([
        	['name' => 'CCB Auditorium', 'lat' => '6.675515', 'lng' => '-1.565623'],
        	['name' => 'Prempeh Library', 'lat' => '6.675093', 'lng' => '-1.572950'],
        	['name' => 'Commercial Area', 'lat' => '6.682552', 'lng' => '-1.575671'],
        	['name' => 'Office of DOS', 'lat' => '6.682566', 'lng' => '-1.576346'],
        ]);
    }
}
