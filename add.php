<?php
session_start();
require('config.php');



$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $descr = $_POST['descr'];
    $content = $_POST['content'];
    $image = '';
    $visibility = (int)$_POST['visibility'];
    $project_type = $_POST['proj_type'];
    $live_site_link = $_POST['live_site_link'];
    $design_link = $_POST['design_link'];
    $github_link = $_POST['github_link'];

    //image uploading
    $targetdir = "uploads/cover/";
    if (!is_dir($targetdir)) {
        mkdir($targetdir, 0777, true); 
    }
    $file = $_FILES['image'];
    $filename = basename($file['name']);
    $filename = preg_replace("/[^a-zA-Z0-9_\-\.]/", "", $filename); // Sanitize file name
    $targetFilePath = $targetdir . $filename;

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png'];

    // Check if the uploaded file type is allowed
    if (in_array($fileType, $allowedTypes)) {
        // Verify MIME type to ensure it's an actual image
        $mime = mime_content_type($file['tmp_name']);
        $validMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        
        if (in_array($mime, $validMimeTypes)) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                $image = $filename;
            } else {
                echo "Error uploading image.";
                exit();
            }
        } else {
            echo "Invalid image file type.";
            exit();
        }
    } else {
        echo "File type not allowed.";
        exit();
    }

    $sql = "INSERT INTO case_studies(title, date_posted, description, cover_image, content, is_visible, project_type, live_site_link, github_link, design_link)
            VALUES(?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($db, $sql);
    if($stmt === false){
        exit("An error occured");
    }

    // Bind the parameters (s = string, i = integer)
    mysqli_stmt_bind_param($stmt, 'ssssisiss', $title, $descr, $image, $content, $visibility, $project_type, $live_site_link, $github_link, $design_link);
    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        $last_id = mysqli_insert_id($db); // Get the last inserted ID
        header("Location: " . $config_basedir . "project.php?id=" . $last_id);
        exit();
    } else {
        echo "Error: " . mysqli_error($db);
        exit();
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    
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
    <label for="proj_type">Project type<br>
        <input type="radio" name="proj_type" value="UI-UX" checked> UI/UX<br>
        <input type="radio" name="proj_type" value="Web"> Web
    </label>
    <label for="visibility">Visibility<br>
        <input type="radio" name="visibility" value="1" checked>Visible<br>
        <input type="radio" name="visibility" value="0">Not Visible
    </label>

    <label for="design_link"> Design File Link<br>
        <input type="url" name="design_link">
    </label><br>

    <label for="live_site_link"> Live Site Link<br>
        <input type="url" name="live_site_link">
    </label><br>

    <label for="github_link"> Github Repo Link<br>
        <input type="url" name="github_link">
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