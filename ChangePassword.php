<?php
session_start();

$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = Info";
 $credentials = "user = postgres password= Omkar123";

$FirstPass = $_POST['pass'];
$SecondPass = $_POST['pass2'];

$getEmail = $_SESSION['CheckEmailId'];

$lowEmail = strtolower($getEmail);

$db = pg_connect( "$host $port $dbname $credentials"  );
if(!$db) {
   echo "Error : Unable to open database\n";
} else {

    
    if(isset($FirstPass,$SecondPass))
    {
        if(strcmp($FirstPass,$SecondPass)!==0)
        {
        
        }
        else{
            $sql = "update customer password = $FirstPass where ceamil='$lowEmail'";

        $ret = pg_query($db,$sql);

            echo"<script>  
        if (confirm('Conform For Password Change') == true) {
            window.location.href='login.html';
          } else {
            text = 'Password not Changed';
            window.location.href='login.html';
          }
 </script>";
        
        }
    }
    
}

?>