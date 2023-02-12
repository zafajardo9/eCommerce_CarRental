<?php

//ZACK\SQLEXPRESS
$serverName = "ZACK\SQLEXPRESS";
$connectionOptions = [
    "Database"=>"RentCar2",
    "Uid"=>"",
    "PWD"=>""
];


$conn = sqlsrv_connect($serverName, $connectionOptions);


if($conn == false){
    die(print_r(sqlsrv_errors(), true));
}

// else {
//     echo 'Connection good';
// }




