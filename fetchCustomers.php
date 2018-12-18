<?php

include 'dBconnect.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");



$result = $conn->query("SELECT * FROM customers");

//create a json file with the results set and call the parent node records
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
	
    $outp .= '{"Name":"'  . $rs["name"].'",';
	$outp .= '"Balance":"'   . $rs["balance"].'"}' ;
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>