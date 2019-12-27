<?php

if(isset($_POST["submit"])){
$con = mysqli_connect('127.0.0.1','root','');
if(!$con){
echo 'not connected to database';
}
if(!mysqli_select_db($con,'tariff'))
{
echo 'database not seleted';
}
if (isset($_POST["submit"])) {
    $units = $_POST["units"];
    $Customerid = $_POST["Customer_id"];

    $type=mysqli_query($con,"SELECT ctype FROM customer WHERE c_id='$Customerid'");

        $result = calculate_bill($units);
        

    $sql = "INSERT INTO bills (c_id,amount,status) VALUES ('$Customerid','$result','Pending')";
    $query = mysqli_query($con,$sql);
    
}

else{
    echo '<script>window.alert("Invalid data");</script>';
}
if(!$query)
{
   echo '<script>window.alert("Bill not generated");</script>';
}

else
{
     echo '<script>window.alert("Bill generated");window.location.href="generatebill.html";</script>';
}
}
//header("refresh:2; url=generatebill.html");
/**
 * To calculate electricity bill as per unit cost
 */
function calculate_bill($units) {
    
//while($row=mysqli_fetch_array($type)){
    if($type='Domestic'){
        $unit_cost_first = 2.50;
        $unit_cost_second = 2.75;
        if($units <= 100) {
            $bill = $units * $unit_cost_first;
        }
        else {
            $temp = 100 * $unit_cost_first;
            $remaining_units = $units - 100;
            $bill = $temp + ($remaining_units * $unit_cost_second);
        }
    }
    elseif ($type='Commercial') {
         $unit_cost_first = 2.75;
         $bill = $units * $unit_cost_first;
    } 
    elseif ($type='Industrial') {
         $unit_cost_first = 3.00;
         $bill = $units * $unit_cost_first;
    }
    else{
         $unit_cost_first = 2.25;
         $bill = $units * $unit_cost_first;
    }
    return number_format((float)$bill, 2, '.', '');    
// }
}
?>