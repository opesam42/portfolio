<?php
$message = "Hi\r\njj\r\nJack";
$san_message = str_replace(array("\r", "\n"), "<br>", $message);
$san_message2 = str_replace("<br><br>", "<br>", $san_message);
echo "<p>" . $san_message2 . "</p>";
?>           