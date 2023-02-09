<?php

@include '../includes/dbh.inc.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $carNumber = $_POST['carNumber'];
   $carBrand = $_POST['carBrand'];
   $carModel = $_POST['carModel'];
   $carStatus = $_POST['carStatus'];
   $carType = $_POST['carType'];
   $carPrice = $_POST['carPrice'];
   $carImg = $_FILES['carImg']['name'];
   $carImg_tmpName = $_FILES['carImg']['tmp_name'];
   $car_image_folder = '../storedImg/'.$carImg;

   if(empty($carNumber)|| 
      empty($carBrand)|| 
      empty($carModel)|| 
      empty($carStatus)|| 
      empty($carType)|| 
      empty($carPrice)|| 
      empty($carImg)) {
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE Cars SET CarNumber='$carNumber', 
                  CarBrand='$carBrand',
                  CarModel='$carModel',
                  CarStatus='$carStatus',
                  TransmissionType='$carType',
                  RentPrice='$carPrice', 
                  CarImage='$carImg'  
                  WHERE CarID = '$id'";
      $upload = sqlsrv_query($conn, $update_data);

      if($upload){
         move_uploaded_file($carImg_tmpName, $car_image_folder); 
         header('location:admin.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
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
</head
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<section>

   <div class="car-rental-form-container">

      <?php
         
         $select = sqlsrv_query($conn, "SELECT * FROM Cars WHERE CarID = '$id'");
         while($row = sqlsrv_fetch_array($select)){

      ?>
      
      <form action="" method="post" enctype="multipart/form-data">
      
         <h2>Edit Details</h2>
         <input type="number" name="carNumber" placeholder="Car Plate Number" value="<?php echo $row['CarNumber']; ?>">
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
         <input type="text" name="carModel" placeholder="Car Model" value="<?php echo $row['CarModel']; ?>">
         <input type="text" name="carStatus" placeholder="Status" value="<?php echo $row['CarStatus']; ?>">
         <input type="text" name="carType" placeholder="Car Transmission Type" value="<?php echo $row['TransmissionType']; ?>">
         <input type="number" name="carPrice" placeholder="Renting Price" value="<?php echo $row['RentPrice']; ?>">

                  <!-- IMAGE -->
         <input type="file" name="carImg" accept="image/jpg, image/png, image/jpeg">



         <input type="submit" value="Update Product" name="update_product" class="btn">
         <a href="admin.php" class="btn">go back!</a>
      </form>
      


      <?php }; ?>


   </div>



</section>






</body>
</html>