<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
        	['question' => "Hello There, my name is *Techbot* a guide to help you out with directions to various places on KNUST Campus.\nPlease provide your name to continue", 'number' => 1, 'options_num' => 0],
        	['question' => "1. Colleges\n2. Halls / Hostels\n3. Others", 'number' => 2, 'options_num' => 3],
        	['question' => "1. Independence Hall (Indece)\n2. Africa Hall\n3. University Hall (Kat)\n4. Republic Hall (Repu)\n5. Unity Hall (Conti)\n6. Queen Elizabeth II Hall (Queens)\n7. Brunei Hostel\n8. Hall 7\n8. SRC Hostel\n", 'number' => 4, 'options_num' => 8],
        	['question' => "1. College of Humanities & Social Scieneces\n2. College of Health Sciences\n3. College of Agric & Natural Resources\n4. College of Art & Built Environment\n5.College of Science\n6. College of Engineering", 'number' => 3, 'options_num' => 6],
        	['question' => "1. CCB Auditorium\n2. Prempeh Library\n3. Commercial Area\n4. DOS Office\n5. Examination Center", 'number' =>5 , 'options_num' => 5]
        ]);
    }
}
