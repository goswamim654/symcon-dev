<?php
if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 3) && ($_SESSION['user_type'] == 2)) {
	header('Location: '.$absoluteUrl);
}
include 'mainCall.php';
$benutzer = '';
$get_data = '';
$response = '';
if(isset($_GET['benutzer_id'])) {
	$id = $_GET['benutzer_id'];
	$url = $baseApiURL.'user/view?id='.$id;
	$get_data = callAPI('GET',$url , false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$benutzer = $response['content']['data'];
			break;
		default:
			break;
	}																
}