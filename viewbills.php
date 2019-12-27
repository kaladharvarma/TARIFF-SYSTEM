
<!doctype html>
 <html>
<title>PREVIOUS BILLS
</title>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div align="center">
	<h1>TARIFF SYSTEM</h1>
</div>
<div>
<ul>
	<li><a href="custhome.php">Home</a></li>
	<li style="float:right"><a href="ccontact.html">Contact</a></li>
	<li style="float:right"><a href="cabout.html">About</a></li>
	<li style="float:right"><a href="logoutcustomer.php">Logout</a></li>
</ul>
</div></br>
			<div class="sidenav">
  <a class="activate" style="color: white" href="viewbills.php">viewbills</a>			
  <a href="pay.php">pay</a>
  <a href="update.html">update</a>
</div>
	

<div id="container2">
	
	<?php
session_start();

	$con =mysqli_connect('127.0.0.1','root','');
	mysqli_select_db($con,'tariff');

$res=$_SESSION["user"];

$result=mysqli_query($con,"SELECT * FROM bills WHERE c_id=(SELECT c_id FROM customer WHERE cname='$res')");
echo"<table border=1>
<tr>
<th>b_id</th>
<th>c_id</th>
<th>amount</th>
<th>status</th>
</tr>";
while($row=mysqli_fetch_array($result))
{
	echo"<tr>";
	echo"<td>".$row['b_id']."</td>";
	echo"<td>".$row['c_id']."</td>";
	echo"<td>".$row['amount']."</td>";
	echo"<td>".$row['status']."</td>";
	echo"</tr>";
}
echo"</table>";
mysqli_close($con);
?>

</div>
</body>
</html>
