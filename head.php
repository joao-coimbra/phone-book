<?php

function head($title) {

    header("Content-type: text/html; charset=utf-8");
    echo "<title>$title</title>";

    echo '<link rel="stylesheet" href="src/css/global.css">';

}

?>