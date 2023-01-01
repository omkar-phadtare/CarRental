<?php
session_start();

if(isset($_SESSION['custId']))
{
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
              <li><a href="#">YourBooking</a></li>
              <li><a href="Contact.php">Contact</a></li>
              <li><button class="btn-side" class="w3-button w3-right w3-teal w3-xlarge" onclick="w3_open()"><img class="person_logo" src="person.svg"> </button></li>          </ul>
          </ul>
        </header> 
        <div class="w3-sidebar w3-bar-block " style="display:none;width:50%;right:0;position:fixed;" id="mySidebar">
                <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
                <a href="edit_prof.html" class="w3-bar-item w3-button">Edit Profile</a>
                <a href="logOut.php" class="w3-bar-item w3-button">LogOut</a>
              </div> 
<?php
 $host        = "host = localhost";
 $port        = "port = 5432";
 $dbname      = "dbname = Info";
 $credentials = "user = postgres password=Omkar123";

 $db = pg_connect( "$host $port $dbname $credentials"  );

 $cid = $_SESSION['custId'];

 $setDate = $_SESSION['setdate'];




 if(!$db) {
    echo "Error : Unable to open database\n";
 } else {
   
    $sql = "select * from car innner join choose_car on cno=car_no where cid=$cid;";
    $ret = pg_query($db, $sql);

    if(!empty($ret))
    {
        while ($row = pg_fetch_assoc($ret))
        {
          $carNum = $row["car_no"];

?>

<div style="width: 100%; height:350px; overflow: hidden; background-color:#e6e6fc; margin:20px; border-radius: 10px;">

<!-- <a style="color:black;  font-family: 'Lucida Console', 'Courier New', monospace;" href="#"> -->
     <div style="width: 400px; float: left; border:10px;">
     <img style="height:350px; width:400px;" src="Img/<?php echo $row["image"]; ?>">
     </div>
     <div style="margin-left: 620px; margin-top:70px;margin-right:100px; font-size:20px;">
     <div style="width: 500px;  border:10px;">
     <h1><?php echo $row["car_model"]; ?></h1>
    <h4>Price : <?php echo $row["price"]; ?>/day</h4>
    <h5><?php echo $setDate;?></h5>
        </div>
        <div style="margin-bottom:500px; margin-left:100px;">
    <form method="get" action="cancelBooking.php">
        <input type="hidden" value="<?php echo $row['car_no'];?>" name="carNum">
    <button type=submit style="margin-left:500px;;border: none;color:white; background:#ff6347;margin-top:100px;padding-top:20px;padding-bottom:20px;padding-left:30px;padding-right:30px;font: size 30px;"  onclick="">Cancel</button>   
        </form>
        </div>

</div>
<!-- </a>      -->
</div>

<?php

        }
    }

 }
}
else
{
    header("location : login.html");
    exit();
}
?>


</body>
</html>

