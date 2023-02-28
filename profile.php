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
$show = "SP_CUSTOMER_DISPLAY $userid";
$stmt= sqlsrv_query($conn, $show);

sqlsrv_execute($stmt);


//Delete Profile
if(isset($_GET['delete'])){
        
    $id = intval($_GET['delete']);
    //DELETE FROM Customer WHERE CustomerID = $id
    sqlsrv_query($conn, "SP_CUSTOMER_DELETE $id");
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
                    <?= $_SESSION['userName']; ?>
                </p>
                
            </div>
                <i class="fa-solid fa-signature"></i>
                <p>
                    
                    <?= $row['FullName']; ?>
                </p>

            <div>
                <i class="fa-solid fa-envelope"></i>
                <p>
                    <?= $row['Email']; ?>
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
        <h1>User Activity</h1>

        <?php
        $showBooking = "SELECT *
                        FROM Booking
                        INNER JOIN Billing ON Booking.[BookingID] = Billing.[BookingID]
                        WHERE Booking.CustomerID = $userid";
        $stmt2= sqlsrv_query($conn, $showBooking);
        sqlsrv_execute($stmt2);
        ?>
        <div class="cards-container">
            <?php
            while ($row = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
            ?>
            <!-- FromDate,EndDate,BillDate,TotalAmount -->
            <div class="card">
                <div class="fromdate">
                    <p>From Date</p>
                    <p><?= $row['FromDate']->format('Y-m-d'); ?></p>
                </div>
                <div class="enddate">
                    <p>End Date</p>
                    <p><?= $row['EndDate']->format('Y-m-d'); ?></p>
                </div>
                <div class="billdate">
                    <p>Date of Bill</p>
                    <p><?= $row['BillDate']->format('Y-m-d'); ?></p>
                </div>
                <div class="price">
                    <p>₱ <?= number_format($row['TotalAmount'], 2); ?></p>
                </div>
                
            </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>



</body>
