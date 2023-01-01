<?php


if(array_key_exists('mangCar', $_POST)) {
    ManageCar();
}
else if(array_key_exists('mangCust', $_POST)) {
    ManageCustomer();
}
else if(array_key_exists('mangDriver', $_POST))
{
   ManageDriver();
}
else if(array_key_exists('deleteCar', $_POST))
{
   DeleteCar();
}
else if(array_key_exists('updateCar', $_POST))
{
  UpdateCar();
}
else if(array_key_exists('updateDriver', $_POST))
{
  UpdateDriver();
}
else if(array_key_exists('deleteDriver', $_POST))
{
  DeleteDriver();
}
function ManageCar() {
   $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = Info";
   $credentials = "user = postgres password=Omkar123";

   $carImg = $_POST['img'];
   $carNo = $_POST['carNo'];
   $carModel = $_POST['carModel'];
   $carType = $_POST['carType'];
   $Ins = $_POST['Ins'];
   $Mreading= $_POST['Mreading'];
   $price = $_POST['price'];
   

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {


    $sql = "insert into car values('$carNo','$carModel','$carType','$Ins',$Mreading,$price,'$carImg');";
    $ret = pg_query($db, $sql);
    
    if(!$ret)
    {
        echo "<script>  
        alert('Car not added try correct Input');
window.location.href='ManageCar.php';
</script>";

//header("Location: admin.html");
       
    }
    else{
        echo "<script>  
        alert('Car  added');
window.location.href='ManageCar.php';
</script>";
}
    }
   }


function ManageCustomer() {


    $host        = "host = localhost";
    $port        = "port = 5432";
    $dbname      = "dbname = Info";
    $credentials = "user = postgres password=Omkar123";
 
    $db = pg_connect( "$host $port $dbname $credentials"  );
 
     $cust_mail = $_POST['cust_delete'];
     $db = pg_connect( "$host $port $dbname $credentials"  );
    if(!$db) {
       echo "Error : Unable to open database\n";
    } else {
 
 
     $sql = "delete from customer where cemail = '$cust_mail'";
     $ret = pg_query($db, $sql);
 
     if(!$ret)
     {
         echo "<script>  
         alert('Customer $cust_mail is not Available Try Again');
 window.location.href='ManageCust.php';
 </script>";
     }
     else{
         echo "<script>  
         alert('Customer $cust_mail is Deleted');
 window.location.href='ManageCust.php';
 </script>";
     }
    }
    
}



function ManageDriver()
{
    $host        = "host = localhost";
    $port        = "port = 5432";
    $dbname      = "dbname = Info";
    $credentials = "user = postgres password=Omkar123";
 
    $Dname = $_POST['Dname'];
    $Dlicence = $_POST['Dlicence'];
    $Dsalary = $_POST['Dsalary'];
    $Dallocation = $_POST['Dallocation'];
    $Daddress = $_POST['Daddress'];
    

    // <input type="text" name=Dname placeholder="Driver Name"/>
    //       <input type="text" name=Dlicence placeholder="Driver Licence"/>
    //       <input type="text" name=Daddress placeholder="Driver Address"/>
    //       <input type="text" name=Dsalary placeholder="Driver salary"/>
    //       <input type="text" name=Dallocation placeholder="Allocation"/>
    
 
    $db = pg_connect( "$host $port $dbname $credentials"  );
    if(!$db) {
       echo "Error : Unable to open database\n";
    } else {
 
     $sql = "insert into driver(dname,dlicenceid,daddress,salary,alloc) values('$Dname','$Dlicence','$Daddress',$Dsalary,'$Dallocation');";
     $ret = pg_query($db, $sql);
     
     if(!$ret)
     {
         echo "<script>  
         alert('Driver not added try correct Input');
 window.location.href='ManageDriver.php';
 </script>";
 
 //header("Location: admin.html");
        
     }
     else{
         echo "<script>  
         alert('Driver  added');
 window.location.href='ManageDriver.php';
 </script>";
 }
     }
}

function DeleteCar()
{
    $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = Info";
   $credentials = "user = postgres password=Omkar123";

   $db = pg_connect( "$host $port $dbname $credentials"  );

    $carno = $_POST['carNo'];
    $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {


    $sql = "delete from car where car_no = '$carno'";
    $ret = pg_query($db, $sql);

    if(!$ret)
    {
        echo "<script>  
        alert('Car $carno is not Available Try Again');
window.location.href='ManageCar.php';
</script>";
    }
    else{
        echo "<script>  
        alert('Car $carno is Deleted');
window.location.href='ManageCar.php';
</script>";
    }
   }
}

function UpdateCar()
{
    $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = Info";
   $credentials = "user = postgres password=Omkar123";

   $db = pg_connect( "$host $port $dbname $credentials"  );
    $cno = $_POST['cno'];
    $cprice = $_POST['price'];
    $cins = $_POST['ins'];
    $cmeter = $_POST['meter'];
    
    $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {

    if(isset($price))
    {
    $sql = "update car set price = $cprice where car_no = '$cno'";
    $ret = pg_query($db, $sql);
    }

    if(isset($cins))
    {
    $sql = "update car set insurance_id = '$cins' where car_no = '$cno'";
    $ret = pg_query($db, $sql);
    }

    if(isset($cmeter))
    {
    $sql = "update car set meter_reading  = $cmeter where car_no = '$cno'";
    $ret = pg_query($db, $sql);
    }




    if(!$ret)
    {
        echo "<script>  
        alert('Car $cno is not Available Try Again');
window.location.href='ManageCar.php';
</script>";
    }
    else{
        echo "<script>  
        alert('Car $cno  Updated');
window.location.href='ManageCar.php';
</script>";
    }
   }
}

function UpdateDriver()
{
    $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = Info";
   $credentials = "user = postgres password=Omkar123";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   $Dname = $_POST['Dname'];
   $Dlicence = $_POST['Dlicence'];
   $Dsalary = $_POST['Dsalary'];
   $Daddress = $_POST['Daddress']; 

    $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {

    if(isset($Dname))
    {
    $sql = "update driver set dname = '$Dname' where dlicenceid = '$Dlicence'";
    $ret = pg_query($db, $sql);
    }

    if(isset($Daddress))
    {
    $sql = "update driver set daddress = '$Daddress' where dlicenceid = '$Dlicence'";
    $ret = pg_query($db, $sql);
    }

    if(isset($Dsalary))
    {
    $sql = "update driver set dsalary = $Dsalary where dlicenceid = '$Dlicence'";
    $ret = pg_query($db, $sql);
    }


    if(!$ret)
    {
        echo "<script>  
        alert('Driver $carno is not Available Try Again');
window.location.href='ManageDriver.php';
</script>";
    }
    else{
        echo "<script>  
        alert('Driver $carno  Updated');
window.location.href='ManageDriver.php';
</script>";
    }
   }


}

function DeleteDriver()
{

    $host        = "host = localhost";
    $port        = "port = 5432";
    $dbname      = "dbname = Info";
    $credentials = "user = postgres password=Omkar123";
 
    $db = pg_connect( "$host $port $dbname $credentials"  );
 
    $Dlicence = $_POST['Dlicence'];

     $db = pg_connect( "$host $port $dbname $credentials"  );
    if(!$db) {
       echo "Error : Unable to open database\n";
    } else {
 
 
     $sql = "delete from driver where dlicenceid = '$Dlicence'";
     $ret = pg_query($db, $sql);
 
     if(!$ret)
     {
         echo "<script>  
         alert('Driver $carno is not Available Try Again');
 window.location.href='ManageDriver.php';
 </script>";
     }
     else{
         echo "<script>  
         alert('Driver $carno is Deleted');
 window.location.href='ManageDriver.php';
 </script>";
     }
    }

}
?>
