<?php 
        //FOR INSERTING 
        if (isset($_POST['rent'])) {

            //For Start Date 
            // $dateStart = $_POST['startDate'];
            // $startDate = date("Y-m-d", strtotime($dateStart));
            // //For End Date
            // $dateEnd = $_POST['endDate'];
            // $endDate = date("Y-m-d", strtotime($dateEnd));


            $startDate = date('Y-m-d', strtotime($_POST['startDate']));
            $endDate = date('Y-m-d', strtotime($_POST['endDate']));


            echo $startDate;
            echo $endDate;

            // $interval =   date_diff(date_create(date('Y-m-d', $date1)), date_create(date('Y-m-d', $date2)));
            // echo "The difference between ".date('Y-m-d', $date1)." and ".date('Y-m-d', $date2)." is ".$interval->format('%a')." days.";

            //current date
            $currentDate = date("Y-m-d");

            // $difference = $startDate - $endDate;
            // floor($difference / 86400);
            $difference = ($startDate - $endDate)/60/60/24;
            //$totalAmount = $difference * $row['RentPrice']; //,di gagana
            $totalAmount = 1200; // gagawan pa ng computation

            

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
                'double'
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