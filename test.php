<?php
session_start();

// require_once 'includes/dbh.inc.php';
// require_once 'includes/functions.inc.php';

//http://localhost/SystemCarRental/test.php
$email = 'zafajardo8@gmail.com';
$pwd = '123';

$query = "SELECT * FROM Users WHERE userEmail = ?";
// Prepare the statement
$params = array($email);
$stmt = sqlsrv_prepare($conn, $query, $params);
// Execute the statement
sqlsrv_execute($stmt);
// Check if the query returned any results
$row = sqlsrv_fetch_array($stmt);

$_SESSION['userId'] = $row['id'];
$_SESSION['userName'] = $row['userUid'];
$_SESSION['userEmail'] = $row['userEmail'];
echo '</br>';
echo $_SESSION['userId'];
echo '</br>';
echo $_SESSION['userName'];
echo '</br>';
echo $_SESSION['userEmail'];


