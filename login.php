<?php
    require("classes/uzytkownik.php");

    $usr_name = $_POST['username'];
    $usr_pass = $_POST['password'];

    $user = new Uzytkownik();
    $user->nazwa = $usr_name;
    $user->skrot_hasla = md5($usr_pass);
    $user->Zaloguj();   
?>