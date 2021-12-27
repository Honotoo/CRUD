<?php 

require_once 'CheckAjax.php';
require_once 'remove.php';
require_once 'update.php';
require_once 'create.php';

if (is_ajax()) {
	
	$id = $_POST["id"];
	$product_name = $_POST['product_name'];
	$amount_left = $_POST['amount_left'];
	$unit = $_POST['unit'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$photo_name = $_POST['photo_name'];
	$clarificationTask = $_POST['clarificationTask'];
	
	if ($id==NULL){$id=1;}
	if ($product_name==NULL){$product_name="нет названия";}
	if ($amount_left==NULL){$amount_left=1;}
	if ($unit==NULL){$unit="кг";}
	if ($description==NULL){$description="нет описания";}
	if ($price==NULL){$price=1;}
	if ($photo_name==NULL){$photo_name="Нет имени картинки";}
	
	
	if($clarificationTask==1) //remove
	{
		$removeResults = RemoveFromFruits($id);
		echo json_encode(array('remove finished with' => $removeResults));
	}
	else if ($clarificationTask==2) //update
	{
		$updateResults =UpdateRowFruits($id,$product_name,$amount_left,$unit,$description,$price,$photo_name);
		echo json_encode(array('update finished with' => $updateResults));
	}
	else if ($clarificationTask==3) //add
	{
		$addResults =AddRow($id,$product_name,$amount_left,$unit,$description,$price,$photo_name);
		echo json_encode(array('adding finished with' => $addResults));
	}
	else
	{
		 echo json_encode(array('Not done operation' => $clarificationTask));
	}
	
}	

?>