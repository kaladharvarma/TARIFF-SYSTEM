<?php
session_start();

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
	$aname=$_POST['aname'];
  $query = mysqli_query($con," SELECT * FROM admin WHERE aname='$_POST[aname]' and password='$_POST[password]'");
  $rowcount=mysqli_num_rows($query);
  if($rowcount==true){

  	$_SESSION['userid'] = $aname;
    echo '<script>window.alert("Logged in");window.location.href="home.php";</script>';
    
  }
  else{
    echo '<script>window.alert("invalid details");</script>';
  }
}
}
header("refresh:2;url=admin.html");
?>