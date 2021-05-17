<?php   require('header.php');

session_start();                

 
if(isset($_SESSION['userid'])){
    
    echo "";
}
else {
    
    header('location:../login.php');

}

?>

<h4 align="right" ><a href="logout.php">Logout</a></h4>
<h1 class="admintitle" >Welcome to Admin Dash Board </h1>


<div class="dashboard">
    
    <table border="1" width="50%" align="center">
       <tr >
       <td colspan="2" align="center">Organize students</td>
       </tr>
       <tr>
        <td>1.</td>
        <td><a href="addstudent.php">Insert Students</a></td>
        </tr>
        <tr>
        <td>2.</td>
        <td><a href="updatestudent.php">Update Students</a></td>
        </tr>
        <tr>
        <td>3.</td>
        <td><a href="deletestudent.php">Delete Students</a></td>
        </tr>
        
        
    </table>
    
</div>










    
</body>
</html>