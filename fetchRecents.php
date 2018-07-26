<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost","root","","boutique");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = $conn->query("SELECT DISTINCT name,balance FROM transactions t LEFT JOIN customers c ON t.id=c.id WHERE product!='PAID' ORDER BY transactionID DESC LIMIT 4");

//create a json file with the results set and call the parent node records
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
	
    $outp .= '{"Name":"'  . $rs["name"].'",';
	$outp .= '"Balance":"'   . $rs["balance"].'"}' ;
}
$outp ='{"recents":['.$outp.']}';
$conn->close();

echo($outp);
?>