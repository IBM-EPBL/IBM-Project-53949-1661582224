<?php      
    
   
    include('db.php');  
    $username = $_POST['username'];  
    $password = $_POST['password'];
    $email=$_POST['username'];
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);   
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);

      
        $sql = "select *from register where username = '$username' or  email = '$email' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 
        
        
        if($count == 1){  
           //echo "<h1><center> Login successful </center></h1>";  
           // header("location:prediction.html");
            header("Location:prediction.html"); 
            exit;
        }  
        else{  
            $em="Login failed Invalid username or gmail ID or password"; 
            header("Location:login.php?error=$em"); 
            exit;
        }     
?>  