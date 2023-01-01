<?php
session_start();
    $host        = "host = localhost";
    $port        = "port = 5432";
    $dbname      = "dbname = Info";
    $credentials = "user = postgres password=Omkar123";

    $db = pg_connect( "$host $port $dbname $credentials");

    //(11,1,'MH14JT5634',5,'Y');

//Date Get

$date = $_POST['daterange'];
echo"$date\n";
echo gettype($date);

$array = explode("-",$date);
//$explod = explode("/",$datastr);

$d1 = $array[0];
$d2 = $array[1];

echo"$d1";
$orgDate = "$d1";  
    $newDate1 = date("Y-m-d", strtotime($orgDate));  
    //echo "New date format is: ".$newDate. " (YYYY-MM-DD)"; 
 
echo"$d2";
$orgDate = "$d2";  
    $newDate2 = date("Y-m-d", strtotime($orgDate));  
    //echo "New date format is: ".$newDate. " (YYYY-MM-DD)"; 

$_SESSION['bookdate'] = $newDate1;
$_SESSION['enddate'] = $newDate2;

$diff = abs(strtotime($newDate1) - strtotime($newDate2));

$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

echo "DateDiff".$days;

$_SESSION['setdate'] = $date;

    $first = 1;
    $cid = $_SESSION['custId'];
    echo"$cid";
    $carNo = $_POST['carno'];

    $last = substr("$carNo", -2);
    //$sql = "select cemail from customer where ";
    $bid = $first.$cid.$last;
    echo"$bid";
    $price = $_POST['price'];
    
    $dur = $days;

    //$_SESSION['cid'] = $cid;
    $_SESSION['carNo'] = $carNo;
    $_SESSION['bid'] = $bid;
    $_SESSION['price'] = $price;
    $_SESSION['dur'] = $dur;
    
    $_SESSION['driv'] = $_POST['driver'];
    
    if ( isset($_POST['driver']) ) {
        $driv = 'Y';
	$p=500;
    } else {
        $driv = 'N'; 
	$p=0;
    }
    
$total = ($price +$p)*$dur;
    if(!$db) {
       echo "Error : Unable to open database\n";
    } else {
    //  $sql = "select * from customer where cid = $cid";
    //  $ret = pg_query($sql);

    //  $row = pg_fetch_row($ret);

    //  $cname = $row[1];

    //  $_SESSION['custname'] = $name;

     $_SESSION['varname'] = $total;

      header("Location: payment.php");
       exit(); 


    }

?>