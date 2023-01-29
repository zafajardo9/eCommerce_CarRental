<?php

//@includes , require_once

if (isset($_POST['rentSubmit'])) {

    require_once '../includes/dbh.inc.php';
    $carNumber = $_POST['carNumber'];
    $carBrand = $_POST['carBrand'];
    $carModel = $_POST['carModel'];
    $carStatus = $_POST['carStatus'];
    $carType = $_POST['carType'];
    $carPrice = $_POST['carPrice'];
    $carImg = $_FILES['carImg']['name'];
    $carImg_tmpName = $_FILES['carImg']['tmp_name'];
    $car_image_folder = '../img/storedImg'.$carImg;


    if (empty($carNumber)|| 
        empty($carBrand)|| 
        empty($carModel)|| 
        empty($carStatus)|| 
        empty($carType)|| 
        empty($carPrice)|| 
        empty($carImg))     {
            $message[] = 'Please Fill all';
    } else {
        
        $sql = "INSERT INTO Cars(CarNumber, CarBrand, CarModel, CarStatus, TransmissionType, RentPrice, CarImage)
        VALUES(?,?,?,?,?,?,?)";
        $params = array($carNumber, $carBrand, $carModel, $carStatus, $carType, $carPrice, $carImg);
        $getResults= sqlsrv_query($conn, $sql, $params);
        if ($getResults) {
            move_uploaded_file($carImg_tmpName, $car_image_folder); 
            //way of showing error
            $message[] = 'Successfully Added';
        }else {
            $message[] = 'Encountered a problem';
        }
    }


    // if(isset($_GET['delete'])){
    //     $id = $_GET['delete'];
    //     mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    //     header('location:admin_page.php');
    // };




    
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Your Car</title>

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="adminstyle/style.css">
</head>
<body>




    <section>
        
        <div class="car-rental-form-container">

            <!-- //$_SERVER['PHP_SELF'] -->
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">    
                <h2>Add a Car for Rent</h2>
                <input type="number" name="carNumber" placeholder="Car Plate Number">
                <input type="text" name="carBrand" placeholder="Car Brand">
                <input type="text" name="carModel" placeholder="Car Model">
                <input type="text" name="carStatus" placeholder="Status">
                <input type="text" name="carType" placeholder="Car Transmission Type">
                <input type="number" name="carPrice" placeholder="Renting Price">

                <!-- IMAGE -->
                <input type="file" name="carImg" accept="image/jpg, image/png, image/jpeg">
                <button type="submit" name="rentSubmit">Submit</button>


                    <?php
                        if(isset($message)) {
                            foreach($message as $message) {
                                echo '<div class="message">'.$message.'</div>';
                            }
                        }
                    ?>

                
            </form>
        </div>
    </section>
    
</body>
</html>