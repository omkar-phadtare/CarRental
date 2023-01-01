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
            <a class="nav" href="ManageCar.php">Manage Car</a>
            <a class="nav" href="ManageCust.php">Manage Customer</a>
            <a class="nav" href="#">Manage Driver</a>
            <a style="color:red;" class="nav" href="/CarRental/Unknown//logOut.php">LogOut</a>
        </div>


        <?php
if(!isset($_SESSION['adminId']))
{
  //header("location : https://CarRental/Unknown/logOut.php");
  header("Location: http://localhost/CarRental/Unknown/login.html");
   exit(); 
}
?>
          

<div class="EditCar">
    <div class="form">
        <form class="login-form" method=POST action=admin.php>
            <h3>Add Driver</h3>
          <input type="text" name=Dname placeholder="Driver Name"/>
          <input type="text" name=Dlicence placeholder="Driver Licence"/>
          <input type="text" name=Daddress placeholder="Driver Address"/>
          <input type="text" name=Dsalary placeholder="Driver salary"/>
          <input type="text" name=Dallocation placeholder="Allocation"/>
          <input type=submit value=Add name=mangDriver>
        </form>
      
      </div>
        <div class="form">
            <form class="login-form" method=POST action=admin.php>
              <h3>Delete Driverr</h3>
              <input type="text" name="Dlicence" placeholder="Driver Licence"/>
              <input type=submit value="Delete Driver" name=deleteDriver>
            </form>
          </div>
      </div>



     
      <div class="form">
        <form class="login-form" method="POST" action="admin.php">
          <h3>Enter to Update Driverh3>
          <input type="text" name=Dname placeholder="Driver Name"/>
          <input type="text" name=Dlicence placeholder="Driver Licence [not Null]"/>
          <input type="text" name=Daddress placeholder="Driver Address"/>
          <input type="text" name=Dslaray placeholder="Driver salary"/>
          
          <button type="submit" name="updateDriver">Update</button>

        </form>

    </div>
    <a href="viewDriver.php" ><button>Drivers Detail</button></a>
              </div>
      </div>
    </body>
</html>
