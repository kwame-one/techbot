<?php

namespace App\Http\Controllers;
use Twilio\Rest\Client;
use App\User;
use Illuminate\Http\Request;
use Log;
use Twilio\Twiml;
use App\Question;
Use App\CurrentIndex;

class BotController
{
    protected $data;
    protected $response;
    protected $greetings = ['yo', 'hello', 'hi', 'xup', 'sup', 'hey', 'heya'];


    public function __construct($data) {
        $this->response = new Twiml;
        $this->data = $data;
    }

    //reply current user
    public function reply() {
        if(!$this->checkAuth() && $this->getQuestionIndex() == null){
            $this->setUserCurrentQuestion();
            $this->sendMessage($this->getQuestion(1));
        }else if($this->checkAuth() && in_array(strtolower($this->data['Body']), $this->greetings)) {
            $this->setUserCurrentQuestion(2);
            $nextQuestion = "Hi ".$this->getUser()->name.", welcome\n".$this->template("Please select any of the options below").$this->getQuestion(2);
            $this->sendMessage($nextQuestion);
        }else{
            $index = $this->getQuestionIndex();
            $this->compute($index, $this->data['Body']);
            
        }
    }

    //get contact of current user
    function getContact() {
        return explode(":", $this->data['From'])[1];
    }

    //check whether current user is already stored in db
    function checkAuth() {
        $user = User::where('contact', $this->getContact())->first();
        if($user)
            return true;
        return false;
    }

    //get details of current user
    function getUser() {
        return User::where('contact', $this->getContact())->first();
    }

    //get user current question index
    function getQuestionIndex() {
        $index = CurrentIndex::where('contact', $this->getContact())->first();
        return $index == null ? null : $index->question_id;
      
    }

    //send whatsapp message function
    function sendMessage($msg) {
        $this->response->message($msg);
        print($this->response);
    }

    //get question based on index provided
    function getQuestion($index) {
        return Question::where('number', $index)->first()->question;
    }

    function setUserCurrentQuestion($index=null) {
        $contact = $this->getContact();
        $questionIndex = CurrentIndex::where('contact', $contact)->first();
        if(!$questionIndex)
            CurrentIndex::create(['contact' => $contact]);
        else 
           $questionIndex->update(['question_id' => $index]);
        
        return CurrentIndex::where('contact', $contact)->first()->question_id;
    }

    function increaseIndex($increment=1){
        $current = $this->getQuestionIndex() == null ? 0 : $this->getQuestionIndex();
        for($i=1; $i<=$increment; $i++)
            $current = $current + 1;
        return $current;
    }

    function compute($index, $body) {
        $nextQuestion = "";
        $questionId = "";

        if($this->isInputValid($index)) {
            if ($index == 1) {
                User::create(['name' => $body, 'contact' => $this->getContact()]);
                $questionId = $this->setUserCurrentQuestion(++$index);
                $nextQuestion = "Hi ".$this->getUser()->name.", welcome\n".$this->template("Please select any of the options below").$this->getQuestion($questionId);
            }else if($index == 2) {
                if($body == 1){
                    $questionId = $this->setUserCurrentQuestion($this->increaseIndex());
                    $nextQuestion = $this->template("Which of the colleges do you want to visit?").$this->getQuestion($questionId); 
                }else if($body == 2) {
                    $questionId = $this->setUserCurrentQuestion($this->increaseIndex(2));
                    $nextQuestion = $this->template().$this->getQuestion($questionId); 
                }else if($body == 3){
                    $questionId = $this->setUserCurrentQuestion($this->increaseIndex(3));
                    $nextQuestion = $this->template().$this->getQuestion($questionId); 
                }
            }else if($index == 3) {

            }else if($index == 4) {

            }else if($index == 5) {

            }
        }else{ 
            $options = Question::where('number', $index)->first()->options_num;
            $nextQuestion = "Invalid input\n Input should be range from *1* to *$options*";
        }

        $this->sendMessage($nextQuestion);
    }

    function isInputValid($index) {
        if($index == 1)
            return true;
        $input = $this->data['Body'];
        $options = Question::where('number', $index)->first()->options_num;
        if($input >= 1 and $input <= $options)
            return true;
        return false; 
    }


    function template($msg) {
        return "*$msg*\n";
        return "*Please select any of the options below*\n";
    }

}

