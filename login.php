<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include'logincheck.php';?>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="./css/login.css" />
</head>
<body>

<div class="loginbox">
<h1>LOGIN</h1>
<form method="post" action="logincheck.php">

<div class = "textbox">
Username: <input type="text" name="username" required> <p> </p>
</div>

<div class = "textbox">
Password: <input type="password" name="psw" required>
</div>
 
<input class="btn" type="submit" name="submit" value="Login">

<?php if(isset($_GET['error'])) { ?>
<p class="error"><?php echo$_GET['error']; ?></p>
<?php } ?>
</form>
<p>
Not yet a member? <a href="register.php">Sign up</a>
</p>
</div>

</body>
</html>