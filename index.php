<?php
            session_start();

            $con =mysqli_connect('127.0.0.1','root','');
            mysqli_select_db($con,'tariff');

            $res=$_SESSION["user"];

            

            


        $bill=mysqli_query($con,"SELECT SUM(amount) FROM bills WHERE c_id=(SELECT c_id FROM customer WHERE cname='$res') and status='Pending'");
        echo $bill;
       
?>