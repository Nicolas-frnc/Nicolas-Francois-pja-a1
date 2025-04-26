<?php

class SignupContr extends signup {

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;
    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }


    public function signupUser(){
        if($this->emptyInput() == false){
            header("location: ../register.php?error=emptyinput"); // https://youtu.be/BaEm2Qv14oU?t=2584
        }
        if($this->invalidUid() == false){
            header("location: ../register.php?error=usurname");
        }
        if($this->invalidEmail() == false){
            header("location: ../register.php?error=email");
        }
        if($this->pwdMatch() == false){
            header("location: ../register.php?error=passwordmatch");
        }
        if($this->uidTakenCheck() == false){
            header("location: ../register.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);

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
        if (!preg_match("/^[a-zA-Z0-9]+$/", $this->uid)) { // https://youtu.be/BaEm2Qv14oU?list=LL&t=1376
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function invalidEmail(){
        $result;
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    private function pwdMatch(){
        $result;
        if ($this->pwd == $this->pwdRepeat) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    private function uidTakenCheck(){
        $result;
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }





}