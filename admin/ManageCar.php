<?php
      session_start();

?>
<html>
    <head>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    
        <div class="header">
            <a class="nav" href="adminHome.php">Home</a>
            <a class="nav" href="#">Manage Car</a>
            <a class="nav" href="ManageCust.php">Manage Customer</a>
            <a class="nav" href="ManageDriver.php">Manage Driver</a>
            <a style="color:red;" class="nav" href="/CarRental/Unknown//logOut.php">LogOut</a>
        </div>
        <div class="EditCar">
            <div class="form">
              <form class="login-form" method=POST action=admin.php>
                  <h3>Add Car</h3>

                <input type="file" name=img placeholder="Select File"/>
                <input type="text" name=carNo placeholder="Car Number"/>
                <input type="text" name=carModel placeholder="Car model"/>
                <input type="text" name=carType placeholder="Car Type"/>
                <input type="text" name=Ins placeholder="Insurance ID"/>
                <input type="text" name=Mreading placeholder="Meter reading"/>
                <input type="text" name=price placeholder="Price"/>
                <input type=submit value=Add name=mangCar>
              </form>
            
       <?php

if(!isset($_SESSION['adminId']))
{
  //header("location : https://CarRental/Unknown/logOut.php");
  header("Location: http://localhost/CarRental/Unknown/login.html");
   exit(); 
}
      ?>

            </div>

            <div class="form">
                <form class="login-form" method="POST" action="admin.php">
                  <h3>Delete Car</h3>
                  <input type="text" placeholder="Car Number" name="carNo"/>
                  <button type="submit" name="deleteCar">Delete</button>
                </form>
              </div>

              <div class="form">
                <form class="login-form" method="POST" action="admin.php">
                  <h3>Enter to Update</h3>
                  <input type="text" name=cno placeholder="Car Number [Not Null]"/>
                  <input type="text" name=price placeholder="Price"/>
                  <input type="text" name=ins placeholder="Insurance ID"/>
                  <input type="text" name=meter placeholder="Meter-Reading"/>
                  <button type="submit" name="updateCar">Update</button>

                </form>
              </div>
<a href="viewCars.php" ><button>All Cars</button></a>
          </div>
    </body>
</html>
