<?php
if(array_key_exists('car_view', $_POST)) {
    CarView();
}
else if(array_key_exists('car_alloc', $_POST)) {
    CarAlloc();
}

function CarView()
{
    ?>
    <html>
    <a href="ManageCust.php"><img src="back.png"></a>
</html>
<?php
    
     $host        = "host = localhost";
       $port        = "port = 5432";
       $dbname      = "dbname = Info";
       $credentials = "user = postgres password= Omkar123";
    
      //  $carNo1 = $_POST['carNo'];
      //  $carModel1 = $_POST['carModel'];
      //  $carType1 = $_POST['carType'];
      //  $Ins1 = $_POST['Ins'];
      //  $Mreading1= $_POST['Mreading'];
      //  $price1 = $_POST['price'];
       
    
    
       $db = pg_connect( "$host $port $dbname $credentials"  );
       if(!$db) {
          echo "Error : Unable to open database\n";
       } else {
    
    
        $sql = "select * from customer;";
        $ret = pg_query($sql);
    echo"<html><body>
    <style>
body
{
background: linear-gradient(90deg, rgb(191, 255, 219) 0%, rgb(255, 255, 255) 50%);
}
    table
{
    background-color:#eafce6;
}
    .cell{height:80px;
    }
    .cc
    {
    text-align:center;
    color:tile;
    }
    td
    {text-align:center;}
    </style>";
    echo"<div><h1 class=cc>Customer Detail</h1><table border=2 align=center><tr><th>CustomerId</th><th>CustomerName</th><th>CustomerEmail</th><th>Contact</th><th>AdharNo</th><th>LicenceId</th><th>Address</th><th>Gender</th></tr>";
    while ($row = pg_fetch_row($ret))
     {
      echo "<tr class=cell><td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td><td>$row[3]</td> <td>$row[4]</td><td> $row[5] </td><td> $row[6] </td><td> $row[7] </td></tr><br><div>";
    }
    echo"</table></body></html>";
    }
}

function CarAlloc()
{
    ?>
    <html>
    <a href="ManageCust.php"><img src="back.png"></a>
</html>
<?php

    $host        = "host = localhost";
       $port        = "port = 5432";
       $dbname      = "dbname = Info";
       $credentials = "user = postgres password= Omkar123";
    
      //  $carNo1 = $_POST['carNo'];
      //  $carModel1 = $_POST['carModel'];
      //  $carType1 = $_POST['carType'];
      //  $Ins1 = $_POST['Ins'];
      //  $Mreading1= $_POST['Mreading'];
      //  $price1 = $_POST['price'];
       
    
    
       $db = pg_connect( "$host $port $dbname $credentials"  );
       if(!$db) {
          echo "Error : Unable to open database\n";
       } else {
    
    
        $sql = "select * from choose_car;";
        $ret = pg_query($sql);
    echo"<html><body>
    <style>
body
{
background: linear-gradient(90deg, rgb(191, 255, 219) 0%, rgb(255, 255, 255) 50%);
}
table
{
  background-color:#eafce6;
}
    .cell{height:80px;
    }
    .cc
    {
    text-align:center;
    color:tile;
font-family:Serif;
    }
    td
    {text-align:center;}
    </style>";
    echo"<div><h1 class=cc>Customer Detail</h1><table border=2 align=center><tr><th>Car Number</th><th>CustomerId</th><th>BookingID</th><th>BookedDate</th><th>LastDate</th></tr>";
    while ($row = pg_fetch_row($ret))
     {
      echo "<tr class=cell><td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td> <td>$row[4]</td></tr><br><div>";
    }
    echo"</table></body></html>";
    }
}
?>
