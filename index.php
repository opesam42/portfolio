<?php
require('config.php');
?>

<!-- Add sticky header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gbenga Opeyemi - UX and Web Designer</title>

    <!-- add tailwind css -->
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--main styles-->
    <link href="styles/main.css" rel="stylesheet">
</head>
<body>
        <section class="header-hero">
        <header>
                <a href="<?php echo $config_basedir?>" class="logo">
                    <img src="assets/display-pic1.png">
                    <span>Gbenga Opeyemi</span>
                </a>
                <nav>
                    <div class="mobile-header">
                        <a href="<?php echo $config_basedir?>" class="logo">
                            <img src="assets/display-pic1.png">
                            <span>Gbenga Opeyemi</span>
                        </a>
                        <div class="toggle-bar close"><i class="fa-lg fa fa-close"></i></div>
                    </div>
                    <!-- <div class="main-nav"> -->
                        <a href="<?php echo $config_basedir?>">Home</a>
                        <a href="<?php echo $config_basedir . 'resume.php'?>">Resume</a>
                        <a href="<?php echo $config_basedir . 'contact.php'?>">Contact</a>
                    <!-- </div> -->
                </nav>
                <div class="toggle-bar open"><i class="fa-lg fa fa-bars"></i></div>
            </header>

            <section class="hero-section">
                <div class="title">Hi, I Am Gbenga Opeyemi</div>
                <div class="sub-title"><strong>UI/UX Designer | Web Developer</strong> <br>Focused on <em>MINIMALISTIC and VALUE Driven Design</em></div>

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
                        <img src='assets/projects/zepama-thumbnail2.jpg' alt='zepama-thumbnail' loading='lazy' width='100%'>";
                    echo "<section class='detail'>";
                        echo "<section class='proj-title'> <h3>" . $row['title'] . "</h3></section>";
                        echo "<section class='descr'>" . $row['description'] . "</section>";
                    echo "</section>";
                }
                ?>
                <a class="card" href="#">
                    <!-- <div class="thumbnail"> -->
                        <img src="assets/projects/zepama-thumbnail2.jpg" alt="zepama-thumbnail" loading="lazy" width="100%">
                    <!-- </div> -->
                    <section class="detail">
                        <section class="proj-title"><h3>Zepama</h3></section>
                        <section class="descr">In this project, I worked on a complete redesign of LingScar's website, focusing on improving the user interface and creating a seamless, responsive experience for car leasers.</section>
                    </section>

                    <!-- <section class="proj-link">
                        <button ><img src="assets/figma-black-icon.svg" width="24px">Figma</a>
                        <a href="#"><img src="assets/github-black-icon.svg" width="24px">Github</a>
                    </section> -->
                </a>

                <a class="card" href="#">
                    <!-- <div class="thumbnail"> -->
                        <img src="assets/projects/zepama-thumbnail2.jpg" alt="zepama-thumbnail" loading="lazy" width="100%">
                    <!-- </div> -->
                    <section class="detail">
                        <section class="proj-title"><h3>Lings-Car</h3></section>
                        <section class="descr">In this project, I worked on a complete redesign of LingScar's website, focusing on improving the user interface and creating a seamless, responsive experience for car leasers.</section>
                    </section>

                    <!-- <section class="proj-link">
                        <a href="#"><img src="assets/figma-black-icon.svg" width="24px">Figma</a>
                        <a href="#"><img src="assets/github-black-icon.svg" width="24px">Github</a>
                    </section> -->
                </a>

                <a class="card" href="#">
                    <!-- <div class="thumbnail"> -->
                        <img src="assets/projects/yale-thumbnail.jpg" alt="yale-thumbnail" loading="lazy" width="100%">
                    <!-- </div> -->
                    <section class="detail">
                        <section class="proj-title"><h3>Yale School of Art</h3></section>
                        <section class="descr">n this project, I worked on a complete redesign of LingScar's website, focusing on improving the user interface and creating a seamless, responsive experience for car leasers.
                            </section>
                    </section>

                    <!-- <section class="proj-link">
                        <a href="#"><img src="assets/figma-black-icon.svg" width="24px">Figma</a>
                        <a href="#"><img src="assets/github-black-icon.svg" width="24px">Github</a>
                    </section> -->
                </a>

            </section>
        </section> <!--Case studies section ends here-->

        <?php
            require('include/footer.php');
        ?>


    <!-- <script src="scripts/script.js"  type="text/javascript"></script> -->
</body>
</html>