
<link rel="stylesheet" href="./css/registe.css" />
<?php 
include "check.php";

        if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['name']) && !empty($_POST['psw']) && !empty($_POST['email'])) {
          $uname = $_POST['username'];
          $name = $_POST['name'];
          $pass = $_POST['psw'];
          $email = $_POST['email'];
          $block = $_POST['block'];
          
          if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                  header("Location:register.php?error=Invalid E-Mail adress.");
              }

              else {

          $sql = "INSERT INTO users (username, name, psw, email, block) VALUES ('$uname', '$name','$pass','$email', '$block')";


            if ($conn->query($sql) === TRUE) {
              echo "";
            } else {
              echo "";
            }
            header('location:register.php');


        }
        }

        ?>
        <div class = "registerbox">
          <h1> REGISTER </h1>
<form class = "form-signin" role = "form"
         action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
         ?>" method = "post">
          <table>
           
         
            <tr>
              <td>Username:</td>
              <td><input type="text" name="username" value="" placeholder="" size="20" required><p style="color:red;display:inline;">*</p></td>
            </tr>
            <tr>
              <td>Name:</td>
              <td><input type="text" name="name" value="" placeholder="" size="20" required><p style="color:red;display:inline;">*</p></td>
            </tr>
            <tr>
              <td>Password:</td>
              <td><input type="password" name="psw" value="" placeholder="" size="20" required><p style="color:red;display:inline;">*</p></td>
            </tr>
            <tr>
              <td>E-Mail:</td>
              <td><input type="text" name="email"  value="" placeholder="example@mail.com" size="20" required><p style="color:red;display:inline;">*</p></td>
            </tr>
            <tr>
              <td>Block:</td>
             <td> <select id="block" name="block" size="1"  >
          <option value="A Block">A Block</option>
          <option value="B Block">B Block</option>
          <option value="C Block">C Block</option>
       </select> </td> 
            </tr>

          </table> <br>
          <p style="color:red;">Needs to be filled (*)</p> <br>
          <button type="submit" value="Ekle" class="btn btn-primary" name="submit">Submit</button> <br><br>
          <?php if (isset($_GET['error'])) { ?>
              <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

        </form>
