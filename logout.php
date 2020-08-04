<?php
    //checking for an existing session
    session_start();
    //unset the session variables
    session_unset();
    //destroy session
    session_destroy();
    //redirecting to the login page
    header('location:login.php');
?>
