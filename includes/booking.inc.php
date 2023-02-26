<?php 
        //FOR INSERTING 
        if (isset($_POST['rent'])) {


            $startDate = date('Y-m-d', strtotime($_POST['startDate']));
            $endDate = date('Y-m-d', strtotime($_POST['endDate']));
            $currentDate = date("Y-m-d");


            //for calculations
            // Convert date strings to UNIX timestamps
            // $date1Timestamp = strtotime($_POST['startDate']);
            // $date2Timestamp = strtotime($_POST['endDate']);
            // Calculate difference between dates in seconds
            $difference = strtotime($_POST['startDate']) - strtotime($_POST['endDate']);
            // Convert difference from seconds to days
            $differenceindays = abs($difference / (60 * 60 * 24)); //value ng days

            //$_POST['rentprice'];

            $totalAmount = $differenceindays *  $_POST['rentprice']; // gagawan pa ng computation

            

            $location = array(
                $_POST['locationAddress'],
                $_POST['locationStreet'],
                $_POST['locationCity'],
                $_POST['locationZip']
            );
            $booking = array(
                $startDate,
                $endDate,
                $_POST['userId'],
                $_POST['carId'],
                'rent' //forRent or rent
            );
            $billing = array(
                $currentDate,
                1,
                $totalAmount
            );

            require_once 'dbh.inc.php';
            require_once 'functions.inc.php';
            createBooking($conn, $location, $booking, $billing);
        }
        else {
            header("location: ../booking.php");exit();
        }

?>