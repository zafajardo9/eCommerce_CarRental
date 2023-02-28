
<?php 
    require_once 'includes/dbh.inc.php';

    $show = "SP_LIST_CAR";
    $stmt= sqlsrv_query($conn, $show);
    
    sqlsrv_execute($stmt);
?>
<link rel="stylesheet" href="style/carousel/carousel.css">



<div class="carousel-title">
    <h1>CARS AVAILABLE</h1>
    <div class="container">
        <div class="arrow"></div>
        <div class="arrow"></div>
        <div class="arrow"></div>
    </div>
</div>
<div class="carousel">
    <?php             
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    ?>
	<div class="carousel-item">
		<div class="carousel-box">
			<div class="title">₱ <?= number_format($row['RentPrice'], 2); ?></div>
			<div class="num"><?= $row['Model']; ?></div>
			<img src="storedImg/<?php echo $row['CarImage']; ?>" />
		</div>
	</div>

    <?php
    }

    ?>

</div>


<script src="./js/carousel.js"></script>