<?php

class Signup extends Dbh{

    protected function checkUser($uid, $email){
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?");

        if(!$stmt->execute(arra($uid, $email))){
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
        }
        $resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck;


    }


}