<?php

//ZACK\SQLEXPRESS
$serverName = "ZACK\SQLEXPRESS";
$connectionOptions = [
    "Database"=>"carrental",
    "Uid"=>"",
    "PWD"=>""
];
//http://localhost/SystemCarRental/test.php
$email = '123@gmail.com';



$conn = sqlsrv_connect($serverName, $connectionOptions);

$query = "SELECT * FROM Users WHERE userEmail = ?";
// Prepare the statement

$params = array($email);

$stmt = sqlsrv_prepare($conn, $query, $params);
// Execute the statement
sqlsrv_execute($stmt);
// Check if the query returned any results

$row = sqlsrv_fetch_array($stmt);
$hashed_password = $row['userPwd'];
echo $hashed_password;
