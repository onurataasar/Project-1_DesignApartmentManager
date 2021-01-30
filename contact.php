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
							<button type="button" class="btn btn-success btn-sm"><a href="payrent.php" style="color:white;">PAY RENT</button>
							<button type="button" style="color:white;" class="btn btn-danger btn-sm"> <a href="user.php?logout='1'" style="color:white;">Logout</button>
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
						<h2>Contact Us</h2>
						<h4>

                        <?php
    ob_start();
    include 'check.php';
    ?>

                <?php
                if (isset($_GET['commentSucces'])) {
                    echo "<p class='success'>Comment Succesfully</p>";
                }
                if (isset($_GET['commentError'])) {
                    echo "<p class='errCenter'>Comment Error!</p>";
                }
                ?>

                <div class="container">
                    <br> <br>

                    <div class="row form-group">

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                        <div class="row form-group">

                            <div class="col-md-6">
                                <label for="message">
                                   Message:
                                </label>
                            </div>

                            <div class="col-md-6">
                                <textarea class="form-control" name="message" id="message" placeholder="Enter your message" cols="30" rows="3"></textarea>
                            </div>
                        </div>

                        <?php

                        if (!isset($_SESSION['userNum'])) { ?>

                            <div class="row form-group">

                                <div class="col-md-6">
                                    <label for="comment">
                                        Subject:
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="subject" id="subject"  placeholder="Topic of your message">
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input class="btn btn-success btn-block" type="submit" name="submit" id="submit" value="Send">
                            </div>


                        </div>
                    </form>

                </div>

                <?php
               include "logincheck.php";
               include "check.php";
   
               $errors = array();
   
               if (isset($_POST['submit'])) {
                 @$message = mysqli_real_escape_string($conn, $_POST['message']);
                 @$subject = mysqli_real_escape_string($conn, $_POST['subject']);
                 @$username = $_SESSION['username'];
                 
   
         
                 if (count($errors) == 0) {
   
   
                   $query = "INSERT INTO contact (message, subject, username) 
                             VALUES('$message', '$subject', '$username')";
                   mysqli_query($conn, $query);
                   header("location: user.php");
                 } else {echo "message not sent ";
                }
               }

                ?>
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