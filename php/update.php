<?php 

function UpdateRowFruits($id,$product_name,$amount_left,$unit,$description,$price,$photo_name)
{
	require 'Connection.php';
	$sqlQuery  = "UPDATE fruitstable SET product_name = '$product_name', amount_left = '$amount_left', unit = '$unit', description = '$description', price = '$price', photo_name = '$photo_name' WHERE id = '$id'";
	// $connect->query($sqlQuery);
	
	if($connect->query($sqlQuery) === TRUE) {
		$connect->close();
		return "Done";
	} else {
		$connect->close();
		return 'Error '.$connect->error.'';
	}
	
	$connect->close();
	
}


?>