<?php

include_once 'header.php';

?>
<!-- STYLE PART -->
<head>
</head>

<section>



<?php
require_once 'includes/dbh.inc.php';

//pang check lang
if (!isset($_SESSION['userId'])) {
    header("location: error.php?error=noaccount");
}


$id = $_GET['id'];

$show = "SELECT * FROM Car WHERE CarID = $id";
$stmt= sqlsrv_query($conn, $show);

sqlsrv_execute($stmt);
?>


<div class="booking-container">
    <!-- LEFT -->
    <div class="booking-form-container">
        <h2>Booked Cars</h2>


        <?php
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        ?>

        <div class="card-container">
            <div class="card">
                <div class="card-image">
                    <img src="storedImg/<?php echo $row['CarImage']; ?>" alt="Car"> 
                </div>
                <div class="card-details">
                    <div class="card-text">
                        <h3><?= $row['Model']; ?></h3>
                        <p><?= $row['Brand']; ?></p>
                        <h1>₱ <?= number_format($row['RentPrice'], 2); ?></h1>
                    </div>
                </div>
                <!-- BUTTON -->
            </div>
            <!-- END -->
            
        </div>
        
        <?php
        $price = $row['RentPrice'];
        }
        ?>

    </div>
    <!-- RIGHT -->
    <div class="billing-location-container">

        
        <form action="includes/booking.inc.php" method="POST">
            <input type="hidden" name="userId" value="<?= $_SESSION['userId']?>">
            <input type="hidden" name="carId" value="<?= $_GET['id']?>">
            <input type="hidden" name="rentprice" value="<?= $price?>">
            <h3>Start Date</h3>
            <input type="date" name="startDate" id="">
            <h3>End Date</h3>
            <input type="date" name="endDate" id="">
            <h3>Address</h3>
            <input type="text" name="locationAddress" id="" placeholder="Address Line 1">
            <input type="text" name="locationStreet" id="" placeholder="Street">
            <input type="text" name="locationCity" id="" placeholder="City">
            <input type="number" name="locationZip" id="" placeholder="Zip Code">
            <button class="billing-btn" name="rent" type="submit">RENT NOW</button>
        </form>
        
        
    </div>
</div>



</section>