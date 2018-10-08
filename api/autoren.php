<?php
include 'mainCall.php';
// titels
$autorTitelsUrl = $baseApiURL.'autor/titels';
$get_data = callAPI('GET',$autorTitelsUrl , false);
$response = json_decode($get_data, true);
$autorTitels = $response['content']['data'];

// list autoren

if($actual_link == $absoluteUrl.'stammdaten/autoren/' || $actual_link == $absoluteUrl.'stammdaten/autoren/index.php') {
	$get_data = callAPI('GET', $baseApiURL.'autor/all', false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	$autoren = $response['content']['data'];
}

// get a single autor

if(isset($_GET['autor'])) {
	$autorEditUrl = $baseApiURL.'autor/view?autorId='.$_GET['autor'];
	$get_data = callAPI('GET',$autorEditUrl , false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	$autoren = $response['content']['data'];																
}

// add a autor

if(isset($_POST['Speichern'])) {
	$data_array =  array(
		"Code"      => '',
		"Suchname"  => $_POST['Vorname'],
		"Titel"     => $_POST['Titel'],
		"Vorname"   => $_POST['Vorname'],
		"Nachname"  => $_POST['Nachname'],
		"Geburtsdatum" => $_POST['Geburtsjahr'],
		"Sterbedatum" => $_POST['Todesjahr'],
		"Kommentar" => $_POST['Kommentar']
	);

	$get_data = callAPI('POST', $baseApiURL.'autor/add', json_encode($data_array));
	$response = json_decode($get_data, true);
	$status = $response['status'];
	$autoren = $response['content']['data'];
	if($status == 2 ) {
		$_SESSION['success'] = $response['message'];
		header('Location: '.$absoluteUrl. 'stammdaten/autoren/index.php');
	}
	
}

// edit a autor

if(isset($_POST['ÄnderungenSpeichern'])) {
	$data_array =  array(
		"Code"      => '',
		"Suchname"  => $_POST['Vorname'],
		"Titel"     => $_POST['Titel'],
		"Vorname"   => $_POST['Vorname'],
		"Nachname"  => $_POST['Nachname'],
		"Geburtsdatum" => $_POST['Geburtsjahr'],
		"Sterbedatum" => $_POST['Todesjahr'],
		"Kommentar" => $_POST['Kommentar']
	);

	$get_data = callAPI('POST', 'https://alegralabs.com/hemanta/symcom/api/public/v1/autor/add', json_encode($data_array));
	$response = json_decode($get_data, true);
	$status = $response['status'];
	$autoren = $response['content']['data'];
	//var_dump($get_data);
	
}

// delete a autor
