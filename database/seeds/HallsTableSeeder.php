<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('halls')->insert([
        	['name' => 'Independence Hall (Indece)', 'lat' => '', 'lng' => ''],
        	['name' => 'Africa Hall', 'lat' => '', 'lng' => ''],
        	['name' => 'University Hall (Kat)', 'lat' => '', 'lng' => ''],
        	['name' => 'Republic Hall (Repu)', 'lat' => '', 'lng' => ''],
        	['name' => 'Unity Hall (Conti)', 'lat' => '', 'lng' => ''],
        	['name' => 'Queen Elizabeth II Hall (Queens)', 'lat' => '', 'lng' => ''],
        	['name' => 'Brunei Hostel', 'lat' => '', 'lng' => ''],
        	['name' => 'Hall 7', 'lat' => '', 'lng' => ''],
        	['name' => 'SRC Hostel', 'lat' => '', 'lng' => '']
        ]);
    }
}
