<?php

if(isset($_post["submit"])){

    // recupere les données du formulaire
    $uid = $_post["uid"];
    $pwd = $_post["pwd"];
    $pwdrepeat = $_post["pwdrepeat"];
    $email = $_post["email"];

    // https://youtu.be/BaEm2Qv14oU?list=LL&t=1036

    include "./classes/signup.class.php";
    include "./classes/signup.inc.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);
}
