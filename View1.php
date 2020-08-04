
<?php require_once('header.php'); ?>
<?php require_once('navigation.php'); ?>
<h1>Club Members Information</h1>
<main>
<?php
try {
    //connect to our db
    require_once('connect.php');

    //set up SQL statement
    $sql = "SELECT * FROM persons;";

    //prepare the query
    $statement = $db->prepare($sql);

    //execute
    $statement->execute();

    //use fetchAll to store the results
    $records = $statement->fetchAll();

    // echo out the top of the table

    echo "<table class='table'><thead class='thead-dark'><th>Profile Picuture</th><th>First Name</th><th>Last Name</th><th>Book Review</th></thead><tbody>";

    foreach ($records as $record) {
        echo "<tr><td><img src='images/". $record['photo']. "' alt='" . $record['photo'] . "'></td><td>"
        . $record['first_name'] . "</td><td>" . $record['last_name'] . "</td><td>" . $record['book'] . "</td></tr>";
        }
     echo "</tbody></table>";

     $statement->closeCursor();
    }
    catch(PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p> $error message </p>";
    }
    ?>
    </main>
    <?php require_once('footer.php'); ?>
