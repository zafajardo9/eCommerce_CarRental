<?php

if(isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["userName"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["repeatpwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (emptyInputSignUp($name, $email, $userName, $pwd, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }


    // if (invalidEmail($email) !== false) {
    //     header("location: ../signup.php?error=emptyemail");
    //     exit();
    // }  

    

    if (pwdMatch($pwd, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }   

    if (uidExist($conn, $userName) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    // if (invalidUid($userName) !== false) {
    //     header("location: ../signup.php?error=emptyuid");
    //     exit();
    // }



    createUser($conn, $name, $email, $userName, $pwd);


} else {
    header("location: ../signup.php");exit();
}