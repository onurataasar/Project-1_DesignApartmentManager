<!-- Logout button -->
<?php
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<title> Welcome </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="userpage.css">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>




<!--  <div class="logo-container">
      <a href="homepage.php" style="text-decoration:none;color: white; padding:15px;   font: italic small-caps bold 12px/30px Georgia, serif;
 font-weight: 1000;margin:7% 7%; background-color: black;">
        <h3>Asar Residentials</h3>
      </a>
    </div>
-->

<nav class="navbar fixed-top  navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Welcome</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.google.com/maps/@36.6728673,30.5570388,16.24z" target="_blank">Navigation</a>
      </li>


    </ul>

  </div>
</nav>
</head>

<body>

  <header>


    <div class="container">
      <div class="row profile">
        <div class="col-md-3">
          <div class="profile-sidebar">

            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
              <div class="profile-usertitle-name">
                <?php
                include "logincheck.php";
                echo $_SESSION['username'];
                ?>
              </div>
              <div class="profile-usertitle-job">
                Resident
              </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
              <button type="button" class="btn btn-success btn-sm"><a href="user.php" style="color:white;">PROFILE</button>
              <button type="button" class="btn btn-danger btn-sm"> <a href="user.php?logout='1'" style="color:white;">Logout</button>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            <div class="profile-usermenu">
              <ul class="nav">
                <li class="active">
                  <a href="user.php">
                    <i class="glyphicon glyphicon-home"></i>
                    Overview </a>
                </li>
                <li>
									<a href="annoshow.php">
										<i class="glyphicon glyphicon-user"></i>
										Announcements </a>
								</li>
                <li>
                  <a href="paymenthistory.php">
                    <i class="glyphicon glyphicon-user"></i>
                    Payment History </a>
                </li>

                <li>
                  <a href="expenses.php">
                    <i class="glyphicon glyphicon-flag"></i>
                    Monthly Expenses </a>
                </li>

                <li>
									<a href="contact.php">
										<i class="glyphicon glyphicon-flag"></i>
										Contact Us </a>
								</li>
              </ul>
            </div>
            <!-- END MENU -->
          </div>
        </div>
        <div class="col-md-9">
          <div class="profile-content">
            <?php
            include "logincheck.php";
            include "check.php";

            $errors = array();

            if (isset($_POST['but_submit'])) {
              @$name = mysqli_real_escape_string($conn, $_POST['name']);
              @$payno = mysqli_real_escape_string($conn, $_POST['payno']);
              @$price = mysqli_real_escape_string($conn, $_POST['price']);
              @$date = mysqli_real_escape_string($conn, $_POST['date']);
              @$username = $_SESSION['username'];
              

      
              if (count($errors) == 0) {


                $query = "INSERT INTO payment (name, username, price, date, payno) 
                          VALUES('$name', '$username', '$price', '$date', '$payno')";
                mysqli_query($conn, $query);
                header("location: user.php");
              }
            }

            ?>
            <form method="post" action="">
              <div class="form-row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Name</label>
                    <input class="form-control py-4" id="inputFirstName" name="name" type="text" placeholder="Who are you paying for?" />
                  </div>
                </div>

              </div>
              <div class="form-group">
                <label class="small mb-1" for="inputPrice">Price</label>
                <input class="form-control py-4" id="inputPrice" name="price" type="number" placeholder="Enter Price" />
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="small mb-1" for="inputDate"> Date</label>
                    <input class="form-control py-4" id="inputDate" name="date" type="month" placeholder="" />
                    
                  </div>
                </div>

                <input type="submit" class="btn btn-primary btn-block" value="Pay Now" name="but_submit" id="but_submit" href="user.php" />

            </form>
          </div>
        </div>
      </div>
    </div>

    <center>

      <strong>Asar Residentials</a></strong>
    </center>
    <br>
    <br>
  </header> <br>
