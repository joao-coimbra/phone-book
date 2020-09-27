<?php
session_start();

include_once 'connection.php';
mysqli_set_charset($connect,"utf8");

if(empty($_POST['phone']) || empty($_POST['password'])) {
    $_SESSION['empty-signin'] = true;
    header('Location: ../../index.php');
    exit();
}

$phone = mysqli_real_escape_string($connect, $_POST['phone']);
$password = mysqli_real_escape_string($connect, $_POST['password']);

$sql = mysqli_query($connect, "select user from user where phone = '{$phone}' and password = md5('{$password}')");
$sqlInfo = mysqli_query($connect, "select * from user where phone = '{$phone}' and password = md5('{$password}')");

$row = mysqli_num_rows($sql);

if ($row == 1) {
    $info_db = mysqli_fetch_assoc($sqlInfo);
    $_SESSION['user'] = ucfirst(base64_decode($info_db['user']));
    $_SESSION['phone'] = $info_db['phone'];
    header("Location: ../../index.php");
    exit();
} else {
    $_SESSION['error'] = true;
    header("Location: ../../index.php");
    exit();
}