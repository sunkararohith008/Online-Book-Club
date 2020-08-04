<?php
    $dsn = 'mysql:host=172.31.22.43;dbname=Rohith200449343';
    $username = 'Rohith200449343';
    $password = 'H2RJqvoqKM';
    $db = new PDO($dsn, $username, $password);
    //set error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
