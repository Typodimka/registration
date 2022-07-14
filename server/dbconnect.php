<?php


    $mysqli = new mysqli('localhost', 'root', 'root', 'reg');
    if ($mysqli->connect_error)
    {
        die('Connect Error('.$mysqli->connect_error.') '.$mysqli->connect_error );
    }
?>