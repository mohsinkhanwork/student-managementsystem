<?php   require('header.php');
        require('titlehead.php');

session_start();

 
if(isset($_SESSION['userid'])){
    
    echo "";
}
else {
    
    header('location:../login.php');

}

?>
<a href="admindash.php" align="left" >Back To Dashboard</a>
<form action="addstudent.php" method="post" enctype="multipart/form-data" >
    
    <table border="1" align="center" width="70%" margin-top="40px">
        <tr>
            <th>Roll No</th>
            <td><input type="text" name="rollno" placeholder="enter your roll number" required></td>
        </tr>
        <tr>
            <th>full name</th>
            <td><input type="text" name="name" placeholder="enter your name" required></td>
        </tr>
        <tr>
            <th>city name</th>
            <td><input type="text" name="city" placeholder="enter your city" required></td>
        </tr>
        <tr>
            <th>parents contact number</th>
            <td><input type="number" name="contact" placeholder="enter your contact number" required></td>
        </tr>
        <tr>
            <th>standard</th>
            <td><input type="number" name="standard" placeholder="enter your standard" required></td>
        </tr>
        <tr>
            <th>image</th>
            <td><input type="file" name="image" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center" >
                <input type="submit" name="submit" value="submit">
            </td>
        </tr>
        
        
    </table>

</form>

</body>
</html>

<?php require('../dbcon.php');

if(isset($_POST['submit'])){
    
    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $standard = $_POST['standard']; 
    $imagename = $_FILES['image']['name'];                      //first to use the name of image
    $tempname = $_FILES['image']['tmp_name'];               //temperory name in servers     
    
    //now we need to move the file to our directory
    move_uploaded_file($tempname,"../dataimg/$imagename");
    
    
    
    $query = "INSERT INTO `student`(`rollno`, `name`, `pcont`, `city`, `standard`,`image`) VALUES ('$rollno','$name','$city','$contact','$standard','$imagename')";
    
    $run = mysqli_query($con,$query);
    if($run == true){
        
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Data Succesfully Updated');
    window.location.href='addstudent.php';
    </script>");
    }
   
    
    
    
    
    
}



?>
