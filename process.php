<?php require_once('header.php'); ?>
<?php require_once('navigation.php'); ?>
<main>
<?php
//creating variables to store form data
$first_name = filter_input(INPUT_POST, 'fname');
$last_name = filter_input(INPUT_POST, 'lname');
$book = filter_input(INPUT_POST, 'book');

/* image */
$photo = $_FILES['photo']['name'];
$photo_type = $_FILES['photo']['type'];
$photo_size = $_FILES['photo']['size'];

$id = null;
$id = filter_input(INPUT_POST, 'user_id');
//setting up a flag variable
$ok = true;

//define image constants
define('UPLOADPATH', 'images/');
define('MAXFILESIZE', 32786); //32 KB

//validation
// first name and last name not empty
if (empty($first_name) || empty($last_name)) {
    echo "<p class='error'>Please provide both first and last name! </p>";
    $ok = false;
}

//Book not empty
if (empty($book)) {
    echo "<p class='error'>Please provide your book review!</p>";
    $ok = false;
}

// check photo is the right size and type
if ((($photo_type !== 'image/gif') || ($photo_type !== 'image/jpeg') || ($photo_type !== 'image/jpg') || ($photo_type !== 'image/png')) && ($photo_size < 0) && ($photo_size >= MAXFILESIZE))
{
//making sure no upload errors
    if ($_FILES['photo']['error'] !== 0)
    {
        $ok = false;
        echo "Please submit a photo that is a jpg, png or gif and less than 32kb";
    }
}

//if form validates, try to connect to database and add info
if ($ok === true)
{
    try {
          $target = UPLOADPATH . $photo;
          move_uploaded_file($_FILES['photo']['name'], $target);
          // connecting to the database
          require_once('connect.php');
          //if we have an id, that means we are updating
          if (!empty($id))
          {
              $sql = "UPDATE persons SET first_name = :firstname, last_name = :lastname, book = :book, photo = :photo WHERE user_id = :user_id;";
          }
          else
          {
              // setting up an SQL command to save the information
              $sql = "INSERT INTO persons (first_name, last_name, book, photo) VALUES (:firstname, :lastname, :book, :photo);";
          }
          // Calling the prepare method of the PDO object to prepare the query and return a PDOstatement object
          $statement = $db->prepare($sql);
          //fill the placeholders with the 6 input variables using bindParam method
          $statement->bindParam(':firstname', $first_name);
          $statement->bindParam(':lastname', $last_name);
          $statement->bindParam(':book', $book);
          $statement->bindParam(':photo', $photo);

          //if we are updating, bind :user_id
          if (!empty($id))
           {
              $statement->bindParam(':user_id', $id);
            }
            // execute the insert
            $statement->execute();
            // show message
            echo "<p> Information added! Thanks for sharing! </p>";
            // disconnecting
            $statement->closeCursor();
          } catch (PDOException $e)
            {
                $error_message = $e->getMessage();
                //show error message to user
                echo "<p> Sorry! We are not able to process your submission at this time.</p> ";
                echo $error_message;
                echo " $id $first_name $last_name $book $photo";
                //email app admin with error
                mail('sunkararohith008@gmail.com', 'Final Exam Error', 'Error :' . $error_message);
            }
        }
        ?>
        <a href="index.php" class="btn btn-lg btn-secondary orange"> Back to Form </a>
    </main>
    <?php require_once('footer.php'); ?>
