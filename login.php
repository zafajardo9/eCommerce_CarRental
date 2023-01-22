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
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button>LogIn</button>
            </form>
        </div>
    </div>

</section>

<div class="word"></div>