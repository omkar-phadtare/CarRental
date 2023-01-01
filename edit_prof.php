<?php

session_start();

if(isset($_SESSION['custId']))
{
 $host        = "host = localhost";
 $port        = "port = 5432";
 $dbname      = "dbname = Info";
 $credentials = "user = postgres password=Omkar123";

 $cName = $_POST['cName'];
$cEmail = $_POST['cEmail'];
$add = $_POST['address'];
$contact = $_POST['cNo'];

//$UserId = $_SESSION['varname'];

$UserId = $_SESSION['custId'];
echo"$UserId";

 $db = pg_connect( "$host $port $dbname $credentials"  );
 if(!$db) {
    echo "Error : Unable to open database\n";
 } else
  {
    if(isset($cName))
    {
        $sql = "update customer set cname='$cName' where cid = $UserId";
        $ret = pg_query($db,$sql);
    }
    if(isset($cEmail))
    {
        $sql2 = "update customer set cemail='$cEmail' where cid = $UserId";
        $ret2 = pg_query($db,$sql2);
    }
    if(isset($add))
    {
        $sql3 = "update customer set address='$add' where cid = $UserId";
        $ret3 = pg_query($db,$sql3);
    }
    if(isset($contact))
    {
        $sql4 = "update customer set cno='$contact' where cid = $UserId";
        $ret4 = pg_query($db,$sql4);
    }

    echo "<script>  
        alert('Updated');
window.location.href='pageHome.php';
</script>";
    
 }

}
else{
    $user = $_SESSION['custId'];
    echo"$user";
    echo"Not an user";
}
 ?>
<!-- 
<input type="text" name="cName" placeholder="edit name"/>
          <input type="text" name="cEmail" placeholder="edit email"/>
         
          <input type="text" name="address" placeholder="edit address"/>
          
          <input type="text" name="cNo" placeholder="edit Contact no"/> -->