<?php 
include_once 'header.php';
?>


<body>
    


<?php
require_once 'includes/dbh.inc.php';

//pang check lang
if (!isset($_SESSION['userId'])) {
    header("location: error.php?error=noaccount");
}
//Get ID then will find the ID
$userid = $_SESSION['userId'];
$show = "SELECT * FROM Customer WHERE CustomerID = $userid";
$stmt= sqlsrv_query($conn, $show);

sqlsrv_execute($stmt);


//Delete Profile
if(isset($_GET['delete'])){
        
    $id = intval($_GET['delete']);
    sqlsrv_query($conn, "DELETE FROM Customer WHERE CustomerID = $id");
    header('location:profile.php');
};

?>


        
<section class = "profile-section">
    <div class="profile-section-left">
        <?php
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        ?>
        <div class="profile-details">
            <h1>MY DETAILS</h1>
            <div>
                <div class="circle">
                    <i class="fa-solid fa-user"></i>
                </div>
                
                <p>
                    <?php echo $_SESSION['userName']; ?>
                </p>
                
            </div>
                <i class="fa-solid fa-signature"></i>
                <p>
                    
                    <?php echo $row['FullName']; ?>
                </p>

            <div>
                <i class="fa-solid fa-envelope"></i>
                <p>
                    <?php echo $row['Email']; ?>
                </p>
                
            </div>
        </div>

        <?php
        }
        ?>

        <div class="profile-btn">
            <a class="btn-profile" href="profile_update.php?edit=<?php echo $_SESSION['userId']; ?>"> <i class="fa-solid fa-pen-to-square"></i></a>
            <a class="btn-profile delete" href="profile.php?delete=<?php echo $_SESSION['userId']; ?>"> <i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
    <div class="profile-section-right">
        <h1>Activity</h1>
    </div>
</section>



</body>
