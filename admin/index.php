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
?>

<p>Logged in</p>

<?php
}
?>
</main>


<?php
require('../include/footer.php');
?>