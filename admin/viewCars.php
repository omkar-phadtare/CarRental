<html>
<a href="ManageCar.php"><img src="back.png"></a>
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


    $sql = "select * from car;";
    $ret = pg_query($sql);
echo"<html><body>
<style>
table
{
    background-color:#fce6e6;
}
.cell{height:80px;
}
.cc
{
text-align:center;
}
td
{text-align:center;}
</style>";
echo"<div><h1 class=cc>Car Detail</h1><table border=2 align=center><tr><th>CarNo</th><th>CarModel</th><th>CarType</th><th>Insaurance</th><th>Meter Reading</th><th>Price/Day</th></tr>";
while ($row = pg_fetch_row($ret))
 {
  echo "<tr class=cell><td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td><td>$row[3]</td> <td>$row[4]</td><td> $row[5] </td></tr><br><div>";
}
echo"</table></body></html>";
}
            ?>

