<?php 
include '../api/mainCall.php';
include '../config/route.php';
if(isset($_GET['autor_id'])) {
	$autor_id = $_GET['autor_id'];
	$autorEditUrl = $baseApiURL.'autor/view?autor_id='.$autor_id;
	$get_data = callAPI('GET',$autorEditUrl , false);
	echo $get_data;															
}
if(isset($_POST['autor_id'])) {
	$autor_id = isset($_POST['autor_id']) ? $_POST['autor_id'] : '';
	$data_array =  array("autor_id" => $autor_id);
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