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
        <!-- <link rel="stylesheet" href="contact.css"> -->
        <link rel="stylesheet" href="style.css">
        <title> Booking </title>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="contact.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <title>Document</title>
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
              <li><a href="pageHome.php">Home</a></li>
              <li><a href="test.php">Cars</a></li>
              <li><a href="BookedCar.php">YourBooking</a></li>
              <li><a href="Contact.php">Contact</a></li>
              <li><button class="btn-side" class="w3-button w3-right w3-teal w3-xlarge" onclick="w3_open()"><img class="person_logo" src="person.svg"> </button></li>          </ul>
          </ul>
        </header> 
        <div class="w3-sidebar w3-bar-block " style="display:none;width:50%;right:0;position:fixed;" id="mySidebar">
                <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
                <a href="edit_prof.html" class="w3-bar-item w3-button">Edit Profile</a>
                <a href="logOut.php" class="w3-bar-item w3-button">LogOut</a>
              </div> 

        <div class="container">

<section>
  <div class="page-header" id="section-contact">
    <h2>Contact <small>Let's get in touch.</small></h2>
  </div>

  <div class="row">
    <div class="col-lg-4">
      <p>To send us a message, use the feedback form or the information below.</p>

      <address>
            <strong>Big Wheel</strong><br>
           Pune, Maharashtra<br>
            , India<br>
            <abbr title="Phone">P: </abbr> +91 8888088408
                          </address>
    </div>
    <div class="col-lg-8">
      <form id="contactForm" class="form-horizontal" method="post" role="form" action="contactSubmit.php">

        <div class="form-group">
          <label for="contact-name" class="col-lg-2 control-label">Name</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="contact-name" name="contact-name" placeholder="Name" minlength="2" required/>
          </div>
        </div>

        <div class="form-group">
          <label for="contact-email" class="col-lg-2 control-label">Email address</label>
          <div class="col-lg-10">
            <input type="email" class="form-control" id="contact-email" name="contact-email" placeholder="Email address" required/>

          </div>
        </div>

        <div class="form-group">
          <label for="contact-website" class="col-lg-2 control-label">Website</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="contact-website" name="contact-website" placeholder="Website" />
          </div>
        </div>

        <div class="form-group">
          <label for="contact-message" class="col-lg-2 control-label">Message</label>
          <div class="col-lg-10">
            <textarea name="contact-message" id="contact-message" class="form-control" name="contact-message" cols="30" rows="10" placeholder="Message" required/></textarea>
          </div>
        </div>

        <!-- #messages is where the messages are placed inside -->
        <div class="form-group">
          <div class="col-md-9 col-md-offset-3">
            <div id="messages"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          </div>
        </div>

      </form>

    </div>
  </div>
</section>

</div>
</body>

</html>