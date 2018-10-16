<?php
if(!isset($_SESSION['access_token'])) {
    header('Location: '.$absoluteUrl.'login.php');
}
include 'mainCall.php';
$autoren = '';
$get_data = '';
$response = '';
$autorTitels = '';
// get titels

$autorTitelsUrl = $baseApiURL.'autor/titels';
$get_data = callAPI('GET',$autorTitelsUrl , false);
$response = json_decode($get_data, true);
if($response['status'] == 0) {
	echo $response['message'];
	die();
} else if($response['status'] == 2) {
	$autorTitels = $response['content']['data'];
}

// list autoren
if($actual_link == $absoluteUrl.'stammdaten/autoren/' || $actual_link == $absoluteUrl.'stammdaten/autoren/index.php') {
	if(isset($_POST['delete_array_id'])) {
		$data_array =  array("autor_id" => $_POST['delete_array_id']);
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
	$get_data = callAPI('GET', $baseApiURL.'autor/all?is_paginate=0', false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$autoren = $response['content']['data'];
			break;
		default:
			break;
	}
}

// get a single autor

if(isset($_GET['autor_id'])) {
	$autor_id = $_GET['autor_id'];
	$autorEditUrl = $baseApiURL.'autor/view?autor_id='.$autor_id;
	$get_data = callAPI('GET',$autorEditUrl , false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$autoren = $response['content']['data'];
			break;
		default:
			break;
	}																
}

// add and edit a autor

if(isset($_POST['Speichern']) || isset($_POST['ÄnderungenSpeichern'])) {
	$code = isset($_POST['code']) ? $_POST['code'] : '';
	$suchname = isset($_POST['suchname']) ? $_POST['suchname'] : '';
	$titel = isset($_POST['titel']) ? $_POST['titel'] : '';
	$vorname = isset($_POST['vorname']) ? $_POST['vorname'] : '';
	$nachname = isset($_POST['nachname']) ? $_POST['nachname'] : '';
	$geburtsdatum = isset($_POST['geburtsjahr']) ? $_POST['geburtsjahr'] : '';
	$sterbedatum = isset($_POST['todesjahr']) ? $_POST['todesjahr'] : '';
	$kommentar = isset($_POST['kommentar']) ? $_POST['kommentar'] : '';

	$data_array =  array(
		"code"      => $code,
		"suchname"  => $suchname,
		"titel"     => $titel,
		"vorname"   => $vorname,
		"nachname"  => $nachname,
		"geburtsdatum" => $geburtsdatum,
		"sterbedatum" => $sterbedatum,
		"kommentar" => $kommentar
	);
	// add autor

	if(isset($_POST['Speichern'])) {
		$get_data = callAPI('POST', $baseApiURL.'autor/add', json_encode($data_array));
	}
	// edit autor

	if(isset($_POST['ÄnderungenSpeichern'])) {
		$autor_id = $_POST['autor_id'];
		$get_data = callAPI('POST',  $baseApiURL.'autor/update?autor_id='.$autor_id, json_encode($data_array));
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
			$suchname = '';
			$titel = '';
			$vorname = '';
			$nachname = '';
			$geburtsdatum = '';
			$sterbedatum = '';
			$kommentar = '';
			$_SESSION['success'] = $response['message'];
			$autoren = $response['content']['data'];
			//header('Location: '.$absoluteUrl. 'stammdaten/autoren/index.php');
			break;	
		case 3:
			$_SESSION['validationError'] = $response['message'];
			break;
		default:
			//header('Location: '.$absoluteUrl. 'stammdaten/autoren/index.php');
			break;
	}
}

// delete a autor
