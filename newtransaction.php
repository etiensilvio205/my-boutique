<?php

session_start();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$uname = $request->name;
$product= $request->product;
$cost= $request->cost;
$granter=$_SESSION['username'];

date_default_timezone_set('Indian/Mauritius');
$date = date('m/d/Y h:i:s a', time());
$state="";

$id="";


$conn = new mysqli("localhost","root","","boutique");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$ids = $conn->query("SELECT id FROM customers WHERE name='$uname'");

while($rsID = $ids->fetch_array(MYSQLI_ASSOC)) {
   $id=$rsID['id'];
}

if (!$id==""){
	
	if (mysqli_query($conn,"INSERT INTO transactions VALUES (default,'$id', '$product', '$cost', '$date','$granter')")&&mysqli_query($conn,"UPDATE customers SET balance = balance + '$cost' WHERE id= '$id'"))
	{
 $state="true";
					echo $state;
} else {
 $state="false";
					echo $state;
} 
	
	
}











?>