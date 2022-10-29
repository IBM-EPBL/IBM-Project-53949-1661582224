<?php
if(isset($_POST['Submit'])){
    $user=$_POST['BankUserName'];
    $email=$_POST['bankemail'];
    $pass=$_POST['Password'];

    if($user=="admin" && $email=="admin@gmail.com" && $pass=="admin"){
        //echo("user name matched");
        header("location:bankview.html");

    }
    else{
        $em="Login failed Invalid username or gmail ID or password"; 
        header("Location:bank login.php?error=$em"); 
        exit;
    }

}
?>