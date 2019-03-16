<?php

namespace App\Http\Controllers;
use Twilio\Rest\Client;
use App\User;
use Illuminate\Http\Request;
use Log;
use Twilio\Twiml;

class BotController
{
    protected $data;
    protected $response;

    public function __construct($data) {
        $this->response = new Twiml;
        $this->data = $data;
    }

    public function reply() {
        if(!$this->checkAuth() || $this->getQuestionIndex() == null){
            $this->sendMessage("hello");
        }else{
            
        }
    }

    public function getContact() {
        return explode(":", $this->data['From'])[1];
    }

    public function checkAuth() {
        $user = User::where('contact', $this->getContact())->first();
        if($user)
            return true;
        return false;
    }

    public function getUser() {
        return User::where('contact', $this->getContact())->first();
    }

    public function getQuestionIndex() {
        $index = $this->getUser()->questionIndex;
        return $index;
    }

    public function sendMessage($msg) {
        $this->response->message($msg);
        print($this->response);
    }


}
