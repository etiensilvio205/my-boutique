<?php
include 'dBconnect.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$uname = $request->Name;

$id="";




$ids = $conn->query("SELECT id FROM customers WHERE name='$uname'");

while($rsID = $ids->fetch_array(MYSQLI_ASSOC)) {
   $id=$rsID['id'];
}

if (!$id==""){
	
	$result = $conn->query("SELECT * FROM transactions WHERE id='$id' ORDER BY transactionID DESC");

				//create a json file with the results set and call the parent node records
				$outp ="";
				while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
					if ($outp != "") {$outp .= ",";}
					
					$outp .= '{"Product":"'.$rs["product"].'",';
					$outp .= '"Cost":"'.$rs["cost"].'",';
					$outp .= '"Granter":"'.$rs["seller"].'",';
					$outp .= '"Date":"'.$rs["date"].'"}' ;
				}
				$outp ='{"transactions":['.$outp.']}';
				$conn->close();

				echo($outp);
	
	
}











?>