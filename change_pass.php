<?php
session_start();

$host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = Info";
    $credentials = "user = postgres password= Omkar123";
  
$CheckEmail = $_POST['EmailVerify'];

$_SESSION['CheckEmailId'] = $CheckEmail;

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {

	if(isset($CheckEmail))
	{
		$sql = "select * from customer where cemail = '$CheckEmail'";
		$ret = pg_query($db,$sql);
		$check = pg_fetch_row($ret);
		$_SESSION['CheckEmailId'] = $CheckEmail;
	}

   }
if(!$check)
{
	echo "<script>  
	alert('Wrong Email ID Entered');
window.location.href='login.html';
</script>";
}
else{

?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-page">
<div class="form">
<h2>Change Password</h2> 
       <form class="login-form" method="POST" action="ChangePassword.php">
	<input type="text" name="pass" placeholder="Enter Password" require/>
	<input type="text" name="pass2" placeholder="Re-Enter Password" require/>
	<button value="login" type="submit"> Set Password</button>
	</form>
   </div>
</div> 
</body>
</html>
<?php
}
?>