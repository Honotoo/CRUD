<?php 

function AddRow($id,$product_name,$amount_left,$unit,$description,$price,$photo_name)
{	
	require 'Connection.php';
	 // return $id;

	$sqlQuery = "INSERT INTO fruitstable (id, product_name, amount_left, unit, description,price,photo_name) VALUES ('$id', '$product_name', '$amount_left', '$unit', '$description', '$price', '$photo_name')";
	// mysqli_query( $connect, $sqlQuery );
	
	if($connect->query($sqlQuery) === TRUE) {
		$connect->close();
		return "Done";
	} else {
		$connect->close();
		return 'Error '.$connect->error.'';
	}
	$connect->close();
	// return "Done";
	
}


?>


