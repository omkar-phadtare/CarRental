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
    <title>Payment</title>
    <link rel="stylesheet" href="paystyle.css">
    
</head>
<body>

    <a href="test.php"><img src="back.png"></a>
    <h1 class="pay_title">Payment</h1>
    <h3 class="pay_title"><?php
    $total = 0;
    $Uname = " ";
    if(isset($_SESSION['varname']))
    {
    $total = $_SESSION['varname'];
    }
    if(isset($_SESSION['varname']))
    {
    $Uname=$_SESSION['custname'];
    }
    echo"Name : $Uname<br>";
echo"Total : $total<br>";

$setDate = $_SESSION['setdate'];

//$_SESSION['bookdate'] = $newDate1;
//$_SESSION['enddate'] = $newDate2;

echo"Date : $setDate";
//echo"$diff";

 ?></h3>
    <div>
        
    <div class="nav">
        <a href="#section1" class="btn">Card Payment</a>
        <a href="#section2" class="btn">UPI Payment</a>
        <a href="#section3" class="btn">Net Banking</a>
    </div>
    <div class="section" class="card-payment" style="display:none" id="section1">
    <form method=POST action="FinalPay.php">
        <p>Card Number</p>
        <!-- <input class="pay" type="number"  name="card-detail" placeholder="Card Number" required >-->
        <input class="pay" required type="text" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="Enter Card Number">

        <p>Expire Date </p>
        <input class="pay" type="month" placeholder="MM/YY" required>
        <p>CVV Code</p>
         <input class="pay" type="number" placeholder="CVV"  maxlength="4" required> 

        <p>Card Holder Name</p>
        <input class="pay" type="text" placeholder="Name">
        <input class="pay-button" type="submit" name="CardPay" value="Pay" required>
        <!-- <input class="pay-cancel" type="submit" value="Cancel"> -->
</form>
<a class="cancel-href" href="test.php"><button id="myButton" class="pay-cancel" >Cancel</button></a>

    </div>
    <div class="section" class="card-payment" style="display:none" id="section2">
    <form method=POST action="FinalPay.php">
<p>UPI ID</p>
        <input class="pay" type=text name=upi placeholder=eg.abc@okicici required>
<input class="pay-button" type="submit" name="UPI" value="Pay">
</form>
<a class="cancel-href" href="test.php"><button id="myButton" class="pay-cancel" >Cancel</button></a>

    </div>
    <div class="section" class="card-payment" style="display:none" id="section3">
    <form method=POST action="FinalPay.php">
<p>Account Number</p>
<input class="pay" type=text name=ac_no plceholder="Enter Account Number" required>
<p>Re-Enter Account Number
<input class="pay" type=text placeholder="Re-Enter Acccount Number" required>
<p>IFSC Code</p>
<input class="pay" type=text placeholder="IFSC Code" required>
<p>Recipient Name</p>
<input class="pay" type=text placeholder="Recipient Name">
<input class="pay-button" type="submit" name="NetBank" value="Pay">

</form>
<a class="cancel-href" href="test.php"><button id="myButton" class="pay-cancel" >Cancel</button></a>

<!-- <script type="text/javascript">
document. getElementById("myButton"). onclick = function () {
location. href = "test.php";
};
</script> -->

    </div>
</div>
</body>
</html>