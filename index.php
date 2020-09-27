<?php
session_start();
include_once 'src/database/connection.php';
require_once 'src/database/verify_login.php';
require_once 'head.php';

$sql = "select count(*) as total from user";

$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);

$query = mysqli_query($connect, "select * from user where user_id = 1");

$user_db = mysqli_fetch_assoc($query);

$firstName = explode(' ',trim($_SESSION['user']))[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
head('Phone Book!');
?>
<link rel="stylesheet" href="src/css/page-index.css">
</head>
<body>
    <header>
        <h1><span></span>PhoneBook</h1>
        <a href="src/database/logout.php"><span></span><strong>logout</strong></a>
    </header>

    <main>
        <h2>Hello, <?php echo $firstName ?>!</h2>
        <h3>Here are all the numbers already registered</h3>
        <?php
        if($row['total'] > 0):
            for ($i=1 ; $i <= $row['total']; $i++):
                $query = mysqli_query($connect, "select * from user where user_id = $i");
                $info_db = mysqli_fetch_assoc($query);
                $user = ucfirst(base64_decode($info_db['user']));
                $email = $info_db['email'];
                $phone = $info_db['phone'];
                if ($phone != $_SESSION['phone']):
            ?>
        <div class="numbers">
            <div class="person">
                <?php
                echo "<h3>";
                echo $user;
                echo "</h3>";
                echo "<small>";
                echo $email;
                echo "</small>";
                ?>
            </div>
            <div class="phone">
                <?php 
                echo "<p>";
                echo "<span></span>";
                echo $phone;
                echo "</p>";
                ?>
            </div>
            <div class="wpp">
                <?php
                echo '<a href="https://api.whatsapp.com/send?phone=+55'.$phone.'&text=Hello%2C%20I%20would%20like%20talk%20to%20you" target="_blank">Entrar em contato</a>';
                ?>
            </div>
        </div>
        <?php
                endif;
            endfor;
        endif;
        ?>
    </main>
</body>
</html>