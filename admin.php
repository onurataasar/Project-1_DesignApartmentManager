<html> <title> ADMIN PAGE </title>
<link type="text/css" rel="stylesheet" href="./css/admin1.css" />
<body>
  <div class = "welcome">
<h1> Welcome to Asar Residentials
  <br> Admin Panel  <h1>
</div>

<?php 
include "check.php";

        if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['name']) && !empty($_POST['psw']) && !empty($_POST['email']) && !empty($_POST['block'])) {
          $uname = $_POST['username'];
          $name = $_POST['name'];
          $pass = $_POST['psw'];
          $email = $_POST['email'];
          $block = $_POST['block'];
          
          if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                  header("Location:admin.php?error=Invalid E-Mail adress.");
              }

              else {

          $sql = "INSERT INTO users (username, name, psw, email, block) VALUES ('$uname', '$name',MD5('$pass'),'$email', '$block')";
          


            if ($conn->query($sql) === TRUE) {
              echo "";
            } else {
              echo "";
            }
            header('location:admin.php');


        }
        }

        ?>
        <div class = "registerbox">
<h3> Register a User </h3>

<form class = "form-signin" role = "form"
         action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
         ?>" method = "post">
         
          <table>
           
         <div class = "textbox">
            <tr>
              <td>Username(*):</td>
              <td><input type="text" name="username" value="" placeholder="" size="50" required><p style="color:red;display:inline;"></p></td>
            </tr>
      </div>
      <div class = "textbox">
            <tr>
              <td>Name(*):</td>
              <td><input type="text" name="name" value="" placeholder="" size="50" required><p style="color:red;display:inline;"></p></td>
            </tr>
      </div>
      <div class = "textbox">
            <tr>
              <td>Password(*):</td>
              <td><input type="password" name="psw" value="" placeholder="" size="50" required><p style="color:red;display:inline;"></p></td>
            </tr>
      </div>
      <div class = "textbox">
            <tr>
              <td>E-Mail(*):  </td>
              <td><input type="text" name="email"  value="" placeholder="example@mail.com" size="50" required><p style="color:red;display:inline;"></p></td>
            </tr>
      </div>
      <tr>
      <td>Block(*):</td>
             <td> <select id="block" name="block" size="1"  >
          <option value="A Block">A Block</option>
          <option value="B Block">B Block</option>
          <option value="C Block">C Block</option>
       </select> </td> 
      </tr>
          </table> <br>
          <?php if (isset($_GET['error'])) { ?>
              <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
          <h6><p style="color:red;">Needs to be filled (*)</p></h6>
         
          <input class="btn" type="submit" class="btn btn-primary" name="submit" value="Submit"> <br> <br>


        </form>
          </div>

<div class="userlist">
<p> <h2> List of the users </h2> </p>

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

$sql = "SELECT userID, name, username, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["userID"]. "<br>". "  Name: " . $row["name"]. " " ."<br>" . "Username: " . $row["username"]. " " . "<br>".  "  Email: " . $row["email"]. " " ."<br>". "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</div>
</div>
</body>
</html>
