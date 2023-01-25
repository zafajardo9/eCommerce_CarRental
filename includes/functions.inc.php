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
    
    //$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    //hashing of password
    
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

    $query = "SELECT * FROM Users WHERE userEmail = ? AND userPwd = ?";
    // Prepare the statement
    //$pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);
    $params = array($email, $pwd);
    $stmt = sqlsrv_prepare($conn, $query, $params);
    // Execute the statement
    sqlsrv_execute($stmt);

    // Check if the query returned any results
    if (sqlsrv_has_rows($stmt)) {
        // A match was found, set the session variables
        $row = sqlsrv_fetch_array($stmt);
        echo $row;
        $_SESSION['userName'] = $row['userUid'];
        $_SESSION['userEmail'] = $row['userEmail'];
        // Redirect the user to the main page
        header("location: ../index.php?error=loginsuccessful");
    } else {
        // No match was found, display an error message
        echo 'Error';
        // header("location: ../index.php?error=loginwrong");
        // exit(); 
    }
}



function FormatErrors( $errors ) {
    /* Display errors. */
    echo "Error information: ";

    foreach ( $errors as $error )
    {
        echo "SQLSTATE: ".$error['SQLSTATE']."";
        echo "Code: ".$error['code']."";
        echo "Message: ".$error['message']."";
    }
}


