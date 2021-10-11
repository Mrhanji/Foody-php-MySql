<!DOCTYPE html>
<?php 
include '../include/config.php';
session_start();
if(!isset($_SESSION['uname'])){
   header("Location : login.php");
}
    
$my=mysqli_query($conn,"SELECT *FROM admin WHERE id=1");
if(mysqli_num_rows($my)>0){
    while($d=mysqli_fetch_assoc($my)){
        $username=$d['username'];
        $upass=$d['pass'];
      
    }
}
?>
<html>
<title>Admin Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">
<?php include 'sidebar.php';?>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-gear"></i> Setting</b></h5>
    
  </header>


  
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

#divs {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
  
  
  

<div id="divs">
   <form class="form-horizontal" action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      
    <label for="fname">Admin Name</label>
    <input type="text" id="fname" name="name" value="<?php echo $username;?>" placeholder="Ex: Panda">
    
       <label for="fname">Password</label>
    <input type="text" id="fname" name="pass" value="<?php echo base64_decode($upass);?>" placeholder="Ex: DJckjf32">
    
    <br>
    
    
  
    

    
<br>

  
    <input type="submit" name="submit" value="Submit">
  </form>
</div>
<?php
include 'config.php';
if(isset($_POST['submit'])){
    $admin=mysqli_real_escape_string($conn,$_POST['name']);
     $pass=base64_encode(mysqli_real_escape_string($conn,$_POST['pass']));
      
    $id=1;
    if(mysqli_query($conn,"UPDATE admin SET username='{$admin}',pass='{$pass}' WHERE id='{$id}' ")==1){
       
       echo '<script>window.location.replace("logout.php"); </script>';
    }else{
        echo "<script>alert('Something Went Wrong Please Contact Support')</script>";
    }
    
}

?>



  <!-- Footer -->
<?php 
include 'footer.php';

?>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
