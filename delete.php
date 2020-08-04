<?php ob_start();

try
{
//grab the user id and store in a variable
$id = filter_input(INPUT_GET, 'id');
//connect to the database
require_once('connect.php');
//set up SQL statement
$sql = "DELETE FROM persons WHERE user_id = :user_id;";
//prepare statement
$statement = $db->prepare($sql);
//bindParam method
$statement->bindParam(':user_id', $id );
//execute the statement
$statement->execute();
//close the database connection
$statement->closeCursor();
//send user to view.php
header('location:view.php');
}
catch(PDOException $e)
{
    $error_message = $e->getMessage();
    echo "<p> $errormessage </p>";
}
ob_flush();
?>
