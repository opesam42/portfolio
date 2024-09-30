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
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <!--main styles-->
    <link href="styles/main.css" rel="stylesheet">

    

        <?php
        // Conditional check to include Quill.js only on add and edit page
        if (strtolower( basename($_SERVER['PHP_SELF']) ) == 'add.php' || strtolower( basename($_SERVER['PHP_SELF']) ) == 'edit.php') {
        ?>
        <!-- <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" /> -->
        <!-- Add CKEDITOR -->
        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.css" />
        <script src="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.umd.js"></script>

        <?php
        } else if( strtolower( basename($_SERVER['PHP_SELF']) ) == 'project.php' || strtolower( basename($_SERVER['PHP_SELF']) ) == 'contact.php' ) {
            echo "<link rel='stylesheet' href='styles/proj.css' />";
        }
        ?>
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

        </section>