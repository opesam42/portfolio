<?php
require('../config.php');

$validproj = null; // initialize to prevent error

//validate php
if(isset($_GET['id'])){
    if(!is_numeric($_GET['id']) || $_GET['id'] <= 0){
        header("Location: " . $config_basedir . "404.php");
        exit();
    }else{
        $validproj = intval( $_GET['id'] );
    }
} else{
    // if no id is provided, place a blank form for adding new project
    header("Location: " . $config_basedir . "admin/add.php");
}


    $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
    if(isset($_POST['submit'])){
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $descr = mysqli_real_escape_string($db, $_POST['descr']);
        $content = mysqli_real_escape_string($db, $_POST['content']);
        $validproj = $_POST['validproj'];


        $sql = "UPDATE case_studies 
        SET title = '$title', description = '$descr', content = '$content' 
        WHERE case_studies.id=" . $validproj .";";
    
        mysqli_query($db, $sql);
        header("Location: " . $config_basedir . "project.php?id=" . $validproj);
    } else{
        require('../include/header.php');
    }
    

// retrieving project information from database
$sql = "SELECT * FROM case_studies WHERE case_studies.id = " . $validproj . ";";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$num_row = mysqli_num_rows($result);


$contentSanitized = "<p>" . preg_replace("/\n/", "</p><p>", $row['content']);

?>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
    <input type="hidden" name="validproj" value="<?php echo $validproj; ?>">
    <!-- add value $validproj to help pass it to the php form handler -->
    <label for="title"> Title<br>
        <input type="text" name="title" value="<?php echo $row['title']; ?>">
    </label><br>
    <label for="descr">Description<br>
        <textarea type="text" name="descr"><?php echo $row['description']; ?></textarea>
    </label><br>
    <label for="content">Content<br>
        <textarea name="content" id="editor" width="100%"><?php echo $contentSanitized; ?></textarea>
    </label>
    <input type="submit" name="submit">
</form>


<script src="../scripts/quill.js"></script>

<?php
require('../include/footer.php');
?>