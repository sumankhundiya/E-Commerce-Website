<?php
$host="localhost";
$username="root";
$password="";
$port=3307;
$dbname="shopzone";

$conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if(!$conn){
    die($conn);
}

?> 
