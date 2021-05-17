<?php require('header.php');
        require('titlehead.php');
        require('../dbcon.php');

session_start();

 
if(isset($_SESSION['userid'])){
    
    echo "";
}
else {
    
    header('location:../login.php');

}
?>

<a href="admindash.php" align="left" >Back To Dashboard</a>



<table align="center" width="70%" margin-top="40px">
<form action="deletestudent.php" method="post" enctype="multipart/form-data">
    
    <tr>
        <th>Enter standard</th>
        <td><input type="number" name="standard" placeholder="Enter standard" ></td>
    </tr>
    <tr>
        <th>Enter Name</th>
        <td><input type="text" name="name" placeholder="Enter name" ></td>
    </tr>
    <tr> 
        <td colspan="2" align="center" ><input type="submit" name="submit" value="search" ></td>    <!--value means the name on the button -->
    </tr>
       
</form>
</table>
<br>
<table align="center" width="80%" border="1" >
    <tr style="background-color: gray;" >
        <th>No</th>
        <th>image</th>
        <th>name</th>
        <th>RollNo</th>
        <th>Edit</th>
        
    </tr>


<?php
    

if(isset($_POST['submit'])){

    require('../dbcon.php');
    
    $standard = $_POST['standard'];
    $name = $_POST['name'];
    
    $query = "SELECT * FROM student WHERE standard = '$standard' AND name = '$name' ";        //% means that he gets the right surname as                                                                                                         well
    
    $result = mysqli_query($con,$query);
    if($result = mysqli_query($con, $query)){
    if(mysqli_num_rows($result) > 0){
    
        $count=0;
        while($data = mysqli_fetch_assoc($result)){
                    $count++;

?>
            
             <tr>
                    <td><?php echo $count; ?></td>
                    <td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width:100px" /></td>          <!-- taking image from the data base -->
                    <td><?php echo $data['name']; ?></td> 
                    <td><?php echo $data['rollno']; ?></td>
                    <td><a href="deleteform.php?sid=<?php echo $data['id']; ?> ">Delete</a></td>   <!-- creating the id of edit -->
        
    </tr>
    
            
            
            <?php
        }
        
    }
    
    
}
}
    

?>
</table>


















