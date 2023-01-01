<?php
session_start();


if(!isset($_SESSION['custId']))
{
  //header("location : https://CarRental/Unknown/logOut.php");
  header("Location: login.html");
   exit(); 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
              <li><a href="#">Home</a></li>
              <li><a href="test.php">Cars</a></li>
              <li><a href="BookedCar.php">YourBooking</a></li>
              <li><a href="Contact.php">Contact</a></li>
              <li><button class="btn-side" class="w3-button w3-right w3-teal w3-xlarge" onclick="w3_open()"><img class="person_logo" src="person.svg"> </button></li>
              
          </ul>
        </header>
        <div class="w3-sidebar w3-bar-block " style="display:none;width:50%;right:0;position:fixed" id="mySidebar">
            <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
            <a href="edit_prof.html" class="w3-bar-item w3-button">Edit Profile</a>
            <a href="logOut.php" class="w3-bar-item w3-button">LogOut</a>
          </div> 
        <div>
            <div class="home_container">
                <img id="home_img" src="home_car.jpg">
            </div>
            <div class="home_quote">
                <div id="center">
                <h1 class="qt"> BIG WHEELS </h1>
                <h1> "</h1>
                <p class="Quote">Entrusted Cars At Your
                    Door Step.
                </p>
                <h1 class="sym"> "</h1>
                </div>
            </div>
        </div>
        <div class="check_cars">
            <p class="txt">Check </p>
        </div>
        <div>
            <div class="slider">
                <figure>
                   <div class="slide1">
                      <p class="slidetext">SportsCar</p>
                   <img src="Img/Ferrari.jpg" alt="">
                   </div>
                   <div class="slide2">
                      <p class="slidetext">SUV</p>
                   <img src="Img/suvs.jpg" alt="">
                   </div>
                   <div class="slide3">
                      <p class="slidetext">Sedan</p>
                   <img src="Img/sedan.jpg" alt="">
                   </div>
                   <div class="slide2">
                    <p class="slidetext">HatchBack</p>
                 <img src="Img/hatchback.jpg" alt="">
                 </div>
                 <div class="slide3">
                    <p class="slidetext">Economy</p>
                 <img src="Img/polo.jpg" alt="">
                 </div>
                </figure>
              </div>
        </div>
</body>
</html>
