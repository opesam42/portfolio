<?php
require('config.php');
require('header.php');


?>

<form action="" method="post">
    <label for="name">Name<br>
        <input type="text" name="name">
    </label>
    <label for="email">Email<br>
        <input type="email" name="email">
    </label>
    <label for="message">
        <textarea type="text" name="message" cols="200" rows="60"></textarea>
    </label>

</form>