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
	if(isset($_POST['autorId'])) {
		$data_array =  array("autorId" => $_POST['autorId']);
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
	if($response['status'] == 0) {
		echo $response['message'];
		die();
	} else if($response['status'] == 2) {
		$autoren = $response['content']['data'];	
	}
}

// get a single autor

if(isset($_GET['autorId'])) {
	$autorId = $_GET['autorId'];
	$autorEditUrl = $baseApiURL.'autor/view?autorId='.$autorId;
	$get_data = callAPI('GET',$autorEditUrl , false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	if($response['status'] == 0) {
		echo $response['message'];
		die();
	} else if($response['status'] == 2) {
		$autoren = $response['content']['data'];	
	}																
}

// add and edit a autor

if(isset($_POST['Speichern']) || isset($_POST['ÄnderungenSpeichern'])) {
	$Code = isset($_POST['Code']) ? $_POST['Code'] : '';
	$Suchname = isset($_POST['Suchname']) ? $_POST['Suchname'] : '';
	$Titel = isset($_POST['Titel']) ? $_POST['Titel'] : '';
	$Vorname = isset($_POST['Vorname']) ? $_POST['Vorname'] : '';
	$Nachname = isset($_POST['Nachname']) ? $_POST['Nachname'] : '';
	$Geburtsdatum = isset($_POST['Geburtsjahr']) ? $_POST['Geburtsjahr'] : '';
	$Sterbedatum = isset($_POST['Todesjahr']) ? $_POST['Todesjahr'] : '';
	$Kommentar = isset($_POST['Kommentar']) ? $_POST['Kommentar'] : '';

	$data_array =  array(
		"Code"      => $Code,
		"Suchname"  => $Suchname,
		"Titel"     => $Titel,
		"Vorname"   => $Vorname,
		"Nachname"  => $Nachname,
		"Geburtsdatum" => $Geburtsdatum,
		"Sterbedatum" => $Sterbedatum,
		"Kommentar" => $Kommentar
	);
	// add autor

	if(isset($_POST['Speichern'])) {
		$get_data = callAPI('POST', $baseApiURL.'autor/add', json_encode($data_array));
	}
	// edit autor

	if(isset($_POST['ÄnderungenSpeichern'])) {
		$get_data = callAPI('POST',  $baseApiURL.'autor/update?autorId='.$autorId, json_encode($data_array));
	}
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$_SESSION['success'] = $response['message'];
			header('Location: '.$absoluteUrl. 'stammdaten/autoren/index.php');
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
