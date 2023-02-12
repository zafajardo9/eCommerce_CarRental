<?php
//session_start();

require_once 'includes/dbh.inc.php';
// require_once 'includes/functions.inc.php';

//http://localhost/SystemCarRental/test.php


// $query = "SELECT * FROM Cars";
// // Prepare the statement
// $stmt = sqlsrv_prepare($conn, $query);
// // Execute the statement
// sqlsrv_execute($stmt);
// // Check if the query returned any results


// while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
//     echo '</br>';
//     echo $row['CarID'];
//     echo '</br>';
//     echo $row['CarNumber'];
//     echo '</br>';
//     echo $row['CarBrand'];
//     echo '</br>';
//     echo $row['CarModel'];
//     echo '</br>';
//     echo $row['CarStatus'];
//     echo '</br>';
//     echo $row['TransmissionType'];
//     echo '</br>';
//     echo $row['RentPrice'];
//     echo '</br>';
//     echo $row['CarImage'];
// }

$userName = 'zafa';
$name = 'Zack';
$email = 'zafajardo12@gmail.com';
$phoneNumber = '09664411517';
$pwd = '1234';

$tsql= "INSERT INTO Customer (UserName, FullName, Email, PhoneNumber, [Password]) VALUES (?,?,?,?,?);";
    
$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
//hashing of password

$params = array('zafa','Zack','zafajardo12@gmail.com','09664411517', $hashedpwd);

$getResults = sqlsrv_query($conn, $tsql, $params);
$rowsAffected = sqlsrv_rows_affected($getResults);
//Checker
if ($getResults == FALSE or $rowsAffected == FALSE) {
//header
    die(FormatErrors(sqlsrv_errors()));
}

//header("location: ../signup.php?error=none");
exit();

