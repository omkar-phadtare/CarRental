<?php
session_start();

if(!isset($_SESSION['custId']))
{
  //header("location : https://CarRental/Unknown/logOut.php");
  header("Location: login.html");
   exit(); 
}
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
   


   $db = pg_connect( "$host $port $dbname $credentials");
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      //     $sql = "select * from car where car_no=MH14JT5634;";
//     $ret = pg_query($sql);
//     echo"$ret";
// $row = pg_fetch_row($ret);
// echo"$row[1]";
// $cname = $row[1];
// echo"$cname";
$carNo = $_GET['id'];

$sql = "select * from car where car_no='$carNo'";
$ret = pg_query($db, $sql);
$row = pg_fetch_row($ret);
// while($row = pg_fetch_row($ret))
// {

//     if($cno==$row[0])
//     {
//         $ccno = strtolower("$cno");
//         echo $ccno;
//         // $price = $row['price'];
//         // $cname = $row['car_model'];
//         // $image = $row['image'];
    
//     }
// }
//$carNumber = $_GET['carnum'];
// $carImg = $_POST['carimage'];
// $catModel = $_POST['carModel'];
// $carPrice = $_POST['carPrice'];

//$carNumber = $_SESSION["carNumber"];
$carNum = strtolower("$carNo");


$sql1 = "select * from car where car_no = '$carNum'";
$ret1 = pg_query($db, $sql1);
$row1 = pg_fetch_assoc($ret1);

$carType = $row[2];
$priceOfCar = $row[5];
$seat = 0;
$mil = 0;

if(strtolower($carType) == "suv")
{
  if($priceOfCar>5000)
  {
    $seat = 7;
    $mil = 18;
  }
  else{
    $seat = 5;
    $mil = 22;

  }
}
else if(strtolower($carType) == "sedan")
{
  $seat = 5;
  $mil = 22;

}
else if(strtolower($carType) == "sports")
{
  if($priceOfCar>8000)
  {
    $seat = 2;
    $mil = 10;

  }
  else{
    $seat = 4;
    $mil = 12;

  }
}
else if(strtolower($carType) == "hatchback")
{
  $seat = 5;
  $mil = 25;

}
else{
  $seat = 4;
  $mil = 25;
}

// if(isset($_GET['a']) /*you can validate the link here*/){
//    $_SESSION['link']=$_GET['a'];
// }
// $link = $_SESSION['link'];
// echo"$link";
//      $img = $_SESSION['image'];
//      $price = $_SESSION['price'];
     
?>

<html>
    <head> 
        <link rel="stylesheet" href="style.css">
        <title> Booking </title>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    </head>
    <body>
    <script>
            function w3_open() {
              document.getElementById("mySidebar").style.display = "block";
            }
            
            function w3_close() {
              document.getElementById("mySidebar").style.display = "none";
            }
            </script>
        <header id="nav_head">
            <img class="wheel" src="wheel.svg">
            <h2 class="car_logo"><a href="#">BIG WHEELS</a></h2>
           
          <ul class="ul_nav">
              <li><a href="pageHome.html">Home</a></li>
              <li><a href="test.php">Cars</a></li>
              <li><a href="booking.html">YourBooking</a></li>
              <li><a href="Contact.php">Contact</a></li>
              <li><button class="btn-side" class="w3-button w3-right w3-teal w3-xlarge" onclick="w3_open()"><img class="person_logo" src="person.svg"> </button></li>          </ul>
          </ul>
        </header> 
        <div class="w3-sidebar w3-bar-block " style="display:none;width:50%;right:0;position:fixed;" id="mySidebar">
                <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
                <a href="edit_prof.html" class="w3-bar-item w3-button">Edit Profile</a>
                <a href="logOut.php" class="w3-bar-item w3-button">LogOut</a>
              </div> 
        <h2 style="text-align:center;"> Select Car </h2>
        <div style="width: 700px; float: left; border:10px;">
            <img style="height:350px; width:400px;" src="Img/<?php echo $row[6];?>">
        </div>
        <div class="car_details">
            <h2><?php echo $row[1];?></h2><br>   
            <ul style="list-style-type:disc;">
             <li>details:</li>
             <li><?php echo $seat;?> Seater</li>
             <li><?php echo $mil;?>  km/l milage.</li>
             <li>Modern Features</li>
             <li>provided insurance</li>
             <li>Excellent Condition.</li>
             </ul>
             <h2 class="priceC">Rs <?php echo $row[5];?>/day</h2>
             
            </div>
             <form action="booking.php" method="post" >
                
             <input type="hidden" value="<?php echo $row[5]; ?>" name="price"><br>
             <input type="hidden" value="<?php echo $row[0]; ?>" name="carno"><br>
             


<script type="text/javascript">
$(function() {
    $('input[name="daterange"]').daterangepicker();
});
</script>
             <p>Enter number of days</p>
	     
             <input type="text" name="daterange" value="<?php echo date("m/d/Y");?> - 01/31/2022" />
            <br><p>Driver Cost : 500 /day</p><br>
            <input type="checkbox" name="driver"> Need Driver<br>
                <a href="payment.html">
            <input id="ptp" type="submit" value="Proceed to Payment">
            </a>
        </form>
            </body>
</html>
<?php
}
 ?>