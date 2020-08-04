<?php require_once('header.php'); ?>
<?php require_once('navigation.php'); ?>
<h1>Register Your Information</h1>
<?php
//initializing variables
$id = null;
$firstname = null;
$lastname = null;
$book = null;
$photo = null;

if(!empty($_GET['id']) && (is_numeric($_GET['id']))) {
//grabing the id from url
$id = filter_input(INPUT_GET, 'id');

//connecting to our database
require_once('connect.php');

//setting up our query
$sql = "SELECT * FROM persons WHERE user_id = :user_id;";

//preparing our statement
$statement = $db->prepare($sql);

//binding
$statement->bindParam(':user_id', $id);

//executing
$statement->execute();

//using fetchAll to store
$records = $statement->fetchAll();

//to loop through, use a foreach loop
foreach($records as $record) :
$firstname = $record['first_name'];
$lastname = $record['last_name'];
$book = $record['book'];
$photo = $record['photo'];
endforeach;

//close the db connection
$statement->closeCursor();
}
?>
    <main>
      <form action="process.php" method="post" enctype="multipart/form-data" class="form">
        <!-- add hidden input with user id if editing -->
        <input type="hidden" name="user_id" value="<?php echo $id;?>">
        <!-- First Name of the Club Member-->
        <label for="fname"> First Name  </label>
        <input type="text" name="fname" class="form-control" id="fname" value="<?php echo $firstname; ?>">

        <!-- Last Name of the Club Member -->
        <label for="lname"> Last Name  </label>
        <input type="text" name="lname" class="form-control" id="lname" value="<?php echo $lastname; ?>">

        <!-- Short Book Review -->
        <label for="book"> Short Book Review</label>
        <input type="text" name="book" class="form-control" id="book" value="<?php echo $book; ?>">

        <!-- Profile Image of the Member -->
        <label for="photo"> Your Profile Pic </label>
        <input type="file" name="photo" id="photo" value="<?php echo $photo;?>">

        <!-- Submit the form -->
        <input type="submit" name="submit" value="Send & Share" class="btn">
      </form>
    </main>
   <?php require_once('footer.php'); ?>
