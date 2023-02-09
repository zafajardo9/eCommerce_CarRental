<?php

//@includes , require_once
require_once '../includes/dbh.inc.php';




if (isset($_POST['rentSubmit'])) {

    
    $carNumber = $_POST['carNumber'];
    $carBrand = $_POST['carBrand'];
    $carModel = $_POST['carModel'];
    $carStatus = $_POST['carStatus'];
    $carType = $_POST['carType'];
    $carPrice = $_POST['carPrice'];
    $carImg = $_FILES['carImg']['name'];
    $carImg_tmpName = $_FILES['carImg']['tmp_name'];
    $car_image_folder = '../storedImg/'.$carImg;


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

};

if(isset($_GET['delete'])){
        
    $id = intval($_GET['delete']);
    sqlsrv_query($conn, "DELETE FROM Cars WHERE CarID = $id");
    header('location:admin.php');
};



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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>




    <section>
        
        <div class="car-rental-form-container">

            <!-- //$_SERVER['PHP_SELF'] -->
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">    
                <h2>Add a Car for Rent</h2>
                <input type="number" name="carNumber" placeholder="Car Plate Number">
                    <label for="color">Car Brand</label>
                        <select name="carBrand" id="car">
                            <option value="">Car Brand</option>
                            <option value="BMW">BMW</option>
                            <option value="Chevrolet">Chevrolet</option>
                            <option value="Ford">Ford</option>
                            <option value="Honda">Honda</option>
                            <option value="Hyundai">Hyundai</option>
                            <option value="Kia">Kia</option>
                            <option value="Mazda">Mazda</option>
                            <option value="Toyota">Toyota</option>
                        </select>
                <!-- <input type="text" name="carBrand" placeholder="Car Brand"> -->
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


<?php
//include_once '../includes/dbh.inc.php';
//SELECT
$show = "SELECT * FROM Cars";
$stmt= sqlsrv_query($conn, $show);
sqlsrv_execute($stmt);
?>


        <div class="car-display">
            <table class="car-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Plate Number</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Status</th>
                        <th>Transmission Type</th>
                        <th>Rent Price</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php
                        

                        

                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

                ?>

                    <tr>
                        <td>
                            <img src="../storedImg/<?php echo $row['CarImage']; ?>" class="uploadedImg">
                        </td>
                        <td><?php echo $row['CarNumber']; ?></td>
                        <td><?php echo $row['CarBrand']; ?></td>
                        <td><?php echo $row['CarModel']; ?></td>
                        <td><?php echo $row['CarStatus']; ?></td>
                        <td><?php echo $row['TransmissionType']; ?></td>
                        <td>₱<?php echo $row['RentPrice']; ?></td>
                        <td>
                            <a href="admin_update.php?edit=<?php echo $row['CarID']; ?>"> <i class="fa-solid fa-pen-to-square"></i>Edit</a>
                            <a href="admin.php?delete=<?php echo $row['CarID']; ?>"> <i class="fa-solid fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                <?php
                }
                // sqlsrv_free_stmt( $getCars);
                // sqlsrv_close( $conn);
                ?>

                


            </table>


        </div>
    </section>
    
</body>
</html>