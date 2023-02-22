<?php
require_once 'includes/dbh.inc.php';


if (isset($_POST['submit'])) {
    $date = date('Y-m-d', strtotime($_POST['date']));
    $dat = strtotime($date);

    $currentDate = date("Y-m-d");
    echo $dat;

    echo $currentDate;
}
?>

<html>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="get">
        <input type="date" name="date" id="">
        <input type="button" name="submit" value="submit">
    </form>


    
</html>