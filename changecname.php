<?php
if(isset($_POST["submit"])){
$con=mysqli_connect('127.0.0.1','root','');
if(!$con){
echo 'not connected to database';
}
if(!mysqli_select_db($con,'tariff'))
{
echo 'database not seleted';
}
else{
 //$query = mysqli_query($con,"UPDATE customer SET cname=REPLACE(cname,'$_POST[cname]','$_POST[nname]')");
 $nname=$_POST['nname'];
 $cname=$_POST['cname'];

 $query = mysqli_query($con,"UPDATE customer SET cname='$nname' WHERE cname='$cname'");
 
 //$rowcount=mysqli_num_rows("SELECT * FROM customer WHERE cname='$cname'");
 // if($rowcount==true){
  if($query){
    echo '<script>window.alert("changed");window.location.href="changecname.html";</script>';
  }
  else{
    echo '<script>window.alert("invalid details");</script>';
 }
}
}

header("refresh:2;url=update.html");
?>