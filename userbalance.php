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
									<a href="userbalance.php">
										<i class="glyphicon glyphicon-flag"></i>
										Balance </a>
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
                <li>
									<a href="oldmessages.php">
										<i class="glyphicon glyphicon-flag"></i>
										Old Messages </a>
                </li>
                

              </ul>
            </div>
            <!-- END MENU -->
          </div>
        </div>
        <div class="col-md-9">
          <div class="profile-content">
            <h2> Income-Expense Balance </h2>
            <br>
           	
            <div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['', 'Hours per Day'],
  ['Expense', 17400],
  ['Income from Other', 5875],
  ['Income from Rents', 27000],

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Balance Piechart', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

            
          </div>
          
        </div>

      </div>

    </div>

    