<?php
require('config.php');

$headTitle = 'Gbenga Opeyemi - UX and Web Designer';

require('include/header.php');
?>
        <section class="hero-section">
            <div class="main">
                <div class="title">Hi, I'm <span class="dot-ul">Gbenga Opeyemi</span></div>
                <div class="sub-title">A <strong style="color:yellow; font-weight:500;">Junior Web Developer and UX/UI Designer</strong>. Open to freelancing opportunities to improve user experience and help businesses achieve their goals.</div>

                <a class="cta" href="<?php echo $config_basedir . "/contact.php" ?>">Let's Connect</a>
                

            </div>
            <!-- <div class="tools">
                    <img src="assets/devicon_figma.svg" alt="figma" width="48px">
                    <img src="assets/html-icon.svg" alt="html" width="48px">
                    <img src="assets/css-icon.svg" alt="css" width="48px">
                    <img src="assets/js-icon.svg"  alt="js" width="48px">
                     <img src="assets/django-icon.svg" alt="django" width="48px">
                    <img src="assets/php-icon.svg" alt="php" width="48px">
                </div>  -->
            <div class="hero-image">
                <img src="assets/Hand coding-pana.png" width="40%">
            </div> 
        </section>

    <section class="case-studies">
        <h1 class="title-block">PROJECTS</h1>
        <div class="card-block">
            <?php
            $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
            $sql = "SELECT * FROM case_studies WHERE is_visible = 1 ORDER BY date_posted DESC";
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
    </section>


        <?php
            require('include/footer.php');
        ?>


    <!-- <script src="scripts/script.js"  type="text/javascript"></script> -->
</body>
</html>