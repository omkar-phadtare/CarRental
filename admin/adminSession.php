<?php
if(!isset($_SESSION['adminId']))
{
    header("location : //localhost/CarRental/CarRental/Unknown/login.html");
    exit();
}
if(array_key_exists('mangCust', $_POST))
{
    
    header("location : ManageCust.php");
    exit();
}
?>