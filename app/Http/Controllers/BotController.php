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
    protected $firstMsg = "Hello There, my name is *Techbot* a guide to help you out with directions to various places on KNUST Campus.\nPlease provide your name to continue";

    public function __construct($data) {
        $this->response = new Twiml;
        $this->data = $data;
    }

    //reply current user
    public function reply() {
        if(!$this->checkAuth() || $this->getQuestionIndex() == null){
            $this->sendMessage($this->firstMsg);
        }else{
            $index = $this->getQuestionIndex();
        }
    }

    //get contact of current user
    public function getContact() {
        return explode(":", $this->data['From'])[1];
    }

    //check whether current user is already stored in db
    public function checkAuth() {
        $user = User::where('contact', $this->getContact())->first();
        if($user)
            return true;
        return false;
    }

    //get details of current user
    public function getUser() {
        return User::where('contact', $this->getContact())->first();
    }

    //get user current question index
    public function getQuestionIndex() {
        $index = $this->getUser()->questionIndex;
        return $index;
    }

    //send whatsapp message function
    public function sendMessage($msg) {
        $this->response->message($msg);
        print($this->response);
    }


}
