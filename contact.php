<?php
require('config.php');

$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);

if( isset($_POST['submit']) ){
    $name = mysqli_real_escape_string($db, $_POST['userName']);
    $email = mysqli_real_escape_string($db, $_POST['userEmail']);
    $message = mysqli_real_escape_string($db, $_POST['message']);

    $sql = "INSERT INTO client_message(date_sent, name, email, message) VALUES(NOW(), '$name', '$email', '$message');";
    mysqli_query($db, $sql);

    // redirect user after submission
    header("Location: " . $config_basedir . "contact.php");
    exit();

}else{
    require('include/header.php');
}
?>

<main class="md">
    <form action="" method="post">
        <h3>Send a Message</h3>
        <label for="userName">Name<br>
            <input type="text" name="userName" required>
        </label>
        <label for="userEmail">Email<br>
            <input type="userEmail" name="userEmail" required>
        </label>
        <label for="message">Message<br>
            <textarea type="text" name="message" rows="7"></textarea>
        </label>
        <input type="submit" name="submit" value="Send message" required>
    </form>

    <section class="contact-option">
        <div>
            <a class="" href="mailto:opesam42@gmail.com"><i class="fa fa-regular fa-envelope"></i> <strong>opesam42@gmail.com</strong></a>
            <input id="textToCopy" type="text" value="opesam42@gmail.com" hidden readonly /><span class="copy" id="copyBtn"><i class="fa fa-regular fa-copy fa-lg" style="color: green;ss"></i></span>
        </div>
                                
        <div>
            <a href="#"><i class="fa fa-github"></i> Github</a>
            <a href="#"><i class="fa fa-linkedin"></i> LinkedIn</a>
        </div>

    </section>
</main>

<script src="scripts/form.js"></script>

<?php
require('include/footer.php');
?>