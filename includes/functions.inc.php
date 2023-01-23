<?php

function emptyInputSignUp($name, $email, $userName, $pwd, $pwdrepeat){

    if (empty($name) 
        || empty($email) 
        || empty($userName) 
        || empty($pwd) 
        || empty($pwdrepeat)) {
        return true;
    }else {
        return false;
    }
}

// function invalidUid($userName) {

//     $pattern = '/^[a-zA-Z0-9._-]{3,16}$/';
//     if (preg_match($pattern, $userName)) {
//         return true;
//     }else {
//         return false;
//     }
// }

function invalidEmail($email) {

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }else {
        return false;
    }
}  

function pwdMatch($pwd, $pwdrepeat) {

    if ($pwd !== $pwdrepeat) {
        return true;
    }else {
        return false;
    }
}   

function uidExist($conn, $email) {

    $tsql = "SELECT COUNT(*) FROM Users WHERE userEmail = ?";
    $params = array($email);
    $stmt = sqlsrv_query($conn, $tsql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
    if ($row[0] > 0) {
        return true;
    } else {
        return false;
    }


}

function createUser($conn, $name, $email, $userName, $pwd) {


    $tsql= "INSERT INTO Users (userName,userEmail,userUid,userpwd) VALUES (?,?,?,?);";
    
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    
    $params = array($name, $email, $userName, $hashedpwd);
    $getResults= sqlsrv_query($conn, $tsql, $params);
    $rowsAffected = sqlsrv_rows_affected($getResults);
    //Checker
    if ($getResults == FALSE or $rowsAffected == FALSE) {
    //header
        die(FormatErrors(sqlsrv_errors()));
    }
    
    echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);
    //sqlsrv_free_stmt($getResults);

    header("location: ../signup.php?error=none");
    exit();

}


function emptyInputLogin($email, $pwd) {
    if (empty($email)||empty($pwd) ) {
        return true;
    }else {
        return false;
    }
}

function loginUser($conn, $email, $pwd) {
    $userExists = uidExist($conn, $email);


    if ($userExists === false) {
        header("location: ../login.php?error=loginwrong");
        exit();
    }

    $pwdHashed = $userExists["userPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);


    if ($checkPwd === false) {
        header("location: ../login.php?error=loginwrong");
        exit();
    }else if($checkPwd === true) {
        session_start();
        $_SESSION["id"] = $userExists["id"]; 
        $_SESSION["userUid"] = $userExists["userUid"];
        header("location: ../index.php");
        exit(); 
    }
}