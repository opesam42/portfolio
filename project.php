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
        $headTitle = $row['title'] . " | Case Study";
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
            echo "<img src='uploads/cover/" . $row['cover_image'] . "' alt='Cover image for" . $row['title'] . "' width='100%' style='display:block'>";
            echo "<h1>" . $row['title'] . "</h1>";
            echo "<div class='links'>";
                if( !empty( $row['design_link'] ) ){
                    echo "<a href='" . $row['design_link'] . "' target='_blank'>Design Link</a>";
                }
                if( !empty( $row['live_site_link'] ) ){
                    echo "<a href='" . $row['live_site_link'] . "' target='_blank'><i class='fa fa-globe'></i> Live Site</a>";
                }
                if( !empty( $row['github_link'] ) ){
                    echo "<a href='" . $row['github_link'] . "' target='_blank'><i class='fa fa-github'></i> Github</a>";
                }
            echo "</div>";
            if(isset($_SESSION['USERID'])){
                echo "<a href='" .$config_basedir . "edit.php?id=" . $validproj . "'>Edit</a>";
            }
            
            echo "</section>";
            echo "<section id='post'>" . $row['content'] . "</section>";



            // add links
            echo "<div class='links'>";
            if( !empty( $row['design_link'] ) ){
                echo "<a href='" . $row['design_link'] . "' target='_blank'>Design Link</a>";
            }
            if( !empty( $row['live_site_link'] ) ){
                echo "<a href='" . $row['live_site_link'] . "' target='_blank'><i class='fa fa-globe'></i> Live Site</a>";
            }
            if( !empty( $row['github_link'] ) ){
                echo "<a href='" . $row['github_link'] . "' target='_blank'><i class='fa fa-github'></i> Github</a>";
            }
        echo "</div>";
        }
    ?>

</main>

<aside class="case-studies">
        <h1 class="title-block">OTHER PROJECTS</h1>
        <div class="card-block">
            <?php
            $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
            $sql = "SELECT * FROM case_studies WHERE is_visible = 1 AND id <> $validproj ORDER BY date_posted DESC";
            $result = mysqli_query($db, $sql);
            $numrow = mysqli_num_rows($result);
            
            while( $row = mysqli_fetch_assoc($result) ){
                echo "<a class='card' href='" . $config_basedir . "project.php?id=" . $row['id'] . "'>";
                    echo "<article>";
                        echo "<div class='img-wrapper'>";
                            echo "<img src='uploads/cover/" . $row['cover_image'] . "' alt='Cover image for " . $row['title'] . "' width='100%'>";
                        echo "</div>";
                        echo "<div class='detail'>";
                            echo "<h3 class='proj-title'>" . $row['title'] . "</h3>";
                            if($row['project_type'] == 'UI-UX'){
                                $tag = 'UI/UX';
                            } else if($row['project_type'] == 'Web'){
                                $tag = 'Web Development';
                            }
                            echo "<div class='tag'>" . $tag . "</div>";
                            echo "<p class='descr'>" . $row['description'] . "</p>";
                        echo "</div>";
                    echo "</article>";
                echo "</a>";
            }
            ?>
        </div>
</aside>

<?php
require('include/footer.php');
?>