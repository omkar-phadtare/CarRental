<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="admin.css">
    <style>
        .car-view
        {
            margin-left: 36%;
        }
    </style>
</head>
<body>
    <?php
if(!isset($_SESSION['adminId']))
{
  //header("location : https://CarRental/Unknown/logOut.php");
  header("Location: http://localhost/CarRental/Unknown/login.html");
   exit(); 
}
?>
    <div class="header">
        <a class="nav" href="adminHome.php">Home</a>
        <a class="nav" href="ManageCar.php">Manage Car</a>
        <a class="nav" href="#">Manage Customer</a>
        <a class="nav" href="ManageDriver.php">Manage Driver</a>
        <a style="color:red;" class="nav" href="logOut.php">LogOut</a>
    </div>
    <div class="EditCar">
        <div class="form">
            <form class="login-form" method="POST" action="admin.php">
              <h3>Delete Customer</h3>
              <input type="email" placeholder="Enter Customer Email" name="cust_delete"/>
              <input type=submit value="Delete Customer" name=mangCust>
            </form>
          </div>
          <div>
          <form method="POST" action="viewCust.php">
            <button type="submit" class="car-view" name="car_view"> All Customer</button>

            <button type="submit" class="cust-alloc" name="car_alloc">Car Allocated Customer</button>

          </form>
          
      </div>
</body>
</html>
