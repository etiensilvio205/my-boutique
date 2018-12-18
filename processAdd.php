<?php
include 'dBconnect.php';
session_start();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$uname = $request->name;
$phone= $request->phone;
$balance=0;



$state="";





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