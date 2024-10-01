<?php
require('config.php');

require('header.php');
?>

<main class="md">
    <form action="" method="post">
        <h3>Send a Message</h3>
        <label for="name">Name<br>
            <input type="text" name="name">
        </label>
        <label for="email">Email<br>
            <input type="email" name="email">
        </label>
        <label for="message">Message<br>
            <textarea type="text" name="message" rows="7"></textarea>
        </label>
        <input type="submit" name="submit" value="Send message">
    </form>

    <section class="contact-option">
        <div>
            <a class="" href="mailto:opesam42@gmail.com"><i class="fa fa-regular fa-envelope"></i> <strong>opesam42@gmail.com</strong></a>
            <input id="textToCopy" type="text" value="opesam42@gmail.com" hidden readonly /><span class="copy" id="copyBtn"><i class="fa fa-regular fa-copy fa-lg"></i></span>
            <div class="copied"></div>
        </div>
                                
        <div>
            <a href="#"><i class="fa fa-github"></i> Github</a>
            <a href="#"><i class="fa fa-linkedin"></i> LinkedIn</a>
        </div>

    </section>
</main>

<?php
require('footer.php');
?>