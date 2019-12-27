<?php
session_start();

	$con =mysqli_connect('127.0.0.1','root','');
	mysqli_select_db($con,'tariff');

$res=$_SESSION["user"];

$sql = "UPDATE bills SET status='Paid' WHERE c_id=(SELECT c_id FROM customer WHERE cname='$res')";
    $query = mysqli_query($con,$sql);
if(!$query)
{
   echo '<script>window.alert("Sorry Some Error Has Occured");</script>';
}

else
{
     echo '<script>window.alert("Bill Paid");</script>';
}
header("refresh:1; pay.php");
?>