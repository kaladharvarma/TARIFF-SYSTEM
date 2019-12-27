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
$password = $_POST['password'];
$npassword = $_POST['npassword'];
$res=$_SESSION["user"];

$result=mysqli_query($con,"SELECT * FROM customer WHERE c_id=(SELECT c_id FROM customer WHERE cname='$res')");

while($row=mysqli_fetch_array($result)){
if($password == $row['password']){
		$query = mysqli_query($con,"UPDATE customer SET password='$npassword',cpassword='$npassword' where cname='$res'");
	}
}
if($query){
    echo '<script>window.alert("changed");window.location.href="changepwd.html";</script>';
  }
  else{
    echo '<script>window.alert("invalid details");</script>';
 }
}
//header("refresh:2;url=update.html");
?>