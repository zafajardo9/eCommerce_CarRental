<?php
include_once 'header.php';
?>

<section>
    <div class="form-contact-us">
        <div class="form-container">
            <form action="https://formspree.io/f/mgedodlq" method="post" autocomplete="off">
                <label for="fullName">Full Name</label>
                <input type="text" name="fullName" id="name" placeholder="Full Name">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" placeholder="Subject">

                <textarea name="message" id="msg" cols="30" rows="10" placeholder="Type it in Here!" ></textarea>
                <button type="submit" name="submit">SEND IT!</button>
            </form>
            <div class="contact-image">

            </div>

        </div>
        


    </div>
</section>