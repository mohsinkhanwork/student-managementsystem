<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>student management system</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <h4 align="right" style="margin-right:20px;" ><a href="login.php">Admin login</a></h4>

    <h1 align="center" >Welcome to Student Managemenet System</h1>
    <h3 align="center">powered by Mohsin_Khan</h3>
    
    
    <form action="index.php" method="post" >
                     
            
    
    
    <table class="one" align = "center" border="1" >    <!-- its 50% of the secreen   -->
        <tr>  
        <td colspan="2" align="center"> Student information  </td>
        </tr>

        <tr>
            <td class="two" align="right" >Choose Standard</td>    
            <td>
                <select name="std" required >
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
                    <option value="4">4rth</option>
                    <option value="5">5th</option>
                    <option value="6">6th</option>
                    <option value="7">7th</option>
                    <option value="8">8th</option>
                    <option value="9">9th</option>
                    <option value="10">10th</option>
                </select>
            </td>
        </tr>
        
        <tr>
           <td class="three" align="right" > Enter Roll number  </td>
           <td> <input type="number" name="rollno" required > </td>
            
        </tr>
        <tr>
            <td colspan="2" align="center" ><input type="submit" name="submit" value="submit"  ></td>
        </tr>
    </table> 
    </form>
</body>
</html>
<?php   require('dbcon.php');

if(isset($_POST['submit'])){
    
    $standard = $_POST['std'];
    $rollno = $_POST['rollno'];
    

    
    $sql = "SELECT * FROM student WHERE standard='$standard' AND rollno ='$rollno' ";
    
    $res = mysqli_query($con,$sql);
     if(!$res){
        
        die('Query Failed' . mysqli_error($con));
    }
    
        if(mysqli_num_rows($res) > 0){
        $data = mysqli_fetch_assoc($res);
          ?>
        <table border="1" align="center" style="width:50%; margin-top:20px;" >
            <tr>
                <th colspan="3" >Student Details</th>            <!--colspan means the number of columns    -->
            </tr>
            
            
            <tr>
                <td rowspan="5" ><img src="dataimg/<?php echo $data['image']; ?>" style="max-height:130px; max-width=120px; padding-left:70px " /></td>
                <th>Roll No</th>
                <td><?php echo $data['rollno']; ?></td>
            </tr>
            <tr>
                
                <th>Name</th>
                <td><?php echo $data['name']; ?></td>
            </tr>
            <tr>
                <th>Standard</th>
                <td><?php echo $data['standard']; ?></td>
            </tr>
            <tr>
                <th>Parent Contact</th>
                <td><?php echo $data['pcont']; ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $data['city']; ?></td>
            </tr>
            
            
            
        </table>
        
        
        <?php
    } else {
        
        echo "<script>alert('No record found');</script> ";
    }


     
}



?>