<?php
include_once 'header.php';
?>

<section class="form">
    
    <div class="form-container">
        
        <div class="right-container">
            <div class="right">
                <h1>New?</h1>
                <p>Sign Up here!</p>
                <a href="signup.php"><button>SignUp</button></a>
            </div>
        </div>
        

        <div class="left-container">
            <form action="includes/login.inc.php" method="post">
                <h1>Hey! Have Fun</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email</span>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="pwd" placeholder="Password" />
                <button type="submit" name="submit">Log In</button>


                <?php
                if(isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p>Pls Input email and password</p>";
                    }
                    else if ($_GET["error"] == "invalidlogin") {
                        echo "<p>Error log in details</p>";
                    }
                    else if ($_GET["error"] == "none") {
                        echo "<p>You have now logged in!</p>";
                    }
                    
                }
                ?>
            </form>
        </div>
    </div>

</section>

<div class="word"></div>