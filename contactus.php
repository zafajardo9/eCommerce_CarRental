<?php
include_once 'header.php';
?>

<section>
    <div class="form-contact-us">
        <div class="form-container">
            <form action="contactus.php" method="post">
                <input type="text" name="fullName" id="name" placeholder="Full Name">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="text" name="subject" id="subject" placeholder="Subject">
                <textarea name="message" id="msg" cols="30" rows="10" placeholder="Type it in Here!" ></textarea>
                <button type="submit" name="submit">SEND IT!</button>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $name = $_POST['fullName'];
                $mailFrom = $_POST['email'];
                $subject = $_POST['subject'];
                $msg = $_POST['msg'];

                $mailTo = 'zafajardo9@programmer.net';
                $headers = "From: " . $mailFrom;
                $txt = "You have received an email from " .$name. ".\n\n".$msg;

                mail($mailTo, $subject, $txt, $headers);

                header("Location: contactus.php?mailsend");
            }
            ?>

        </div>
        
    </div>
</section>