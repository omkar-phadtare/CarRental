<?php
if(array_key_exists('CardPay', $_POST)) {
    CardPay();
}
else if(array_key_exists('UPI', $_POST)) {
    UPI();
}
else if(array_key_exists('NetBank', $_POST)) {
    NetBank();
}
function CardPay()
{
session_start();
    $host        = "host = localhost";
    $port        = "port = 5432";
    $dbname      = "dbname = Info";
    $credentials = "user = postgres password=Omkar123";

    $db = pg_connect( "$host $port $dbname $credentials");

    //(11,1,'MH14JT5634',5,'Y');
    
    $cid = $_SESSION['custId'];
    $carNo = $_SESSION['carNo'];
    $bid = $_SESSION['bid'];
    $price = $_SESSION['price'];
    $dur = $_SESSION['dur'];
    $driv = $_SESSION['driv'];


    $firstDate = $_SESSION['bookdate'];
    $lastDate = $_SESSION['enddate'];

    if ( isset($_POST['driver']) ) {
        $driv = 'Y';
	$p=500;
    } else {
        $driv = 'N'; 
	$p=0;
    }
    if(!$db) {
       echo "Error : Unable to open database\n";
    } else {

     $sql = "insert into booking values($bid,$cid,'$carNo',$dur,'$driv');";
     echo"Inserted";
     $ret = pg_query($db, $sql);

     
     if(!$ret)
     {
        echo "<script>  
        alert('Car is Already Own By You');
window.location.href='test.php';
</script>";

    //    header("Location: payment.php");
    //    exit(); 
echo"$carNo $cid $bid";
     }
     else{
        
       
        $sql1 = "insert into choose_car values('$carNo',$cid,$bid,'$firstDate','$lastDate');";
        $ret1 = pg_query($db, $sql1);

echo"<script>  
        if (confirm('Conform For Payment') == true) {
            ";
            echo"
            window.location.href='Done.php';
          } else {
            text = 'Payment Cancel';
            window.location.href='payment.php';
          }
 </script>";
 
 
 

echo"$carNo $cid $bid";
     }

    }

}
function UPI()
{

session_start();
    $host        = "host = localhost";
    $port        = "port = 5432";
    $dbname      = "dbname = Info";
    $credentials = "user = postgres password=Omkar123";

    $db = pg_connect( "$host $port $dbname $credentials");

    //(11,1,'MH14JT5634',5,'Y');
    
    $cid = $_SESSION['custId'];
    $carNo = $_SESSION['carNo'];
    $bid = $_SESSION['bid'];
    $price = $_SESSION['price'];
    $dur = $_SESSION['dur'];
    $driv = $_SESSION['driv'];


    if ( isset($_POST['driver']) ) {
        $driv = 'Y';
	$p=500;
    } else {
        $driv = 'N'; 
	$p=0;
    }
    if(!$db) {
       echo "Error : Unable to open database\n";
    } else {

     $sql = "insert into booking values($bid,$cid,'$carNo',$dur,'$driv');";
     $ret = pg_query($db, $sql);

     $sql1 = "insert into choose_car values('$carNo',$cid,$bid,'$firstDate','$lastDate');";
     $ret1 = pg_query($db, $sql1);

     if(!$ret)
     {
        echo "<script>  
        alert('Car is Already Own By You');
window.location.href='test.php';
</script>";

    //    header("Location: payment.php");
    //    exit(); 

echo"$carNo $cid $bid";
     }
     else{
       
echo"<script>  
        if (confirm('Conform For Payment') == true) {
            window.location.href='Done.php';
          } else {
            text = 'Payment Cancel';
            window.location.href='payment.php';
          }

</script>";
echo"$carNo $cid $bid";
     }

    }

}
function NetBank()
{

session_start();
    $host        = "host = localhost";
    $port        = "port = 5432";
    $dbname      = "dbname = Info";
    $credentials = "user = postgres password=Omkar123";

    $db = pg_connect( "$host $port $dbname $credentials");

    //(11,1,'MH14JT5634',5,'Y');
    
    $cid = $_SESSION['custId'];
    $carNo = $_SESSION['carNo'];
    $bid = $_SESSION['bid'];
    $price = $_SESSION['price'];
    $dur = $_SESSION['dur'];
    $driv = $_SESSION['driv'];


    if ( isset($_POST['driver']) ) {
        $driv = 'Y';
	$p=500;
    } else {
        $driv = 'N'; 
	$p=0;
    }
    if(!$db) {
       echo "Error : Unable to open database\n";
    } else {

     $sql = "insert into booking values($bid,$cid,'$carNo',$dur,'$driv');";
     $ret = pg_query($db, $sql);

     $sql1 = "insert into choose_car values('$carNo',$cid,$bid,'$firstDate','$lastDate');";
     $ret1 = pg_query($db, $sql1);

     if(!$ret)
     {
        echo "<script>  
        alert('Car is Already Own By You');
window.location.href='test.php';
</script>";

    //    header("Location: payment.php");
    //    exit(); 

echo"$carNo $cid $bid";
     }
     else{
       
echo"<script>  
        if (confirm('Conform For Payment') == true) {
            window.location.href='Done.php';
          } else {
            text = 'Payment Cancel';
            window.location.href='payment.php';
          }

</script>";
echo"$carNo $cid $bid";
     }

    }

}
?>
