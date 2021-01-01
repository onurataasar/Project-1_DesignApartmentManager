
<?php
include "check.php";


if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['psw'])) {
        header("Location:login.php");

}
    else{
        $uname= $_POST['username'];
        $pass = $_POST['psw'];

        $db=mysqli_select_db($conn,"users");
        $query =mysqli_query($conn,"SELECT * FROM users WHERE psw='$pass' AND username='$uname'");

        $rows = mysqli_num_rows($query);
        if($rows == 1){
            header("Location: homepage.php");
            exit();
        }
        
        else{
            header("Location:login.php?error=Wrong Credentials");
            exit();
        }
        
        

        mysqli_close($conn);
    }
}
?>
