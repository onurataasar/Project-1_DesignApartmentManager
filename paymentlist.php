<html>
<title> ADMIN PAGE </title>
<link type="text/css" rel="stylesheet" href="adminpage.css">

<body>

    <div class="welcome">
        <h1> Welcome to Asar Residentials
            <br> Admin Panel <h1>
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
        } else {

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
    <div class="total">
    <div class="card" style="width:400px">
							<img class="card-img-top" style="max-width: 50%;" src="https://www.pngitem.com/pimgs/m/195-1951339_payment-computer-icons-money-logo-payment-terms-icon.png" alt="Card image">
							<div class="card-body">
								<h4 class="card-title">Total Payments</h4>
								<p class="card-text">
									<?php
									include "check.php";
									include "logincheck.php";
									$sql = "SELECT * FROM `payment`";
									$result = $conn->query($sql) or die("Failed to excecute the query $sql on $conn");

									$sum = 0;
									while ($row =  $result->fetch_assoc()) {

										$price = $row['price'];

										if ($price > 0) {

											$sum = $sum + $price;
										}
									}
									echo $sum;
									?></p>
								</p>
							</div>
						</div>
    </div>

    <div class="registerbox">

        <h3> Register a User </h3>

        <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                        ?>" method="post">

            <table>

                <div class="textbox">
                    <tr>
                        <td>Username(*):</td>
                        <td><input type="text" name="username" value="" placeholder="" size="50" required>
                            <p style="color:red;display:inline;"></p>
                        </td>
                    </tr>
                </div>
                <div class="textbox">
                    <tr>
                        <td>Name(*):</td>
                        <td><input type="text" name="name" value="" placeholder="" size="50" required>
                            <p style="color:red;display:inline;"></p>
                        </td>
                    </tr>
                </div>
                <div class="textbox">
                    <tr>
                        <td>Password(*):</td>
                        <td><input type="password" name="psw" value="" placeholder="" size="50" required>
                            <p style="color:red;display:inline;"></p>
                        </td>
                    </tr>
                </div>
                <div class="textbox">
                    <tr>
                        <td>E-Mail(*): </td>
                        <td><input type="text" name="email" value="" placeholder="example@mail.com" size="50" required>
                            <p style="color:red;display:inline;"></p>
                        </td>
                    </tr>
                </div>
                <tr>
                    <td>Block(*):</td>
                    <td> <select id="block" name="block" size="1">
                            <option value="A Block">A Block</option>
                            <option value="B Block">B Block</option>
                            <option value="C Block">C Block</option>
                        </select> </td>
                </tr>
            </table> <br>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <h6>
                <p style="color:red;">Needs to be filled (*)</p>
            </h6>

            <input class="btn" type="submit" class="btn btn-primary" name="submit" value="Submit"> <br> <br>


        </form>
    </div>
    <div class="panel">
    <?php
    include "check.php";

    if (isset($_POST['submit']) && !empty($_POST['expense']) && !empty($_POST['expensename']) && !empty($_POST['rate'])) {
      $expense = $_POST['expense'];
      $expensename = $_POST['expensename'];
      $rate = $_POST['rate'];

      $sql = "INSERT INTO adminpanel (expense, expensename, rate) VALUES ('$expense', '$expensename','$rate')";



      if ($conn->query($sql) === TRUE) {
        echo "";
      } else {
        echo "";
      }
      header('location:admin.php');
    }

    ?>
    <h3>Determine Monthly Rate and Expenses </h3>
    <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                  ?>" method="post">

      <table>

        <div class="textbox">
          <tr>
            <td>Expense Name:</td>
            <td><input type="text" name="expensename" value="" placeholder="" size="50" required>
              <p style="color:red;display:inline;"></p>
            </td>
          </tr>
        </div>
        <div class="textbox">
          <tr>
            <td>Expense(*):</td>
            <td><input type="int" name="expense" value="" placeholder="" size="50" required>
              <p style="color:red;display:inline;"></p>
            </td>
          </tr>
        </div>
        <div class="textbox">
          <tr>
            <td>Rate(*):</td>
            <td><input type="int" name="rate" value="" placeholder="" size="50" required>
              <p style="color:red;display:inline;"></p>
            </td>
          </tr>
        </div>
      </table> <br>
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <input class="btn" type="submit" class="btn btn-primary" name="submit" value="Send"> <br> <br>


    </form>
  </div>
    <div class="userlist">
        <p>
            <h2> Payments <a href="admin.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Click to show user list</a>
            </h2>
        </p>
        <?php
        include "check.php";

        $sql = "SELECT * FROM `payment`";
        
        $result = $conn->query($sql) or die("Failed to excecute the query $sql on $connection");


        echo "<table id='users' class='table table-bordered'>
                          <tr>
                          <th>Payment No</th>
                          <th>Username</th>
                          <th>Name</th>
                          <th>Collected</th>
                          <th>Date</th> 
                          </tr>";

        while ($row =  $result->fetch_assoc()) {
            $payno = $row['payno'];
            $username = $row['username'];
            $name = $row['name'];
            $price = $row['price'];
            $date = $row['date'];
            $rate = ("/3000");
            // code to display information


            {
                echo "<tr>
                        <td>$payno</td>
                        <td>$username</td>
                        <td>$name</td>
                        <td>$price$rate </td>
                        <td>$date</td>
                        </tr>";
            }
        }
        ?>

    </div>

</body>

</html>