<!doctype html>
 <html>
<title>Pay Bills
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
  <a href="viewbills.php">viewbills</a>			
  <a class="activate" style="color: white" href="pay.php">pay</a>
  <a href="update.html">update</a>

</div>

<div id="container3">
<form action="paid.php" method="POST">
	<h2 align="center">PAYMENTS</h2>
	      <u> CONSUMER DETAILS</u>  <br><br>
	    <?php
			session_start();

			$con =mysqli_connect('127.0.0.1','root','');
			mysqli_select_db($con,'tariff');

			$res=$_SESSION['user'];			

			$result=mysqli_query($con,"SELECT * FROM customer WHERE c_id=(SELECT c_id FROM customer WHERE cname='$res')");
			while($row=mysqli_fetch_array($result)){
				echo   "Customer name   :<b> ".$row['cname']."</b><br>";
				echo   "Customer address:<b>".$row['address']."</b><br>";
				echo   "Customer id     :<b> ".$row['c_id']."</b><br>";
			}

				$result = mysqli_query($con,"SELECT amount FROM bills WHERE c_id=(SELECT c_id FROM customer WHERE cname='$res') and status='Pending'");
				while($row=mysqli_fetch_array($result)){

				echo   "Bill amount     :<b> ". $row['amount'] ."</b><br>";
				}
		?><br>
	<button type = "Submit" class="button">pay</button>
</form>
</div>
</body>
</html>
<?php
/*function total_bill($res)
{
		//$status=("SELECT status FROM bills WHERE c_id=(SELECT c_id FROM customer WHERE cname='$res')");

		$bill=("SELECT SUM(amount) as total FROM bills WHERE c_id=(SELECT c_id FROM customer WHERE cname='$res') and status='pending'");
		while($row=mysqli_fetch_array($bill)){
    	return $row['total'];}
}*/
?>
