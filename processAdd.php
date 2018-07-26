<?php

session_start();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$uname = $request->name;
$phone= $request->phone;
$balance=0;



$state="";




$conn = new mysqli("localhost","root","","boutique");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if (!$uname==""){
	
	if (mysqli_query($conn,"INSERT INTO customers VALUES (default, '$uname', '$phone', '$balance')")){
		$state="true";
		echo $state;
	} else {
		$state="false";
		echo $state;
			} 
	
	

}else{
	$state="true";
	echo $state;
}










?>