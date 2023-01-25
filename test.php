<?php

//ZACK\SQLEXPRESS
$serverName = "ZACK\SQLEXPRESS";
$connectionOptions = [
    "Database"=>"carrental",
    "Uid"=>"",
    "PWD"=>""
];

$email = 'zafajardo9@gmail.com';
$pwd = '123';


$conn = sqlsrv_connect($serverName, $connectionOptions);


$query = "SELECT * FROM Users WHERE userEmail = ? AND userPwd = ?";
    //$pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);
    $params = array(&$email, &$pwd);
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
    } else {
        // No match was found, display an error message
        echo 'Error';
        // header("location: ../index.php?error=loginwrong");
        // exit(); 
    }
?>