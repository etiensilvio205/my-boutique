<?php
include 'dBconnect.php';
session_start();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$uname = $request->name;
$cost=$request->amount;
$product="PAID";
$state="";
$id="";
$granter=$_SESSION['username'];

date_default_timezone_set('Indian/Mauritius');
$date = date('m/d/Y h:i:s a', time());


$ids = $conn->query("SELECT id FROM customers WHERE name='$uname'");

while($rsID = $ids->fetch_array(MYSQLI_ASSOC)) {
   $id=$rsID['id'];
}

if ((!$id=="")&&($cost>0)){
	
	if (mysqli_query($conn,"UPDATE customers SET balance = balance - '$cost' WHERE id= '$id'"))
	{				mysqli_query($conn,"INSERT INTO transactions VALUES (default,'$id', '$product', '$cost', '$date','$granter')");
					$balances = $conn->query("SELECT balance FROM customers WHERE name='$uname'");
						while($balance = $balances->fetch_array(MYSQLI_ASSOC)) {
						   $bal=$balance['balance'];
						}
						
						if ($bal==0){
							mysqli_query($conn,"DELETE FROM customers WHERE name='$uname'");
							mysqli_query($conn,"DELETE FROM transactions WHERE id='$id'");
							$state="trueEnd";
							echo $state;
						}else{
							$state="true";
							echo $state;	
						}
						
					
					
	} else {
					$state="false";
					echo $state;
	} 
	
	
}
else{
	
	$state="false";
	echo $state;
}


