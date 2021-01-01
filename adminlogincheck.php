<?php
include "check.php";


if(isset($_POST['submit'])){
    if(empty($_POST['adminUsername']) || empty($_POST['adminPsw'])) {
        header("Location:adminlogin.php");

}
    else{
        $uname= $_POST['adminUsername'];
        $pass = $_POST['adminPsw'];

        $db=mysqli_select_db($conn,"users");
        $query =mysqli_query($conn,"SELECT * FROM admins WHERE adminPsw='$pass' AND adminUsername='$uname'");

        $rows = mysqli_num_rows($query);
        if($rows == 1){
            header("Location: admin.php");
            exit();
        }
        
        else{
            header("Location:adminlogin.php?error=Wrong Credentials");
            exit();
        }
        
        

        mysqli_close($conn);
    }
}
?>
