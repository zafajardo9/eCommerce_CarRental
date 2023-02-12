<?php
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
                    <h3><?php echo $row['Model']; ?></h3>
                    <p><?php echo $row['Brand']; ?></p>
                    <h1>₱ <?php echo $row['RentPrice']; ?></h1>
                </div>
            </div>

                <!-- BUTTON -->
                <div class="card-btn">
                    <button class="btn-car-cart" type="submit"><i class="fa-solid fa-plus"></i></button>
                    <button class="btn-car-cart" type="submit"><i class="fa-solid fa-minus"></i></button>
                
                </div>
             </div>
   
    

</div>


<?php
}
// sqlsrv_free_stmt( $getCars);
// sqlsrv_close( $conn);
?>



</section>