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


<?php     require('../dbcon.php');


$sid = $_GET['sid'];
$sql = "SELECT * FROM student WHERE id='$sid' ";
$run=mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($run);




?>
<a href="admindash.php" align="left" >Back To Dashboard</a>


<form action="updatedata.php" method="post" enctype="multipart/form-data" >
    
    <table border="1" align="center" width="70%" margin-top="40px">
        <tr>
            <th>Roll No</th>
            <td><input type="text" name="rollno" value="<?php echo $data['rollno'];  ?>" required></td>
        </tr>
        <tr>
            <th>full name</th>
            <td><input type="text" name="name" value="<?php echo $data['name'];  ?>" required></td>
        </tr>
        <tr>
            <th>city name</th>
            <td><input type="text" name="city" value="<?php echo $data['city'];  ?>" required></td>
        </tr>
        <tr>
            <th>parents contact number</th>
            <td><input type="text" name="contact" value="<?php echo $data['pcont'];  ?>" required></td>
        </tr>
        <tr>
            <th>standard</th>
            <td><input type="number" name="standard" value="<?php echo $data['standard'];  ?>" required></td>
        </tr>
        <tr>
            <th>image</th>
            <td><input type="file" name="image" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center" >
               
               <input type="hidden" name="sid" value="<?php echo $data['id']; ?>" > 
                <input type="submit" name="submit" value="update">
            </td>
        </tr>
        
        
    </table>

</form>

</body>
</html>