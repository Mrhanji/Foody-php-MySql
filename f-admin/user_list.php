<!DOCTYPE html>
<?php 
include '../include/config.php';
session_start();
if(!isset($_SESSION['uname'])){
   header("Location : login.php");
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
    <h5><b><i class="fa fa-dashboard"></i>User List</b></h5>
    
  </header>
  
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

#divs {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  overflow-x:auto;
}
</style>
  
  
  

<div id="divs">
  
  <table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
   
      <th>Action</th>
  </tr>
 <?php 
   $data=mysqli_query($conn,"SELECT name,phone,email,user_id FROM userlist ");
    if(mysqli_num_rows($data)>0){
        while($panda=mysqli_fetch_assoc($data)){
            
    
 
 ?>
  <tr>
   
    <td><a href="view_user.php?hash=<?php echo $panda['user_id'];?>"><?php echo $panda['name']; ?></a></td>
    <td><?php echo $panda['name']; ?></td>
     <td><?php echo $panda['phone'];?></td>
      <td><?php echo $panda['email'];?></td>
    <td><a href="delete_user.php?hash=<?php echo base64_encode($panda['user_id']); ?>"> Delete </a></td>
  </tr>
<?php 
    }
    }else{
       echo ' <tr>
    <td>No Item</td>
   <td>No Item</td>
    <td>No Item</td>
     <td>No Item</td>
      <td>No Item</td>
       <td>No Item</td>
  </tr>';
    }
?>
 
</table>

</div>



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