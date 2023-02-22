<?php
session_start();
include_once 'header.php';

?>


<!-- STYLE PART -->
<head>
<link rel="stylesheet" href="style/carDisplay/car.css" type="text/css">
</head>

<section>


<!-- PHP GETTING CAR -->
<?php
require_once 'includes/dbh.inc.php';
//SELECT
$show = "SELECT * FROM Car";
$stmt= sqlsrv_query($conn, $show);
sqlsrv_execute($stmt);
?>


<!-- HEADER PART -->
<div class="block-img">
        <h2>Rent a Car</h2>

</div>


<?php
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
?>

<div class="container">
        <div class="card">
            <div class="card-image">
                <img src="storedImg/<?php echo $row['CarImage']; ?>" alt="Car"> 
            </div>

            <div class="card-details">
                <div class="card-text">
                    <!-- pangpalit sa echo way of printing -->
                    <h3><?= $row['Model']; ?></h3>
                    <p><?= $row['Brand']; ?></p>
                    <h1>₱ <?= number_format($row['RentPrice'], 2); ?></h1>
                </div>
            </div>
                        
                        <?php

                            if(!isset($_SESSION['userName'])){
                                echo "<p>LOGIN FIRST</p>";
                            }
                        ?>
                <!-- BUTTON -->
                <div class="card-btn">
                    <form action="booking.php?id=<?= $row['CarID']?>" method="post">
                        
                        <input type="hidden" name="carId" value="<?= $row['CarID'] ?>">
                        <input type="hidden" name="model" value="<?= $row['Model'] ?>">
                        <input type="hidden" name="brand" value="<?= $row['Brand'] ?>">
                        <input type="hidden" name="price" value="<?= $row['RentPrice'] ?>">
                        
                        <button class="btn-car-cart" type="submit" name="add" data-id="<?php echo $row['CarID']; ?>"><i class="fa-solid fa-plus"></i></button>
                        <button class="btn-car-cart" type="submit" name="minus"><i class="fa-solid fa-minus"></i></button>

                    </form>
                    
                </div>
        </div>
   
        

</div>


<?php

    
}
// sqlsrv_free_stmt( $getCars);
// sqlsrv_close( $conn);
?>

<p style="color: black;">

</p>


</section>

