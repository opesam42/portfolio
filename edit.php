<?php
session_start();
require('config.php');

$validproj = null; // Initialize to prevent error

// Validate PHP
if (isset($_GET['id'])) {
    if (!is_numeric($_GET['id']) || $_GET['id'] <= 0) {
        header("Location: " . $config_basedir . "404.php");
        exit();
    } else {
        $validproj = intval($_GET['id']);
    }
} else {
    // If no ID is provided, redirect to add new project
    header("Location: " . $config_basedir . "add.php");
}

// Database connection
$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $descr = mysqli_real_escape_string($db, $_POST['descr']);
    $visibility = $_POST['visibility'];
    $project_type = $_POST['proj_type'];
    $live_site_link = mysqli_real_escape_string($db, $_POST['live_site_link']);
    $design_link = mysqli_real_escape_string($db, $_POST['design_link']);
    $github_link = mysqli_real_escape_string($db, $_POST['github_link']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    
    // Retrieve existing post data before checking for new image
    $sql = "SELECT cover_image FROM case_studies WHERE id = " . $validproj;
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $image = $row['cover_image']; // Default to existing image

    // Check if new image is added
    if (!empty($_FILES['image']['name'])) {
        $targetdir = "uploads/cover/";
        if (!is_dir($targetdir)) {
            mkdir($targetdir, 0777, true);
        }
        $file = $_FILES['image'];
        $filename = basename($file['name']);
        $targetFilePath = $targetdir . $filename;

        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png'];

        if (in_array($fileType, $allowedTypes)) {
            // Move file to target directory
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                $image = $filename; // Update image if a new one is uploaded
            }
        }
    }

    // Update post in the database
    $sql = "UPDATE case_studies 
            SET title = '$title', 
            date_modified = NOW(), 
            cover_image = '$image', 
            description = '$descr',
            is_visible = '$visibility',
            project_type = '$project_type', 
            live_site_link = '$live_site_link',
            github_link = '$github_link', 
            design_link = '$design_link',
            content = '$content' 
            WHERE id = " . $validproj;

    if (mysqli_query($db, $sql)) {
        header("Location: " . $config_basedir . "project.php?id=" . $validproj);
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
} else {
    require('include/header.php');
}

// Retrieving project information from the database
$sql = "SELECT * FROM case_studies WHERE id = " . $validproj;
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    header("Location: " . $config_basedir . "404.php"); // Redirect if no project found
    exit();
}

$contentSanitized = "<p>" . preg_replace("/\n/", "</p><p>", $row['content']);

if (isset($_SESSION['USERID'])) {
?>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] . "?id=" . $validproj; ?>" method="post" enctype="multipart/form-data" class="ckeditor_form">
    <input type="hidden" name="validproj" value="<?php echo $validproj; ?>">
    
    <label for="title"> Title<br>
        <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>">
    </label><br>
    
    <?php if ($row['cover_image']) { ?>
        <label for="current_image">Current Cover Image <br>
            <img src="<?php echo "uploads/cover/" . htmlspecialchars($row['cover_image']); ?>" alt="Cover Image" style="width:200px; height:auto;">
        </label><br>
    <?php } ?>
    
    <label for="image">Cover Image <br>
        <input type="file" name="image" accept="image/*">
    </label><br>
    
    <label for="descr">Description<br>
        <textarea type="text" name="descr"><?php echo htmlspecialchars($row['description']); ?></textarea>
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
        <input type="url" name="design_link" value="<?php echo htmlspecialchars($row['design_link']); ?>">
    </label><br>

    <label for="live_site_link"> Live Site Link<br>
        <input type="url" name="live_site_link" value="<?php echo htmlspecialchars($row['live_site_link']); ?>">
    </label><br>

    <label for="github_link"> Github Repo Link<br>
        <input type="url" name="github_link" value="<?php echo htmlspecialchars($row['github_link']); ?>">
    </label><br>

    <label for="content">Content<br>
        <textarea name="content" id="editor" width="100%"><?php echo htmlspecialchars($contentSanitized); ?></textarea>
    </label>
    
    <input type="submit" name="submit" value="Update">
</form>

<script>
    var configBaseDir = '<?php echo $config_basedir; ?>';
</script>
<script src="scripts/ckeditor.js"></script>

<?php
} else {
    header("Location: " . $config_basedir);
    exit();
}

require('include/footer.php');
?>
