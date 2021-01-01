<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>MYSQLi</title>
</head>
<body>
<div class="">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT userID, name, username FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["userID"]. "<br>". "  Name: " . $row["name"]. " " ."<br>" . "Username: " . $row["username"]. "<br>" . "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>


</div>
</body>
</html>