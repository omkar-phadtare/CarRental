<?php
session_start();

?>
<html>
<a href="adminHome.php"><img src="back.png"></a>
</html>
<?php
 $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = Info";
   $credentials = "user = postgres password=Omkar123";

  //  $carNo1 = $_POST['carNo'];
  //  $carModel1 = $_POST['carModel'];
  //  $carType1 = $_POST['carType'];
  //  $Ins1 = $_POST['Ins'];
  //  $Mreading1= $_POST['Mreading'];
  //  $price1 = $_POST['price'];
   
$total = 0;
$cnt = 0;

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {


    $sql = "select * from payment;";
    $ret = pg_query($sql);
echo"<html><body>
<style>
body
{
background: linear-gradient(90deg, rgb(180, 180, 180) 0%, rgb(255, 255, 255) 50%);
}
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
h2
{
text-align:center;
}
td
{text-align:center;}
</style>";
echo"<div><h1 class=cc>Report</h1><table border=2 align=center><tr><th>Transaction Id</th><th>BookingID</th><th>Total</th><th>Date</th></tr>";
while ($row = pg_fetch_row($ret))
 {
  echo "<tr class=cell><td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td><td>$row[4]</td> </tr><br><div>";
$total = $total+$row[2];
$cnt++;
}
echo"<h2>Total Car Booked : $cnt</h2>";
echo"<h2>Total : $total</h2>";
echo"</table></body></html>";
}
            ?>

