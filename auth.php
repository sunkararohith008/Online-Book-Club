<?php
// using session_start to check for an existing session
session_start();
if(empty($_SESSION['id'])) {
    header('location:login.php');
    exit();
}
?>
