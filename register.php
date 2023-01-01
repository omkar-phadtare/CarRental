<?php

if(array_key_exists('signup', $_POST)) {
    Register();
}
else if(array_key_exists('login', $_POST)) {
    Login();
}
function Register() {
   $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname =  Info";
   $credentials = "user = postgres password=Omkar123";

   $name = $_POST['cName'];
   $email = $_POST['cEmail'];
   $mno = $_POST['cNo'];
   $adhar = $_POST['cAadhar'];
   $licence = $_POST['cLicenceId'];
   $add = $_POST['address'];
   $gender = $_POST['gender'];
   $pass = $_POST['password'];

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
    $search = "select * from customer where cEmail = '$email'";
 //   echo"$search";
    $ret1 = pg_query($db,$search);
    $check = pg_fetch_row($ret1);
//echo"$ret1";
    if(!$check)
    {
    $sql = "insert into customer( cName , cEmail, cNo , cAadhar, cLicenceId  , address , gender  , password) values('$name','$email',$mno,$adhar,'$licence','$add','$gender','$pass');";
    $ret = pg_query($db, $sql);
    header("Location: login.html");
    exit();
   }
   else{
    echo "<script>  
    alert('Email Already Exist !!!');
window.location.href='Signup.html';
</script>";
   }
   }
}
function Login() 
{
    session_start();

    $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname =  Info";
   $credentials = "user = postgres password=Omkar123";

   $cemail = $_POST['cEmail'];
   $cpass = $_POST['password'];

   $db = pg_connect( "$host $port $dbname $credentials"  );
    $sql ="select * from customer where cemail = '$cemail' and password ='$cpass';";
    $data = pg_query($db,$sql); 
    $login_check = pg_num_rows($data);

    $sql1 ="select * from admin where aemail = '$cemail' and apass ='$cpass';";
    $data1 = pg_query($db,$sql1); 
    $admin_log = pg_num_rows($data1);
    if($login_check > 0)
    {    
        echo "Login Successfully"; 

        // $row = mysqli_fetch_array($result);
        // $_SESSION['email'] = $row['email'];
        // $_SESSION['user_id'] = $row['id'];
        // header('location: products.php');

       
        $row = pg_fetch_row($data);
        echo"$row[1]";
        $_SESSION['custId'] = $row[0];
        $_SESSION['custname'] = $row[1];

        header("Location: pageHome.php");
         exit(); 
    }
    else if($admin_log>0)
    {   
        $row1 = pg_fetch_row($data1);
        $_SESSION['adminId']=$row1[0];

        header("Location: admin/adminHome.php");
        exit();
    }
    else
    {
        echo "<script>  
        alert('Wrong Email or Password');
window.location.href='login.html';
</script>";
    }  
}
?>
