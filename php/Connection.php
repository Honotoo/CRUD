<?php 

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "fruitDB";


$connect = new mysqli($localhost, $username, $password, $dbname);


if($connect->connect_error) {
	die("connection failed : " . $connect->connect_error);
} else {
	// echo "database connected";
}

?>



