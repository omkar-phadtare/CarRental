<?php
session_start();
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = Info";
$credentials = "user = postgres password=Omkar123";

//  $carNo1 = $_POST['carNo'];
//  $carModel1 = $_POST['carModel'];
//  $carType1 = $_POST['carType'];
//  $Ins1 = $_POST['Ins'];
//  $Mreading1= $_POST['Mreading'];
$tot=0;
$bid=0;
if(isset($_SESSION['varname']))
{
  $tot = $_SESSION['varname'];
}
if(isset($_SESSION['bid']))
{ 
 $bid = $_SESSION['bid'];
}
$tid = uniqid();
$date = date('20y-m-d');
$dep = 5000;

$db = pg_connect( "$host $port $dbname $credentials");

if(!$db) {
   echo "Error : Unable to open database\n";
} else {

    $sql = "insert into payment values('$tid',$bid,$tot,$dep,'$date')";
    $ret = pg_query($db,$sql);
if(!$ret)
{
echo" Not Inserted";
}
else
{
?>
<html>
<body>
<style>
h1
{
text-align:center;
}
p
{
text-align:center;
}
</style>
<h1>Car Is Booked </h1>
<p>It Will Deliverd at You Address Shortly</p>
</body>
</html>
<?php
$carno = $_SESSION['carNo'];

$cid = $_SESSION['custId'];

$sql2 = "select * from customer where cid=$cid";
$ret2 = pg_query($sql2);
$row2 = pg_fetch_row($ret2);
$cname = $row2[1];


$sql1 = "select * from car where car_no='$carno'";
$ret1 = pg_query($sql1);
$row1 = pg_fetch_row($ret1);
$carName = $row1[1];

$bid = $_SESSION['bid'];

$sql = "select * from payment where bid=$bid;";
$ret = pg_query($sql);
$row = pg_fetch_row($ret);


echo"<html><body>
<style>
tr { 
display: block; 
float: left; 
}
th, td { display: block; }
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
echo"<div><h1 class=cc>Payment Detail </h1><table border=2 align=center><tr><th>User name</th><th>Car Name</th><th>Transaction Id</th><th>Total</th></tr>";
  echo "<tr class=cell><td>$row2[1]</td> <td>$row1[1]</td> <td>$row[0]</td><td>$row[2]</td></tr><br><div>";

echo"</table></body></html>";
header( "refresh:5;url=pageHome.php" );
}
}
?>



