<?php
require('../config.php');

session_start(); // Make sure to start the session

$validproj = null; // initialize to prevent error

// Validate ID
if (isset($_GET['id'])) {
    if (!is_numeric($_GET['id']) || $_GET['id'] <= 0) {
        header("Location: " . $config_basedir . "404.php");
        exit();
    } else {
        $validproj = intval($_GET['id']);
    }
} else {
    // If no ID is provided, redirect to add project
    header("Location: " . $config_basedir . "admin/add.php");
    exit();
}

// Connecting to the database
$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Handle form submission
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $descr = mysqli_real_escape_string($db, $_POST['descr']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    $validproj = $_POST['validproj'];

    $sql = "UPDATE case_studies 
            SET title = '$title', description = '$descr', content = '$content' 
            WHERE case_studies.id=" . $validproj . ";";

    if (mysqli_query($db, $sql)) {
        header("Location: " . $config_basedir . "project.php?id=" . $validproj);
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
}

// Retrieve project information from the database
$sql = "SELECT * FROM case_studies WHERE case_studies.id = " . $validproj . ";";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$num_row = mysqli_num_rows($result);

if ($num_row == 0) {
    header("Location: " . $config_basedir . "404.php");
    exit();
}

$contentSanitized = "<p>" . preg_replace("/\n/", "</p><p>", $row['content']) . "</p>";

// Check if user is logged in
if (!isset($_SESSION['USERID'])) {
    header("Location: " . $config_basedir . "admin/");
    exit();
} else {
    require('../include/header.php'); // Move header include here

    // Render the form
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post">
        <input type="hidden" name="validproj" value="<?php echo htmlspecialchars($validproj); ?>">
        <label for="title"> Title<br>
            <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>">
        </label><br>
        <label for="descr">Description<br>
            <textarea name="descr"><?php echo htmlspecialchars($row['description']); ?></textarea>
        </label><br>
        <label for="content">Content<br>
            <textarea name="content" id="editor" width="100%"><?php echo $contentSanitized; ?></textarea>
        </label>
        <input type="submit" name="submit">
    </form>

    <script src="../scripts/quill.js"></script>

    <?php
    require('../include/footer.php');
}
?>
