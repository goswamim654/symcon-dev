<?php

$autorTitelsUrl = $baseURL.'autor/titels';
$get_data = callAPI('GET',$autorTitelsUrl , false);
$response = json_decode($get_data, true);
$autorTitels = $response['content']['data'];

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

	$get_data = callAPI('POST', $baseURL.'autor/add', json_encode($data_array));
	$response = json_decode($get_data, true);
	$status = $response['status'];
	$autoren = $response['content']['data'];
	if($status == 2 ) {
		$_SESSION['success'] = $response['message'];
		header('Location: '.$absoluteUrl. 'stammdaten/autoren/index.php');
	}
	
}
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