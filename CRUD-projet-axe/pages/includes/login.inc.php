<?php

if(isset($_POST["submit"])){

    // recupere les données du formulaire
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    // https://youtu.be/BaEm2Qv14oU?list=LL&t=1036

    // initialiser le controller
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login.contr.php";
    $login = new LoginContr($uid, $pwd);

    // lancement des erreur dans singup.contr.php
    $login->loginUser();

    // redirection
    header("location: ../login.php?compte=ok");
}
