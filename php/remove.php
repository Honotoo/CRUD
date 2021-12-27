<?php 


function RemoveFromFruits($id)
{
	require 'Connection.php';
	
	$sqlQuery = "DELETE FROM fruitstable WHERE id ='$id'";
	// $connect->query($sqlQuery)
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
