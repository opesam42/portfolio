<?php
session_start();
require('../config.php');


$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
if( isset($_POST['submit']) ){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT * FROM logins WHERE username = '" . $username . "' AND password = '" . $password . "';";
    $result = mysqli_query($db, $sql);
    $numrow = mysqli_num_rows($result);

    if($numrow == 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['USERNAME'] = $row['username'];
        $_SESSION['USERID'] = $row['id'];

        // redirect user to same page after submission after submission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();

    } else{
        header("Location: ". $_SERVER['PHP_SELF'] . "?error=1");
    }

}else{
    require('../include/header.php');
}

// require('../include/header.php');
?>

<main class="md">
    <h1>ADMIN PANEL</h1>
    <!-- if  session is on - no need to show the login form -->
<?php if(!isset($_SESSION['USERID'])){ ?>
    <form action="" method="POST">
        <h3>Login</h3>
        <!-- if there is an invalid login detail entered -->
        <?php
        if(isset($_GET['error'])){
            echo "<p class='error' style='margin:0; text-align:center'>Try again! Invalid username or password</p>";
        }
        ?>
        <label for="username">Username<br>
            <input type="text" name="username" required>
        </label>
        <br>
        <label for="password">Password<br>
            <input type="password" name="password" required>
        </label><br>
        <input type="submit" name="submit" value="Login">
    </form>
<!-- end if statement -->
<?php
} else{

    echo "<h3>Your Projects</h3>";
    echo "<div><a href='../add.php'>Add Project</a></div>";

    $projSql = "SELECT * FROM case_studies;";
    $projResult = mysqli_query($db, $projSql);
    $projNumRow = mysqli_num_rows($projResult);
    
    if($projNumRow > 0){
        echo "<table border=1>";
        echo "<tr>";
            echo "<th>Title</th>";
            echo "<th>Date Posted</th>";
            echo "<th>Date Modified</th>";
            echo "<th>Action</th>";
        echo "</tr>";
        while($projRow = mysqli_fetch_assoc($projResult)){
            echo "<tr>";
                echo "<td>" . $projRow['title'] . "</td>";
                echo "<td>" . date('d/m/Y h:i A', strtotime($projRow['date_posted'])) . "</td>";
                echo "<td>" . date('d/m/Y h:i A', strtotime($projRow['date_modified'])). "</td>";
                echo "<td style='display:flex; flex-direction:column; '>";
                    echo "<a href='../edit.php?id=" . $projRow['id'] . "'>Edit</a>";
                    echo "<a href='../project.php?id=" . $projRow['id'] . "'>Read</a>";
                    echo "<a href='delete.php?id=" . $projRow['id'] . "'>Delete</a>";
                echo "</td>";
                
            echo "</tr>";
            
        }
        echo "</table>";
    }

?>


<?php
}
?>
</main>

 
<?php
require('../include/footer.php');
?> 