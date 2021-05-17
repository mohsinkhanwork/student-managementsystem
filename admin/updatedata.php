<?php  require('../dbcon.php');

   $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $standard = $_POST['standard']; 
    $id = $_POST['sid'];
    $imagename = $_FILES['image']['name'];                      //first to use the name of image
    $tempname = $_FILES['image']['tmp_name'];               //temperory name in servers     
    
    //now we need to move the file to our directory
    move_uploaded_file($tempname,"../dataimg/$imagename");
    
    
    
    $query = "UPDATE student SET rollno = '$rollno', name = '$name' , pcont = '$contact', city = '$city', image = '$imagename' WHERE id = $id; "; 
    
    $run = mysqli_query($con,$query);
    if($run == true){
?>
   
   <script>
       alert('data updated');
       window.open('updateform.php?sid=<?php echo $id; ?>' , '_self');


</script>
   
   <?php
    }
   
?>