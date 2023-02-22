<?php
session_start();

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
// echo $_SESSION['userName'];


// echo '</br>';

// $id = 1;
// $dateStart = "2023-02-15";
// $startDate = date("Y-m-d", strtotime($dateStart));
// //For End Date
// $dateEnd = "2023-02-20";
// $endDate = date("Y-m-d", strtotime($dateEnd));
// //current date
// $currentDate = date("Y-m-d");

// // $days = $startDate - $endDate;
// // $difference = floor($days / 86400);
// $difference = floor($startDate - $endDate / 86400);

// $interval = date_diff($startDate, $endDate);
// $totalAmount = $difference * $row['RentPrice'];

// $_POST['locationAddress'] = 'akjdbsfadsf';
// $_POST['locationStreet'] = 'sdfasdf';
// $_POST['locationCity'] = 'asdfasdf';
// $_POST['locationZip'] = 1234;


// $location = array(
//     $_POST['locationAddress'],
//     $_POST['locationStreet'],
//     $_POST['locationCity'],
//     $_POST['locationZip']
// );
// $booking = array(
//     $startDate,
//     $endDate,
//     $_SESSION['userId'],
//     $id,
//     1
// );
// $billing = array(
//     $currentDate,
//     1,
//     $totalAmount
// );
// $array = array("foo", "bar", "hello", "world");
// //var_dump($array);


// var_dump($interval);

// echo '</br>';
// var_dump($location);
// echo '</br>';
// var_dump($booking);
// echo '</br>';
// var_dump($billing);

echo $_SESSION['userId'];

$currentDate = date("Y-m-d");

$dateStart = "02-15-2023";
$startDate = date("Y-m-d", strtotime($dateStart));

echo $currentDate;
echo $startDate;


// $locationArr = array(
//     'yoyoooazzz',
//     'maligaya', 
//     'QC', 
//     '3314'
// );
// $bookingArr = array(
//     '2023-02-15', 
//     '2023-02-20', 
//     '3', 
//     '1', 
//     'Single'
// );
// $billingArr = array(
//     '2023-01-14', 
//     '1', 
//     '12000'
// );
// function createBooking($conn, $locationArr, $bookingArr, $billingArr) {

//     $sql1 = "INSERT INTO [Location] (LocationName, Street, City, ZipCode) VALUES (?, ?, ?, ?);
//             SELECT SCOPE_IDENTITY() AS location_id";

//     $stmt1 = sqlsrv_query($conn, $sql1, $locationArr);

//     if ($stmt1 === false) {
//         die(print_r(sqlsrv_errors(), true));
//     }
//     if ($stmt1) {
//         sqlsrv_next_result($stmt1);
//         sqlsrv_fetch($stmt1);
//         $location_last_id = sqlsrv_get_field($stmt1, 0);
//         echo "New record created successfully. Last inserted ID is: " . $location_last_id;
//     } else {
//         echo "Error: " . $sql1 . "<br>" . print_r(sqlsrv_errors(), true);
//     }
    
//     $sql2 = "INSERT INTO Booking (FromDate, EndDate, CustomerID, CarID, [Status], LocationID) VALUES (?, ?, ?, ?, ?, '$location_last_id');
//             SELECT SCOPE_IDENTITY() AS booking_id;";
//     $stmt2 = sqlsrv_query($conn, $sql2, $bookingArr);
//     //$bookingID = sqlsrv_get_field($stmt2, 0);
//     if ($stmt2 === false) {
//       die(print_r(sqlsrv_errors(), true));
//     }
//     if ($stmt2) {
//         sqlsrv_next_result($stmt2);
//         sqlsrv_fetch($stmt2);
//         $booking_last_id = sqlsrv_get_field($stmt2, 0);
//         echo "New record created successfully. Last inserted ID is: " . $booking_last_id;
//     } else {
//         echo "Error: " . $sql1 . "<br>" . print_r(sqlsrv_errors(), true);
//     }

//     $sql3 = "INSERT INTO Billing ( BillDate, BillStatus, TotalAmount, BookingID) VALUES (?, ?, ?, '$booking_last_id');";

//     $stmt3 = sqlsrv_query($conn, $sql3, $billingArr);
//     if ($stmt3 === false) {
//       die(print_r(sqlsrv_errors(), true));
//     }

//     echo "Data inserted successfully";

// }

// createBooking($conn, $locationArr, $bookingArr, $billingArr);