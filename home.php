<?php

session_start();


?>

<html>
<title>
	 A:HOME
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
	<li><a href="home.php">Home</a></li>
	<li><a>Logged in as :: <b><?php echo $_SESSION['userid'];?></b></a></li>
	<li style="float:right"><a href="acontact.html">Contact</a></li>
	<li style="float:right"><a href="aabout.html">About</a></li>
	<li style="float:right"><a href="logoutadmin.php">Logout</a></li>
</ul>
</div><br>

			<div class="sidenav">
  <a href="billparameters.html">bill parameters</a>			
  <a href="createcustomer.html">createcustomer</a>
  <a href="generatebill.html">generatebill</a>
 
</div>
<marquee style="background-color: #8ee4af"><p id="stroke">Tariffs are a collection of electric rates and other charges that are applied per the specific definitions of the tariff in order to calculate your final utility bill. ... General tariffs charge per unit rates based on consumption, and may increase (tiers) based on how much you use
</p></marquee>

</body>
</html>
?>