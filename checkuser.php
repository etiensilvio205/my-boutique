<?php


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$uname = $request->username;
$pwd = $request->pwd;

$password="";
$name="";


$conn = new mysqli("localhost","root","","boutique");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$names = $conn->query("SELECT username FROM admin WHERE BINARY username='$uname'");


while($rsn = $names->fetch_array(MYSQLI_ASSOC)) {
$name=$rsn["username"];
}



$result = $conn->query("SELECT password FROM admin WHERE username='$uname'");

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
   $password=$rs['password'];
}

if(!$password==""||!$name==""){
			if ($pwd==$password){
				$access="true";
				session_start();
				$_SESSION['username']=$uname;
				
				
				
			}else {
				$access="false";
				}
				
				echo($access);
}
else{
	$access="false";
	echo($access);
	
}







?>