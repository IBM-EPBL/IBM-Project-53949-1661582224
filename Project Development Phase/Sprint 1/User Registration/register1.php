<?php

$name = $_POST['name'];
$email  = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$mon = $_POST['mon'];




if (!empty($name) || !empty($email) || !empty($username) || !empty($password) || !empty($mon) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "loan";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From register Where email = ? Limit 1";
  $INSERT = "INSERT Into register (name , email , username , password, mon )values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssi", $name,$email,$username,$password,$mon);
      $stmt->execute();

      $em="Successfully Registered ! Now you can login"; 
      header("Location:register.php?success=$em"); 
     } 
     else {
      $em="Some one had already registered with this email ID or username"; 
      header("Location:register.php?error=$em"); 
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>


