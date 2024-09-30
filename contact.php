<?php
require('config.php');

require('header.php');
?>


<form action="" method="post">
    <h3>Send a Message</h3>
    <label for="name">Name<br>
        <input type="text" name="name">
    </label>
    <label for="email">Email<br>
        <input type="email" name="email">
    </label>
    <label for="message">Message<br>
        <textarea type="text" name="message"></textarea>
    </label>
    <input type="submit" name="submit" value="Send message">
</form>

<div>
    <a class="lg" href="mailto:opesam42@gmail.com">opesam42@gmail.com</a>
    <input id="textToCopy" type="text" value="opesam42@gmail.com" hidden readonly /><span class="copy" id="copyBtn"><i class="fa fa-regular fa-copy fa-lg"></i></span>
</div>
                        
</div> 
<a href="#">Github</a>
<a href="#">LinkedIn</a>

<?php
require('footer.php');
?>