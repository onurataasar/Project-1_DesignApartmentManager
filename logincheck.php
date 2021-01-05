
<?php
include "check.php";

@session_start();

if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['psw'])) {
        header("Location:login.php");

}
    else{
        $uname= $_POST['username'];
        $pass = $_POST['psw'];

        $db=mysqli_select_db($conn,"users");
        $query =mysqli_query($conn,"SELECT * FROM users WHERE psw= MD5('$pass') AND username='$uname'");

        $rows = mysqli_num_rows($query);
        if($rows == 1){
            // Storing username in session variable 
            $_SESSION['username'] = $uname; 
              
            // Welcome message 
            $_SESSION['success'] = "You have logged in!"; 
              
            // Page on which the user is sent 
            // to after logging in 
            header('location: user.php'); 
        }
        
        else{
            header("Location:login.php?error=Wrong Credentials");
            exit();
        }
        
        

        mysqli_close($conn);
    }
}
?>
