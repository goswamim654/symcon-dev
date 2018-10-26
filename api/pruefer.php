<?php
if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 3)) {
	header('Location: '.$absoluteUrl);
}
include 'mainCall.php';
$pruefer = '';
$get_data = '';
$response = '';
$autorTitels = '';

// get titels

$autorTitelsUrl = $baseApiURL.'autor/titels';
$get_data = callAPI('GET',$autorTitelsUrl , false);
$response = json_decode($get_data, true);
$status = $response['status'];
switch ($status) {
	case 0:
		echo $response['message'];
		die();
		break;
	case 2:
		$autorTitels = $response['content']['data'];
		break;
	default:
		break;
}

if(isset($_GET['pruefer_id'])) {
	$pruefer_id = $_GET['pruefer_id'];
	$url = $baseApiURL.'pruefer/view?pruefer_id='.$pruefer_id;
	$get_data = callAPI('GET',$url , false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$pruefer = $response['content']['data'];
			break;
		default:
			break;
	}																
}