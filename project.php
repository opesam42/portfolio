<?php
session_start();
require('config.php');

// VALIDATE ID
if (isset($_GET['id'])) {
    if (!is_numeric($_GET['id']) || $_GET['id'] <= 0) {
        // Redirect to a 404 page if the ID is invalid
        header("Location: " . $config_basedir . "404.php");
        exit();
    } else {
        $validproj = intval($_GET['id']); // if id is correct, convert to integer, then pass it to $validproj
    }
} else {
    // If no ID is provided, redirect to the homepage
    header("Location: " . $config_basedir);
    exit();
}

// Establish the database connection
$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);

// Check the connection
if (!$db) {
    exit("Error connecting to database: " . mysqli_connect_error());
}

// Query for the selected project details
$sql = "SELECT * FROM case_studies WHERE id = $validproj ORDER BY date_posted DESC";
$result = mysqli_query($db, $sql);

// Check if the query returned any rows
if (!$result || mysqli_num_rows($result) == 0) {
    // Redirect to the 404 page if no rows are found
    header("Location: " . $config_basedir . "404.php");
    exit();
}

$row = mysqli_fetch_assoc($result);
$headTitle = $row['title'] . " | Case Study";
$metaDescr = $row['description'];

require('include/header.php');
?>

<main class="proj">
    <section class="heading">
        <img src="uploads/cover/<?php echo $row['cover_image']; ?>" alt="Cover image for <?php echo $row['title']; ?>" width="100%" style="display:block">
        <h1><?php echo $row['title']; ?></h1>
        <div class="links">
            <?php if (!empty($row['design_link'])) { ?>
                <a href="<?php echo $row['design_link']; ?>" target="_blank">Design Link</a>
            <?php } ?>
            <?php if (!empty($row['live_site_link'])) { ?>
                <a href="<?php echo $row['live_site_link']; ?>" target="_blank"><i class="fa fa-globe"></i> Live Site</a>
            <?php } ?>
            <?php if (!empty($row['github_link'])) { ?>
                <a href="<?php echo $row['github_link']; ?>" target="_blank"><i class="fa fa-github"></i> Github</a>
            <?php } ?>
        </div>

        <?php if (isset($_SESSION['USERID'])) { ?>
            <a href="<?php echo $config_basedir . "edit.php?id=" . $validproj; ?>">Edit</a>
        <?php } ?>
    </section>

    <section id="post">
        <?php echo $row['content']; ?>
    </section>
</main>

<aside class="case-studies">
    <h1 class="title-block">OTHER PROJECTS</h1>
    <div class="card-block">
        <?php
        // Query for other visible projects
        $sql_other = "SELECT * FROM case_studies WHERE is_visible = 1 AND id <> $validproj ORDER BY date_posted DESC";
        $result_other = mysqli_query($db, $sql_other);

        while ($row_other = mysqli_fetch_assoc($result_other)) {
            ?>
            <a class="card" href="<?php echo $config_basedir . "project.php?id=" . $row_other['id']; ?>">
                <article>
                    <div class="img-wrapper">
                        <img src="uploads/cover/<?php echo $row_other['cover_image']; ?>" alt="Cover image for <?php echo $row_other['title']; ?>" width="100%">
                    </div>
                    <div class="detail">
                        <h3 class="proj-title"><?php echo $row_other['title']; ?></h3>
                        <div class="tag">
                            <?php echo ($row_other['project_type'] == 'UI-UX') ? 'UI/UX' : 'Web Development'; ?>
                        </div>
                        <p class="descr"><?php echo $row_other['description']; ?></p>
                    </div>
                </article>
            </a>
        <?php } ?>
    </div>
</aside>

<?php
// Close the database connection
mysqli_close($db);
require('include/footer.php');
?>
