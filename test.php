<?php
//session_start();

require_once 'includes/dbh.inc.php';
// require_once 'includes/functions.inc.php';

//http://localhost/SystemCarRental/test.php


$query = "SELECT * FROM Cars";
// Prepare the statement
$stmt = sqlsrv_prepare($conn, $query);
// Execute the statement
sqlsrv_execute($stmt);
// Check if the query returned any results


while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo '</br>';
    echo $row['CarID'];
    echo '</br>';
    echo $row['CarNumber'];
    echo '</br>';
    echo $row['CarBrand'];
    echo '</br>';
    echo $row['CarModel'];
    echo '</br>';
    echo $row['CarStatus'];
    echo '</br>';
    echo $row['TransmissionType'];
    echo '</br>';
    echo $row['RentPrice'];
    echo '</br>';
    echo $row['CarImage'];
}



