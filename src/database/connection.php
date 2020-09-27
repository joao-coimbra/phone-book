<?php

define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASS', '');
define('DB', 'phonebook');

$connect = mysqli_connect(HOST, USER, PASS, DB) or die ('Could not connect to the database');