<?php 
include_once 'header.php';
?>


<?php
require_once 'includes/dbh.inc.php';

$id = $_GET['edit'];

if(isset($_POST['update_profile'])){



    $username = $_POST['username']; //ok
    $name = $_POST['name']; //ok
    $email = $_POST['email']; //ok
    $number = $_POST['number']; //ok




    if(empty($username)|| 
        empty($name)|| 
        empty($email)||
        empty($number)) {
        $message[] = 'please fill out all!';    
    }else{
        
        $params = array($username, $name, $email, $number, $id);
        /**
         * UPDATE Customer SET UserName='$username', 
                    FullName='$name',
                    Email='$email',
                    PhoneNumber='$number'
                    WHERE CustomerID = '$id'
         */
// SP_CUSTOMER_UPDATE ?, ?, ?, ?, ?
        $update_data = "SP_CUSTOMER_UPDATE ?, ?, ?, ?, ?";
        $upload = sqlsrv_query($conn, $update_data, $params);
    

    
        }
    };


?>
<body>
    <section class="profile-edit-container">

    <div class="profile-edit">
    
    <?php
            $select = sqlsrv_query($conn, "SELECT * FROM Customer WHERE CustomerID = '$id'");
            while($row = sqlsrv_fetch_array($select)){

    ?>
        <form action="" method="post">

        <label for="username"> User Name
        <input type="text" name="username" placeholder="User Name" value="<?= $row['UserName']; ?>">
        </label>

        <label for="name"> Name
        <input type="text" name="name" placeholder="Full Name" value="<?= $row['FullName']; ?>">
        </label>

        <label for="email"> Email
        <input type="text" name="email" placeholder="Email" value="<?= $row['Email']; ?>">
        </label>

        <label for="number"> Phone Number
        <input type="number" name="number" placeholder="Phone Number" value="<?= $row['PhoneNumber']; ?>">
        </label>

        <input class="btn" type="submit" value="Update My Profile" name="update_profile">
        <a href="profile.php" class="btn"><i class="fa-solid fa-backward"></i>&nbsp;go back!</a>

        <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<span class="message">'.$message.'</span>';
                }
            }
        }; ?>

        </form>
    



    
    </div>

    </section>
</body>