<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
 include "check.php";

 // check if the 'id' variable is set in URL, and check that it is valid
// Create connection
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$userID = $_GET['userID'];

// sql to delete a record
$today=date("Y-m-d");
$sql = "UPDATE users SET status = 0, outdate = DATE(NOW()) WHERE userID='$userID'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: admin.php");
} else {
  echo "Error deleting record: " . $conn->error;
  header("Location: admin.php");
}

$conn->close();
?>
