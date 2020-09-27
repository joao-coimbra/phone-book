<?php
session_start();
require_once 'head.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
head('Signup');
?>
<link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <div class="register">
        <form action="src/database/signup.php" method="post">
            <h1>Sign Up</h1>
            <?php // empty 
                if(isset($_SESSION['empty-signup'])):
                ?>
                <div class="error">Required fields.</div>
                <?php
                unset($_SESSION['empty-signup']);
                endif;
            ?>
            <?php // already exists 
                if(isset($_SESSION['already-exists'])):
                ?>
                <div class="error">Telephone already exists.</div>
                <?php
                unset($_SESSION['already-exists']);
                endif;
            ?>
            <?php // done 
                if(isset($_SESSION['status-signup'])):
                ?>
                <div class="success">Registered successfully, <a href="login.php">login now</a>!</div>
                <?php
                unset($_SESSION['status-signup']);
                endif;
            ?>
            <label id="user">
                <input name="user" type="text" placeholder="Name" autocomplete="off">
            </label>
            <label id="email">
                <input name="email" type="email" placeholder="Email" autocomplete="off">
            </label>
            <label id="phone">
                <input name="phone" type="text" placeholder="Phone" minlength="11" maxlength="11" autocomplete="off">
            </label>
            <label id="password">
                <input name="password" type="password" placeholder="Password" autocomplete="off">
            </label>
            <button type="submit">Sign Up</button>
        </form>
    </div>
    <a href="login.php">Sign in</a>
</body>
</html>