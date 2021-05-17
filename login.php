<?php   require("dbcon.php");
if(isset($_POST['login'])){
    
$username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = mysqli_query($con,"SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
                                                                                                        //if we have no username and pass in the data base then redirect to the current page  
    
    if(mysqli_num_rows($query) >0 ){
        
        
        $data = mysqli_fetch_assoc($query);
        $id = $data['id'];
        echo "id = ".$id;
        
        session_start();
        $_SESSION['userid'] = $id;
        header('location:admin/admindash.php');
        
  }
    else {
        
        ?>
        <script>
            alert('username and password does not matches !!');
            window.opener('login.php','_self');

       </script>
        
        
        <?php
    }
               
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>
<link rel="stylesheet" href="style.css">                    <!-- when we enter the correct data placed in the data base it should direct us into the
                                                                admin dashboard-->
<body>
   
   <h1 align="center" >Admin login</h1>
   
   <form action="login.php" method="post">
       
       <table align = "center">
           
           <tr>
               <td>Username: </td>
               <td><input type="text" name="username" required placeholder="Enter Username" ></td>
           </tr>
           <tr><td>Password: </td>
           <td><input type="password" name="password" required placeholder="Enter Password " ></td>
           </tr>
           <tr>
               <td><input type="submit" name="login" value="login" ></td>
           </tr>
           
           
       </table>
   </form>
    
</body>
</html>