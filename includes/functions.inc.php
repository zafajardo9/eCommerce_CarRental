<?php

function emptyInputSignUp($name, $email, $userName,$phoneNumber,$pwd, $pwdrepeat){

    if (empty($name) 
        || empty($phoneNumber)
        || empty($email) 
        || empty($userName) 
        || empty($pwd) 
        || empty($pwdrepeat)) {
        return true;
    }else {
        return false;
    }
}



function invalidUid($userName) {

    $pattern = '/^[a-zA-Z0-9._-]{3,16}$/';
    if (preg_match($pattern, $userName)) {
        return true;
    }else {
        return false;
    }
}

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

    $tsql = "SELECT COUNT(*) FROM Customer WHERE Email = ?";
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

function createUser($conn, $name, $userName, $email, $phoneNumber, $pwd) {

    //INSERT INTO Customer (UserName, FullName, Email, PhoneNumber, [Password]) VALUES (?,?,?,?,?);
    $tsql= "SP_INSERT_CUSTOMER ?,?,?,?,?";
    
    //hashing of password
    $hashedpwd =  password_hash($pwd, PASSWORD_DEFAULT);

    $params = array(&$userName, &$name, &$email, &$phoneNumber, &$hashedpwd);

    $getResults = sqlsrv_query($conn, $tsql, $params);
    $rowsAffected = sqlsrv_rows_affected($getResults);
    //Checker
    if ($getResults == FALSE or $rowsAffected == FALSE) {
    //header
        die(FormatErrors(sqlsrv_errors()));
    }
    
    header("location: ../signup.php?error=none");
    exit();

}

///////////////////////FOR LOGIN///////////////////////

function emptyInputLogin($email, $pwd) {
    if (empty($email)||empty($pwd) ) {
        return true;
    }else {
        return false;
    }
}


function loginUser($conn, $email, $pwd) {

    //SELECT * FROM Customer WHERE Email = ?;
    $query = "SP_CUSTOMER_LOGIN ?;";//AND userPwd = ?
    // Prepare the statement

    $stmt = sqlsrv_prepare($conn, $query, array(&$email));//mas maganda walang array
    // Execute the statement
    sqlsrv_execute($stmt);
    // Check if the query returned any results

    if (sqlsrv_has_rows($stmt)) {
        // A match was found, set the session variables
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        $hashed_password = $row['Password'];

        //password verify function of php
        if (password_verify($pwd, $hashed_password)) {
            // Password is valid, set the session variables
            // $query = "SELECT id FROM users WHERE userEmail = ?";
            // $params = array($email);
            // $stmt = sqlsrv_prepare($conn, $query, $params);
            // sqlsrv_execute($stmt);

            //get value
            //$row = sqlsrv_fetch_array($stmt);
            //start a session
            session_start();


            $_SESSION['userId'] = $row['CustomerID'];
            $_SESSION['userName'] = $row['UserName'];
            $_SESSION['userEmail'] = $row['Email'];

            
            //header("location: ../index.php?error=loginsuccessful");
            header("location: ../index.php?error=loginsuccessful");

            exit(); 
        } else {
            // Password is invalid, display an error message
            header("location: ../login.php?error=invalidlogin");
            exit(); 
        }

    } else {
        // No match was found, display an error message
        //echo 'Error';
        header("location: ../login.php?error=invalidlogin");
        exit(); 
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

//gawa nalang function dito para mahimay

function createBooking($conn, $location, $booking, $billing) {
    //LOCATION TABLE
    $sql1 = "INSERT INTO [Location] (LocationName, Street, City, ZipCode) VALUES (?, ?, ?, ?);
            SELECT SCOPE_IDENTITY() AS location_id";

    $stmt1 = sqlsrv_query($conn, $sql1, $location);
    //get all Location
    if ($stmt1 === false) {
      die(print_r(sqlsrv_errors(), true));
    }
    if ($stmt1) {
        sqlsrv_next_result($stmt1);
        sqlsrv_fetch($stmt1);
        $location_last_id = sqlsrv_get_field($stmt1, 0);
        header("location: ../booking.php?success=1");
    } 

    //BOOKING TABLE
    $sql2 = "INSERT INTO Booking (FromDate, EndDate, CustomerID, CarID, [Status], LocationID) VALUES (?,?,?,?,?, '$location_last_id');
            SELECT SCOPE_IDENTITY() AS booking_id;";

    $stmt2 = sqlsrv_query($conn, $sql2, $booking);

    if ($stmt2 === false) {
      die(print_r(sqlsrv_errors(), true));
    }
    if ($stmt2) {
        sqlsrv_next_result($stmt2);
        sqlsrv_fetch($stmt2);
        $booking_last_id = sqlsrv_get_field($stmt2, 0);
        header("location: ../booking.php?success=2");
    } 

    //BILLING TABLE
    $sql3 = "INSERT INTO Billing ( BillDate, BillStatus, TotalAmount, BookingID) VALUES (?,?,?, $booking_last_id);";
    //$params3 = array();
    $stmt3 = sqlsrv_query($conn, $sql3, $billing);
    if ($stmt3 === false) {
      die(print_r(sqlsrv_errors(), true));
    }
    if ($stmt3) {
        
        header("location: ../billing.php?success=$booking_last_id");
    } 
    


}

