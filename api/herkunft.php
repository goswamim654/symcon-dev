<?php
if(!isset($_SESSION['access_token'])) {
    header('Location: '.$absoluteUrl.'login.php');
}
include 'mainCall.php';

// list herkunft

if($actual_link == $absoluteUrl.'stammdaten/herkunft/' || $actual_link == $absoluteUrl.'stammdaten/herkunft/index.php') {
	$herkunfte = '';
	if(isset($_POST['delete_array_id'])) {
		$data_array =  array("herkunft_id" => $_POST['delete_array_id']);
		$get_data = callAPI('POST', $baseApiURL.'herkunft/delete', json_encode($data_array));
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
	$get_data = callAPI('GET', $baseApiURL.'herkunft/all?is_paginate=0', false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$herkunfte = $response['content']['data'];
			break;
		default:
			break;
	}
}
// get a single herkunft

if(isset($_GET['herkunft_id'])) {
	$herkunft_id = $_GET['herkunft_id'];
	$url = $baseApiURL.'herkunft/view?herkunft_id='.$herkunft_id;
	$get_data = callAPI('GET',$url , false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$herkunft = $response['content']['data'];
			break;
		default:
			break;
	}																
}
// add and edit a herkunft

if(isset($_POST['Speichern']) || isset($_POST['ÄnderungenSpeichern'])) {
	$code = isset($_POST['code']) ? $_POST['code'] : '';
	$titel = isset($_POST['titel']) ? $_POST['titel'] : '';

	$data_array =  array(
		"code"      => $code,
		"titel"     => $titel
	);
	// add herkunft

	if(isset($_POST['Speichern'])) {
		$get_data = callAPI('POST', $baseApiURL.'herkunft/add', json_encode($data_array));
	}
	// edit herkunft

	if(isset($_POST['ÄnderungenSpeichern'])) {
		$herkunft_id = $_POST['herkunft_id'];
		$get_data = callAPI('POST',  $baseApiURL.'herkunft/update?herkunft_id='.$herkunft_id, json_encode($data_array));
	}
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$code = '';
			$titel = '';
			$_SESSION['success'] = $response['message'];
			$herkunft = $response['content'];
			//header('Location: '.$absoluteUrl. 'stammdaten/herkunft/index.php');
			break;	
		case 3:
			$_SESSION['validationError'] = $response['message'];
			break;
		default:
			//header('Location: '.$absoluteUrl. 'stammdaten/autoren/index.php');
			break;
	}
}
