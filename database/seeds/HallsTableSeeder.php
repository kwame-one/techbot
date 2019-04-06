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
        	['name' => 'Independence Hall (Indece)', 'lat' => '6.677173', 'lng' => '-1.571736'],
        	['name' => 'Africa Hall', 'lat' => '6.674703', 'lng' => '-1.571691'],
        	['name' => 'University Hall (Kat)', 'lat' => '6.672379', 'lng' => '-1.572574'],
        	['name' => 'Republic Hall (Repu)', 'lat' => '6.678016', 'lng' => '-1.573797'],
        	['name' => 'Unity Hall (Conti)', 'lat' => '6.679559', 'lng' => '-1.571532'],
        	['name' => 'Queen Elizabeth II Hall (Queens)', 'lat' => '6.677044', 'lng' => '-1.574389'],
        	['name' => 'Brunei Hostel', 'lat' => '6.669935', 'lng' => '-1.573983'],
        	['name' => 'Hall 7', 'lat' => '6.679217', 'lng' => '-1.573366'],
        	['name' => 'SRC Hostel', 'lat' => '6.681295', 'lng' => '-1.571642']
        ]);
    }
}
