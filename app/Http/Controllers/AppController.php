<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;


class AppController extends Controller
{

    public function messages(Request $request) {
        Log::info($request->all());
        $bot = new BotController($request->all());
        $bot->reply(); 
       
    }
}
