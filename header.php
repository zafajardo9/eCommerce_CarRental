<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo/LOGO1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <link rel="stylesheet" href="style/contact/contact.css" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <nav>
        <div class="navLogo">
            <a href="index.php">
                <img src="img/logo/LOGO-Transparent-newvector.png" alt="" >
                <h1>RoadTrip</h1>
            </a>
        </div>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="car.php">Cars</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="contactus.php">Need Help?</a></li>
            <li class="nav-btn">
                
                <?php
                if (isset($_SESSION['userId']) ) {

                    echo "<a href='profile.php'><button>".$_SESSION['userName']."</button></a>";
                    echo "<a href='includes/logout.inc.php'><button>Logout</button></a>";
                }else {

                    echo "<a href='login.php'><button>Log In</button><div class='notif'></div></a>";
                    echo "<a href='signup.php'><button>Sign Up</button></a>";
                }
                ?>
            </li>
            

            <?php
            //echo $_SESSION['userName'];
            ?>
        </ul>
    </nav>


