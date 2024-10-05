<?php
session_start();
require('config.php');


//VALIDATE ID
if(isset($_GET['id'])){
    if( !is_numeric($_GET['id']) || $_GET['id'] <=0 ){
        //Redirect to a 404 page if the ID is invalid
        header("Location: " . $config_basedir . "404.php");
        exit();
    } else{
        $validproj = intval( $_GET['id'] ); // if id is correct, convert to integer, then pass it to $validproj
    }
} else{
    //If no ID is provided, redirect to the homepage
    header("Location: " . $config_basedir);
    exit();
}


{
    $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
        $sql = "SELECT * FROM case_studies 
        WHERE case_studies.id = " . $validproj .  
        " ORDER BY date_posted DESC";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $headTitle = $row['title'];
        $metaDescr = $row['description'];
}
require('include/header.php');
?>


<main  class="proj">
    
    <?php
        $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
        $sql = "SELECT * FROM case_studies 
        WHERE case_studies.id = " . $validproj .  
        " ORDER BY date_posted DESC";
        $result = mysqli_query($db, $sql);
        $numrow = mysqli_num_rows($result);

        if($numrow == 0){
            //redirect them to the 404 page
            header("Location " . $config_basedir);
        } else{
            // echo "<p>" . $numrow . "</p>";
            $row = mysqli_fetch_assoc($result);
            echo "<section class='heading'>";
            echo "<h1>" . $row['title'] . "</h1>";
            if(isset($_SESSION['USERID'])){
                echo "<a href='" .$config_basedir . "edit.php?id=" . $validproj . "'>Edit</a>";
            }
            echo "<img src='uploads/cover/" . $row['cover_image'] . "' alt='Cover image for" . $row['title'] . "' loading='lazy' width='70%'>";
            echo "</section>";
            echo "<section id='post'>" . $row['content'] . "</section>";
        }
    ?>
</main>

<?php
require('include/footer.php');
?>