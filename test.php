<?php
session_start();

if(!isset($_SESSION['custId']))
{
  //header("location : https://CarRental/Unknown/logOut.php");
  header("Location: login.html");
   exit(); 
}
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <!-- Including our scripting file. -->
   <script type="text/javascript" src="script.js"></script>
   <!-- Including CSS file. -->
   <link rel="stylesheet" type="text/css" href="#">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <script>
            function w3_open() {
              document.getElementById("mySidebar").style.display = "block";
            }
            
            function w3_close() {
              document.getElementById("mySidebar").style.display = "none";
            }
            </script>
    <body style="width:auto; height:auto;">
        <header id="nav_head">
            <img class="wheel" src="wheel.svg">
            <h2 class="car_logo"><a href="#">BIG WHEELS</a></h2>
           
          <ul class="ul_nav">
              <li><a href="pageHome.php">Home</a></li>
              <li><a href="#">Cars</a></li>
              <li><a href="BookedCar.php">YourBooking</a></li>
              <li><a href="Contact.php">Contact</a></li>
              <li><button class="btn-side" class="w3-button w3-right w3-teal w3-xlarge" onclick="w3_open()"><img class="person_logo" src="person.svg"> </button></li>          </ul>
            
        </header> 
        <div class="w3-sidebar w3-bar-block " style="display:none;width:50%;right:0;position:fixed;" id="mySidebar">
                <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
                <a href="edit_prof.html" class="w3-bar-item w3-button">Edit Profile</a>
                <a href="logOut.php" class="w3-bar-item w3-button">LogOut</a>
              </div> 
        <script>
        function myFunctio() {
          var input = document.getElementById("Search");
          var filter = input.value.toLowerCase();
          var nodes = document.getElementsByClassName('cars');
        
          for (i = 0; i < nodes.length; i++) 
          {
            if (nodes[i].innerText.toLowerCase().includes(filter)) {
              nodes[i].style.display = "block";
            } else {
              nodes[i].style.display = "none";
            }
          }
        }
        </script>
<form class="example" action="action_page.php">
  <input type="text" id="Search" placeholder="Search.." name="search" onkeyup="myFunctio()" title="Type in a name">
  <button type="button" onclick="search(document.getElementById('search').value)"><i class="fa fa-search"></i></button>
</form>

<?php
 $host        = "host = localhost";
 $port        = "port = 5432";
 $dbname      = "dbname = Info";
 $credentials = "user = postgres password=Omkar123";

 $db = pg_connect( "$host $port $dbname $credentials"  );
 if(!$db) {
    echo "Error : Unable to open database\n";
 } else {
     
    $sql = "select * from car";
    $ret = pg_query($db, $sql);

    if(!empty($ret))
    {
        while ($row = pg_fetch_assoc($ret))
        {
          $carNum = $row["car_no"];
?>

<!-- <form id="form__submit" method="post" action="test1.php"> -->
    <div style="width: 100%; height:350px; overflow: hidden; background-color:#e6e6fc; margin:20px; border-radius: 10px;" class="cars">
<a style="color:black;  font-family: 'Lucida Console', 'Courier New', monospace;" href="test1.php?id=<?php echo $carNum; ?>">
     <div style="width: 700px; float: left; border:10px;">
     <img style="height:350px; width:400px;" src="Img/<?php echo $row["image"]; ?>">
     </div>
     <div style="margin-left: 620px; margin-top:80px; font-size:20px;">
     <h1><?php echo $row["car_model"]; ?></h1>
     <p style="display:none;">Ferrari</p>
    <h4>price : <?php echo $row["price"]; ?>/day</h4>
    </div>
        </a>
       
</div>


      <!-- </form>
      <script>
       function submitForm() {
           let form = document.getElementById("form__submit");
           form.submit();
       }
   </script>
       -->
<?php

        }
    }
    
 }
?>



<!-- <div id="landrover" class="cars">
	
    <a href="landrover.html">
        <div class="landrover">
        
        </div>
    
        <div class="discription">
           <h1>Land Rover</h1>
           <h4>price : 5000/day</h4>
        </div>
    </a>


</div> -->
</body>
</html>

