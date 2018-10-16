<?php
if(!isset($_SESSION['access_token'])) {
    header('Location: '.$absoluteUrl.'login.php');
}
include 'mainCall.php';

// land select list

$get_data = callAPI('GET', $baseApiURL.'verlage/land' , false);
$response = json_decode($get_data, true);
$status = $response['status'];
switch ($status) {
	case 0:
		echo $response['message'];
		die();
		break;
	case 2:
		$lands = $response['content']['data'];
		break;
	default:
		break;
}

// list Verlage

if($actual_link == $absoluteUrl.'stammdaten/verlage/' || $actual_link == $absoluteUrl.'stammdaten/verlage/index.php') {
	$verlages = '';
	if(isset($_POST['delete_array_id'])) {
		$data_array =  array("verlag_id" => $_POST['delete_array_id']);
		$get_data = callAPI('POST', $baseApiURL.'verlage/delete', json_encode($data_array));
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
	$get_data = callAPI('GET', $baseApiURL.'verlage/all?is_paginate=0', false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$verlages = $response['content']['data'];
			break;
		default:
			break;
	}
}
// get a single verlage

if(isset($_GET['verlag_id'])) {
	$verlag_id = $_GET['verlag_id'];
	$url = $baseApiURL.'verlage/view?verlag_id='.$verlag_id;
	$get_data = callAPI('GET',$url , false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$verlage = $response['content']['data'];
			break;
		default:
			break;
	}																
}
// add and edit a verlage

if(isset($_POST['Speichern']) || isset($_POST['ÄnderungenSpeichern'])) {
	$code = isset($_POST['code']) ? $_POST['code'] : '';
	$titel = isset($_POST['titel']) ? $_POST['titel'] : '';
	$strasse = isset($_POST['strasse']) ? $_POST['strasse'] : '';
	$plz = isset($_POST['plz']) ? $_POST['plz'] : '';
	$ort = isset($_POST['ort']) ? $_POST['ort'] : '';
	$land_id = isset($_POST['land_id']) ? $_POST['land_id'] : '';
	$telefon = isset($_POST['telefon']) ? $_POST['telefon'] : '';
	$fax = isset($_POST['fax']) ? $_POST['fax'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$homepage = isset($_POST['homepage']) ? $_POST['homepage'] : '';
	$bemerkungen = isset($_POST['bemerkungen']) ? $_POST['bemerkungen'] : '';

	$data_array =  array(
		"code"      	=> $code,
		"titel"    		=> $titel,
		"strasse"    	=> $strasse,
		"plz"     		=> $plz,
		"plz"     		=> $plz,
		"ort"     		=> $ort,
		"land_id"     	=> $land_id,
		"telefon"     	=> $telefon,
		"fax"     		=> $fax,
		"email"     	=> $email,
		"homepage"     	=> $homepage,
		"bemerkungen"  	=> $bemerkungen
	);
	// print_r($data_array);
	// die();
	// add verlage

	if(isset($_POST['Speichern'])) {
		$get_data = callAPI('POST', $baseApiURL.'verlage/add', json_encode($data_array));
	}
	// edit verlage

	if(isset($_POST['ÄnderungenSpeichern'])) {
		$verlag_id = $_POST['verlag_id'];
		$get_data = callAPI('POST',  $baseApiURL.'verlage/update?verlag_id='.$verlag_id, json_encode($data_array));
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
			$strasse = '';
			$plz = '';
			$ort = '';
			$land_id = '';
			$telefon = '';
			$fax = '';
			$email = '';
			$homepage = '';
			$bemerkungen = '';

			$_SESSION['success'] = $response['message'];
			$verlage = $response['content']['data'];
			break;	
		case 3:
			$_SESSION['validationError'] = $response['message'];
			break;
		default:
			break;
	}
}
