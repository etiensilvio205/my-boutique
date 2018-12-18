<?php


$conn = new mysqli("85.10.205.173:3306","etienboutique","58218335","boutique");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>