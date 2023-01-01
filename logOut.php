<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location: login.html"); //to redirect back to "index.php" after logging out
exit();
  //     if(isset($_SESSION['custId'])){
  //       $_SESSION['oldlink']=$_SESSION['custId'];
  //  }else{
  //       $_SESSION['oldlink']='no previous page';
  //       unset($_SESSION['custId']);  
  //    // session_destroy();  
  //  }
  //  $_SESSION['current']=$_SERVER['PHP_SELF'];
  //  echo $_SESSION['current'];
   //header("Location: login.html");
?>