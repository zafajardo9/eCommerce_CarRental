<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoadTrip</title>
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>

    <nav>
        <div class="navLogo">
            <h1>RoadTrip</h1>
        </div>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Cars</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">FAQ</a></li>
            <li class="nav-btn">
                <?php
                if (isset($_SESSION["userEmail"])) {
                    echo "<a href='profile.php'><button>Profile</button></a>";
                    echo "<a href='logout.php'><button>Logout</button></a>";
                }else {
                    echo "<a href='login.php'><button>Log In</button></a>";
                    echo "<a href='signup.php'><button>Sign Up</button></a>";
                }
                ?>
            </li>
            
        </ul>
    </nav>