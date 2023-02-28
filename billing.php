<?php

include_once 'header.php';

?>

<link rel="stylesheet" href="style/booked/booking.css" type="text/css">


<?php
require_once 'includes/dbh.inc.php';

//pang check lang
if (!isset($_GET['success'])) {
    header("location: error.php?error=nobilling");
}


$id = $_GET['success'];

echo $id;

$showReceipt = "SELECT *
                FROM Booking
                INNER JOIN Billing ON Booking.[BookingID] = Billing.[BookingID]
                WHERE Booking.[BookingID] = $id;";
$stmt= sqlsrv_query($conn, $showReceipt);

sqlsrv_execute($stmt);
?>

<section>

<!-- FromDate,EndDate,CustomerID,CarID,Status,BillDate, TotalAmount -->
        <?php
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        ?>
<div class="bill-card">
    <i class="fa-solid fa-receipt"></i>
    <h1>RECEIPT</h1>
    <div class="infobill">
        <h2>
            <?= $row['BillDate']->format('Y-m-d'); ?>
        </h2>
        <h1>₱ <?=  number_format($row['TotalAmount'], 2); ?></h1>
    </div>
    <div class="infobook"></div>
        <p><?= $row['FromDate']->format('Y-m-d'); ?></p>
        <p><?= $row['EndDate']->format('Y-m-d'); ?></p>
        <p><?= $_SESSION['userName']?></p>
        <p><?= $row['Status']; ?></p>
    <div class="btn">
        <a href="index.php">CONFIRM</a>
    </div>
</div>
        <?php
        }
        ?>
</section>