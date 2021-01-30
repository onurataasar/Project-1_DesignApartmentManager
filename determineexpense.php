<!-- Logout button -->
<?php
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['adminUsername']);
	header("location: adminlogin.php");
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
	<a class="navbar-brand" href="#">Welcome to Admin Page</a>
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
								echo "Welcome onurataasar";
								?>
							</div>
							<div class="profile-usertitle-job">
								Admin
							</div>
						</div>
						<!-- END SIDEBAR USER TITLE -->
						<!-- SIDEBAR BUTTONS -->
						<div class="profile-userbuttons">
							<button type="button" class="btn btn-success btn-sm"><a href="add_user.php" style="color:white;">ADD RESIDENT</button>
							<button type="button" style="color:white;" class="btn btn-danger btn-sm"> <a href="admin.php?logout='1'" style="color:white;">Logout</button>
						</div>
						<!-- END SIDEBAR BUTTONS -->
						<!-- SIDEBAR MENU -->
						<div class="profile-usermenu">
							<ul class="nav">
								<li class="active">
									<a href="paymentlist.php">
										<i class="glyphicon glyphicon-home"></i>
										Payment List </a>
								</li>
								<li>
									<a href="announcement.php">
										<i class="glyphicon glyphicon-user"></i>
										Make Announcement</a>
								</li>
								<li>
									<a href="determineincome.php">
										<i class="glyphicon glyphicon-user"></i>
										Determine Income</a>
								</li>
								<li>
									<a href="determineexpense.php">
										<i class="glyphicon glyphicon-user"></i>
										Determine Rate/Expense </a>
								</li>

								<li>
									<a href="userlist.php">
										<i class="glyphicon glyphicon-flag"></i>
										Residents </a>
								</li>

								<li>
									<a href="message.php">
										<i class="glyphicon glyphicon-flag"></i>
										Resident Messages </a>
								</li>
							</ul>
						</div>
						<!-- END MENU -->
					</div>
				</div>
				<div class="col-md-9">
					<div class="profile-content">
						<h2>Determine Monthly Rate and Expenses</h2>
						<br>
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
							<form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
																			?>" method="post">

								<table>

									<div class="textbox">
										<tr>
											<td>Expense Name(*):</td>
											<td><input type="text" name="expensename" value="" placeholder="Enter a name for your expense" size="50" required>
												<p style="color:red;display:inline;"></p>
											</td>
										</tr>
									</div>
									<div class="textbox">
										<tr>
											<td>Expense(*):</td>
											<td><input type="int" name="expense" value="" placeholder="Amount of your expense" size="50" required>
												<p style="color:red;display:inline;"></p>
											</td>
										</tr>
									</div>
									<div class="textbox">
										<tr>
											<td>Rate(*):</td>
											<td><input type="int" name="rate" value="" placeholder="Monthly rate on payments" size="50" required>
												<p style="color:red;display:inline;"></p>
											</td>
										</tr>
									</div>
								</table> <br>
								<?php if (isset($_GET['error'])) { ?>
									<p class="error"><?php echo $_GET['error']; ?></p>
								<?php } ?>

								<input class="btn btn-success" type="submit" class="btn btn-primary" name="submit" value="Send"> <br> <br>


							</form>
						</div>
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
</body>
