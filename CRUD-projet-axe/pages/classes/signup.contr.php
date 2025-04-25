<?php

class SignupContr {

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;
    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        $this->$uid = $uid;
        $this->$pwd = $pwd;
        $this->$pwdRepeat = $pwdRepeat;
        $this->$email = $email;
    }

    private function emptyInput(){
        $result;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)){
            $result = false;

        }
        else{
            $result = true;
        }
        return $result;
    }

    private function invalidUid(){
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) { // https://youtu.be/BaEm2Qv14oU?list=LL&t=1376
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function invalidEmail(){
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else{
            $result = true;
        }
    }
    private function pwdMatch(){
        $result;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }





}