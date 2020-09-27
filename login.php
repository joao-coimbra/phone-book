<?php
session_start();
require_once 'head.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
head('Login');
?>
<link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <div class="login">
        <form action="src/database/signin.php" method="post">
            <h1>Sign In</h1>
            <?php // done 
                if(isset($_SESSION['empty-signin'])):
                ?>
                <div class="error">Required fields.</div>
                <?php
                unset($_SESSION['empty-signin']);
                endif;
            ?>
            <?php // error 
                if(isset($_SESSION['error'])):
                ?>
                <div class="error">Invalid email or password.</div>
                <?php
                unset($_SESSION['error']);
                endif;
            ?>
            <label id="phone">
                <input name="phone" type="tel" placeholder="Phone" minlength="11" maxlength="11" autocomplete="off">
            </label>
            <label id="password">
                <input name="password" type="password" placeholder="Password" autocomplete="off">
            </label>
            <button type="submit">Sign In</button>
        </form>
    </div>
    <a href="register.php">Sign up</a>
</body>
</html>
