<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include 'adminlogincheck.php'; ?>

<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login1.css" />
</head>

<body>

    <div class="loginbox">
        <h1>ADMIN LOGIN</h1>
        <form method="post" action="adminlogincheck.php">

            <div class="textbox">
                Username: <input type="text" name="adminUsername" required>
                <p> </p>
            </div>

            <div class="textbox">
                Password: <input type="password" name="adminPsw" required>
            </div>

            <input class="btn" type="submit" name="submit" value="Login">

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
        </form>
        <p>
            If you are not an admin, <a href="homepage.php">please click</a>
        </p>
    </div>

</body>

</html>
