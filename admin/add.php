<?php

require('../config.php');



$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $date = 'NOW()';
    $descr = mysqli_real_escape_string($db, $_POST['descr']);
    $content = mysqli_real_escape_string($db, $_POST['content']);

    $sql = "INSERT INTO case_studies(title, date_posted, description, content)
            VALUES('$title', $date, '$descr', '$content')";
    mysqli_query($db, $sql);
    header("Location: " . $config_basedir);
} else{
    require('../include/header.php');
}

?>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
    <label for="title"> Title<br>
        <input type="text" name="title">
    </label><br>
    <label for="descr">Description<br>
        <textarea type="text" name="descr"></textarea>
    </label><br>
    <label for="content">Content<br>
        <textarea name="content" id="editor" width="100%"></textarea>
    </label>
    <input type="submit" name="submit">
</form>


<script src="../scripts/quill.js"></script>

<?php
require('../include/footer.php');
?>