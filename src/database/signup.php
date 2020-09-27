<?php
session_start();
include_once 'connection.php';
header("Content-type: text/html; charset=utf-8");
mysqli_set_charset($connect,"utf8");

if(empty($_POST['user']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['phone'])) {
    $_SESSION['empty-signup'] = true;
    header('Location: ../../register.php');
    exit();
}

$user = base64_encode(mysqli_real_escape_string($connect, trim($_POST['user'])));
$email = mysqli_real_escape_string($connect, trim($_POST['email']));
$phone = mysqli_real_escape_string($connect, $_POST['phone']);
$password = mysqli_real_escape_string($connect, trim(md5($_POST['password'])));

$sql = "select count(*) as total from user where phone = '$phone'";

$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['already-exists'] = true;
    header("Location: ../../register.php");
    exit();
}

$sql = "INSERT INTO user (user, email, phone, password, date) VALUES ('$user', '$email', '$phone', '$password', NOW())";

if($connect->query($sql) === TRUE) {
    $_SESSION['status-signup'] = true;
}

$connect->close();

header("Location: ../../register.php");
exit();