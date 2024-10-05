<?php
require('config.php');

require('include/header.php');
?>
        <section class="hero-section">
            
                <div class="title">Hi, I Am Gbenga Opeyemi</div>
                <div class="sub-title"><strong>A Junior Web Developer and UX/UI Designer. Open to freelancing opportunities to improve user experience and help businesses achieve their goals.</strong></div>

                <a class="cta" href="#">Let's Connect</a>
                
                
                <!-- <div class="tools">
                    <img src="assets/devicon_figma.svg" alt="figma" width="48px">
                    <img src="assets/html-icon.svg" alt="html" width="48px">
                    <img src="assets/css-icon.svg" alt="css" width="48px">
                    <img src="assets/js-icon.svg"  alt="js" width="48px">
                    <img src="assets/django-icon.svg" alt="django" width="48px">
                    <img src="assets/php-icon.svg" alt="php" width="48px">

                </div> -->
        </section>

        <section class="case-studies">
            <h1 class="title-block">PROJECTS</h1>
            <section class="card-block">

                <?php
                $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
                $sql = "SELECT * FROM case_studies ORDER BY date_posted DESC";
                $result = mysqli_query($db, $sql);
                $numrow = mysqli_num_rows($result);
                
                while( $row = mysqli_fetch_assoc($result) ){
                    echo "<a class='card' href='" . $config_basedir . "project.php?id=" . $row['id'] . "'>
                        <img src='uploads/cover/" . $row['cover_image'] . "' alt='" . $row['title'] . "thumbnail' loading='lazy' width='100%'>";
                    echo "<section class='detail'>";
                        echo "<section class='proj-title'> <h3>" . $row['title'] . "</h3></section>";
                        echo "<section class='descr'>" . $row['description'] . "</section>";
                    echo "</section>";
                }
                ?>
            </section>
        </section> <!--Case studies section ends here-->

        <?php
            require('include/footer.php');
        ?>


    <!-- <script src="scripts/script.js"  type="text/javascript"></script> -->
</body>
</html>