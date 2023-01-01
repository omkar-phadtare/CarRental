<?php
session_start();

$host        = "host = localhost";
 $port        = "port = 5432";
 $dbname      = "dbname = Info";
 $credentials = "user = postgres password=Omkar123";

 $cid = $_SESSION['custId'];
 $carNum = $_GET['carNum'];

 $db = pg_connect( "$host $port $dbname $credentials"  );

 $sql = "delete from booking where car_no='$carNum' and cid=$cid"; 

 $ret = pg_query($db,$sql);

 if(!$ret)
 {

    echo"No Car";
 }
 {
 echo"<script>  
        if (confirm('You want to Cancel') == true) {
            window.location.href='BookedCar.php';
          } else {
            text = 'Not Cancel';
            window.location.href='BookedCar.php';
          }
 </script>";
}
?>