<?php
session_start();
?>
<html>
    <head>
        <title>Admin Side</title>
        <link rel="stylesheet" href="admin.css"> 
        <script>
            function w3_open() {
              document.getElementById("mySidebar").style.display = "block";
            }
            
            function w3_close() {
              document.getElementById("mySidebar").style.display = "none";
            }
            </script>
    </head>
    <body>
       
        <div class="header">
            <a class="nav" href="#">Home</a>
            <a class="nav" href="ManageCar.php">Manage Car</a>
            <a class="nav" href="ManageCust.php" onclick="test()">Manage Customer</a>
            <a class="nav" href="ManageDriver.php" name="mangDriver">Manage Driver</a>
            <a style="color:red;" class="nav" href="logOut.php">LogOut</a>
            
            <?php
if(!isset($_SESSION['adminId']))
{
  //header("location : https://CarRental/Unknown/logOut.php");
  header("Location: http://localhost/CarRental/Unknown/login.html");
   exit(); 
}
?>
        </div>

        <h2 class="title-admin">Admin Panel</h2>
        
        <div>
            <form method="POST" action="Report.php">
                <button type="submit" class="car-view" name="car_view">Report</button>
              </form>
            </div>
        <div class="main">
            <a href="ManageCar.php">
            <div class="divs">
                <h3>Manage Car</h3>
            </div>
            </a>
            <a href="ManageCust.php">
            <div class="divs">
                <h3>Manage Customer</h3>
            </div>
            </a>
            <div class="driver-div">
            <a href="ManageDriver.php">
                <div class="divs">
                    <h3>Manage Driver</h3>
                </div>
                </a>
                </div>
                
        </div>
        
    </body>
</html>
