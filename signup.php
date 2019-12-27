<?php

$con = mysqli_connect('127.0.0.1','root','');

if(!$con)
{
	echo 'Not connected to database';
}

if(!mysqli_select_db($con,'tariff'))
{
	echo 'Database not selected';
}

$cname = $_POST['cname'];
$address = $_POST['address'];
$ctype = $_POST['ctype'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
if($password==$cpassword)
{
	$sql = "INSERT INTO customer (cname,address,ctype,email,password,cpassword) VALUES ('$cname','$address','$ctype','$email','$password','$cpassword')";
	$query = mysqli_query($con,$sql);
}
else{
	echo '<script>window.alert("Passwords donot match");</script>';
}
if(!$query)
{
	echo '<script>window.alert("Not registered");window.location.href="createcustomer.html";</script>';
}

else
{
	echo '<script>window.alert("registered");window.location.href="createcustomer.html";</script>';
}

header("refresh:2; url=createcustomer.html");

?>
