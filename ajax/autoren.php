<?php 
include '../api/mainCall.php';
include '../config/route.php';
if(isset($_GET['autor_id'])) {
	$autor_id = $_GET['autor_id'];
	$autorEditUrl = $baseApiURL.'autor/view?autor_id='.$autor_id;
	$get_data = callAPI('GET',$autorEditUrl , false);
	//echo $get_data;
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			break;
		case 2:
			$autoren = $response['content']['data'];
			$data_array =  array(
				"Vorname"      => $autoren['vorname'],
				"Nachname"  => $autoren['nachname'],
				"Suchname"     => $autoren['suchname'],
				"Geburtsjahr/ datum"   => $autoren['geburtsdatum'],
				"Todesjahr/ datum"  => $autoren['sterbedatum'],
				"kommentar" => $autoren['kommentar']
			);
			echo json_encode($data_array);
			break;
		default:
			break;
	}																
}

if(isset($_GET['herkunft_id'])) {
	$herkunft_id = $_GET['herkunft_id'];
	$url = $baseApiURL.'herkunft/view?herkunft_id='.$herkunft_id;
	$get_data = callAPI('GET',$url , false);
	//echo $get_data;
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			break;
		case 2:
			$herkunft = $response['content']['data'];
			$data_array =  array(
				"Code"      => $herkunft['code'],
				"Titel"  => $herkunft['titel']
			);
			echo json_encode($data_array);
			break;
		default:
			break;
	}																
}

if(isset($_GET['verlag_id'])) {
	$verlag_id = $_GET['verlag_id'];
	$url = $baseApiURL.'verlage/view?verlag_id='.$verlag_id;
	$get_data = callAPI('GET',$url , false);
	//echo $get_data;
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			break;
		case 2:
			$verlage = $response['content']['data'];
			$data_array =  array(
				"Kürzel"    	=> $verlage['code'],
				"Titel"     	=> $verlage['titel'],
				"Strasse"   	=> $verlage['strasse'],
				"PLZ"  			=> $verlage['plz'],
				"Ort"  			=> $verlage['ort'],
				"Telefon"  		=> $verlage['telefon'],
				"Fax"  			=> $verlage['fax'],
				"Email"  		=> $verlage['email'],
				"Homepage"  	=> $verlage['homepage'],
				"Bemerkungen" 	=> $verlage['bemerkungen'],
			);
			echo json_encode($data_array);
			break;
		default:
			break;
	}																
}

if(isset($_GET['quelle_id'])) {
	$quelle_id = $_GET['quelle_id'];
	$url = $baseApiURL.'quelle/view?quelle_id='.$quelle_id;
	$get_data = callAPI('GET',$url , false);
	//echo $get_data;
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			break;
		case 2:
			$quelle = $response['content']['data'];
			$data_array =  array(
				"Kürzel"    	=> $quelle['code'],
				"Titel"     	=> $quelle['titel'],
				"Sprache"   	=> $quelle['sprache'],
				"Herkunft"  	=> $quelle['herkunft'],
				"Schema"  		=> $quelle['schema'],
				"Jahr"  		=> $quelle['jahr'],
				"Band"  		=> $quelle['band'],
				"Nummer"  		=> $quelle['Nummer'],
				"Auflage"  		=> $quelle['auflage'],
				"Verlag" 		=> $quelle['Verlag'],
				"Autor / Herausgeber" 		=> $quelle['Autor / Herausgeber'],
				"Datei" 		=> $quelle['datei'],
				"Bearbeiter" 	=> $quelle['bearbeiter']
			);
			echo json_encode($data_array);
			break;
		default:
			break;
	}																
}