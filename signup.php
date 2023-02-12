<?php
include_once 'header.php';
?>

<section class="form">
    
    <div class="form-container">
        <div class="left-container">
            <form action="includes/signup.inc.php" method="post">
                <h1>Create Account</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" />
                <input type="text" name="userName" placeholder="UserName" />
                <input type="email" name="email" placeholder="Email" />
                
                <input type="text" name="phonenumber" placeholder="Phone Number">
                <input type="password"  name="pwd" placeholder="Password" />
                <input type="password"  name="repeatpwd" placeholder="Repeat Password" />
                
                <button type="submit" name="submit">Sign Up</button>
                <?php
                if(isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p>Fill in all fields</p>";
                    }
                    if ($_GET["error"] == "emptynumber") {
                        echo "<p>Input your Phone Number</p>";
                    }
                    else if ($_GET["error"] == "emptyuid") {
                        echo "<p>Invalid User Name</p>";
                    }
                    else if ($_GET["error"] == "emptyemail") {
                        echo "<p>Wrong Email</p>";
                    }
                    else if ($_GET["error"] == "passwordsdontmatch") {
                        echo "<p>Passwords does not match</p>";
                    }
                    else if ($_GET["error"] == "usernametaken") {
                        echo "<p>User Name has been taken</p>";
                    }
                    else if ($_GET["error"] == "none") {
                        echo "<p>You have now been signed up!</p>";
                    }
                }
                ?>
            </form>


        </div>

        <div class="right-container">
            <div class="right">
                <h1>Hello User</h1>
                <p>Have an account?</p>
                <a href="login.php"><button>Login</button></a>
            </div>
        </div>
        
    </div>

</section>

<div class="word"></div>