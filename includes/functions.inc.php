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
    $params = array($name, $email, $userName, $pwd);
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
    uidExist($conn, $email);
}