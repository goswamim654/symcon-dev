<?php 
include '../api/mainCall.php';
include '../config/route.php';
if(isset($_GET['autorId'])) {
	$autorId = $_GET['autorId'];
	$autorEditUrl = $baseApiURL.'autor/view?autorId='.$autorId;
	$get_data = callAPI('GET',$autorEditUrl , false);
	echo $get_data;															
}
if(isset($_POST['autorId'])) {
	$autorId = isset($_POST['autorId']) ? $_POST['autorId'] : '';
	$data_array =  array("autorId" => $autorId);
	$get_data = callAPI('POST', $baseApiURL.'autor/delete', json_encode($data_array));
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$_SESSION['success'] = $response['message'];
			break;	
		case 3:
			$_SESSION['validationError'] = $response['message'];
			break;
		default:
			break;
	}													
}