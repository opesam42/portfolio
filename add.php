<?php
session_start();
require('config.php');



$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $descr = mysqli_real_escape_string($db, $_POST['descr']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    $image = '';

    //image uploading
    $targetdir = "uploads/cover/";
    if (!is_dir($targetdir)) {
        mkdir($targetdir, 0777, true); 
    }
    $file = $_FILES['image'];
    $filename = basename($file['name']);
    $targetFilePath = $targetdir . $filename;

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png'];

    if(in_array($fileType, $allowedTypes)){
        //move file to target directory
        if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
            // $image = $targetFilePath;
            $image = $filename;
        }
    }

    $sql = "INSERT INTO case_studies(title, date_posted, description, cover_image, content)
            VALUES('$title', NOW(), '$descr', '$image', '$content')";
    if(mysqli_query($db, $sql)){
        $last_id = mysqli_insert_id($db);
        header("Location: " . $config_basedir . "project.php?id=" . $last_id);
        exit();
    }else{
        echo "Error: " . mysqli_error($db);
    }
    
} else{
    require('include/header.php');
}

?>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post" enctype="multipart/form-data" class="ckeditor_form">
    <label for="title"> Title<br>
        <input type="text" name="title">
    </label><br>
    <label for="image">Cover Image <br>
        <input type="file" name="image" accept="image/*">
    </label><br>
    <label for="descr">Description<br>
        <textarea type="text" name="descr"></textarea>
    </label><br>
    <label for="content">Content<br>
        <textarea name="content" id="editor" width="100%"></textarea>
    </label>
    <input type="submit" name="submit">
</form>

<script>
    var configBaseDir = '<?php echo $config_basedir; ?>';
</script>
<script src="scripts/ckeditor.js"></script>

<?php
require('include/footer.php');
?>