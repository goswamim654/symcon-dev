<?php 
include '../config/route.php';
include '../api/mainCall.php';

if(isset($_GET['autor_id'])) {
	$autor_id = $_GET['autor_id'];
	$url = $baseApiURL.'autor/view?autor_id='.$autor_id;
	$get_data = callAPI('GET',$url , false);
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
		case 3:
			echo $error = $response['message'];
			break;
		case 4:
			echo $error = $response['message'];
			break;
		case 5:
			echo $error = $response['message'];
			break;
		case 6:
			echo $error = $response['message'];
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
		case 3:
			echo $error = $response['message'];
			break;
		case 4:
			echo $error = $response['message'];
			break;
		case 5:
			echo $error = $response['message'];
			break;
		case 6:
			echo $error = $response['message'];
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
		case 3:
			echo $error = $response['message'];
			break;
		case 4:
			echo $error = $response['message'];
			break;
		case 5:
			echo $error = $response['message'];
			break;
		case 6:
			echo $error = $response['message'];
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
			$autor_herausgeber = null;
			$file_url = null;
			$quelle = $response['content']['data'];
			$autoren = $quelle['autoren'];
			foreach ($autoren as $key => $autor) {
				if($key > 0) $autor_herausgeber .= ', ';
				if( $autor['suchname'] ) $autor_herausgeber .= $autor['suchname']; else $autor_herausgeber .= $autor['vorname'].' '.$autor['nachname'];
			}
			if($quelle['file_url']) {
				$file_url = '<a href="'.$quelle['file_url'].'"  target="_blank">Click to view</a>';
			}
			$data_array =  array(
				"Kürzel"    	=> $quelle['code'],
				"Titel"     	=> $quelle['titel'],
				"Sprache"   	=> $quelle['sprache'],
				"Herkunft"  	=> $quelle['herkunft']['titel'],
				"Schema"  		=> $quelle['quelle_schema'],
				"Jahr"  		=> $quelle['jahr'],
				"Band"  		=> $quelle['band'],
				"Nummer"  		=> $quelle['nummer'],
				"Auflage"  		=> $quelle['auflage'],
				"Verlag" 		=> $quelle['verlag']['titel'],
				"Autor / Herausgeber" 		=> $autor_herausgeber,
				"Datei" 		=> $file_url,
				"Bearbeiter" 	=> $quelle['bearbeiter']
			);
			echo json_encode($data_array);
			break;
		case 3:
			echo $error = $response['message'];
			break;
		case 4:
			echo $error = $response['message'];
			break;
		case 5:
			echo $error = $response['message'];
			break;
		case 6:
			echo $error = $response['message'];
			break;
		default:
			break;
	}																
}

if(isset($_GET['zeitschrift_id'])) {
	$zeitschrift_id = $_GET['zeitschrift_id'];
	$url = $baseApiURL.'zeitschrift/view?quelle_id='.$zeitschrift_id;
	$get_data = callAPI('GET',$url , false);
	//echo $get_data;
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			break;
		case 2:
			$autor_herausgeber = null;
			$file_url = null;
			$zeitschrift = $response['content']['data'];
			$autoren = $zeitschrift['autoren'];
			foreach ($autoren as $key => $autor) {
				if($key > 0) $autor_herausgeber .= ', ';
				if( $autor['suchname'] ) $autor_herausgeber .= $autor['suchname']; else $autor_herausgeber .= $autor['vorname'].' '.$autor['nachname'];
			}
			if($zeitschrift['file_url']) {
				$file_url = '<a href="'.$zeitschrift['file_url'].'"  target="_blank">Click to view</a>';
			}
			$data_array =  array(
				"Herkunft"  	=> $zeitschrift['herkunft']['titel'],
				"Kürzel"    	=> $zeitschrift['code'],
				"Titel"     	=> $zeitschrift['titel'],
				"Jahr"  		=> $zeitschrift['jahr'],
				"Band"  		=> $zeitschrift['band'],
				"Jahrgang"      => $zeitschrift['jahrgang'],
				"Heft / Stück / Nummer"  		=> $zeitschrift['nummer'],
				"Autor / Herausgeber" 		=> $autor_herausgeber,
				"Datei" 		=> $file_url,
				"Bearbeiter" 	=> $zeitschrift['bearbeiter']
			);
			echo json_encode($data_array);
			break;
		case 3:
			echo $error = $response['message'];
			break;
		case 4:
			echo $error = $response['message'];
			break;
		case 5:
			echo $error = $response['message'];
			break;
		case 6:
			echo $error = $response['message'];
			break;
		default:
			break;
	}																
}

if(isset($_GET['arznei_id'])) {
	$arznei_id = $_GET['arznei_id'];
	$url = $baseApiURL.'arznei/view?arznei_id='.$arznei_id;
	$get_data = callAPI('GET',$url , false);
	//echo $get_data;
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			break;
		case 2:
			$autor_herausgeber = null;
			$quellen_value = null;
			$arzneien = $response['content']['data'];
			$quellen = $arzneien['quelle'];
			foreach ($quellen as $key => $quelle) {
				if($key > 0) $quellen_value .= ', ';
				$quellen_value = $quellen_value.$quelle['code'];
				if(!empty($quelle['jahr'])) $quellen_value .= ' '.$quelle['jahr'];
				if(!empty($quelle['band'])) $quellen_value .= ' Band: '.$quelle['band'];
				if(!empty($quelle['nummer'])) $quellen_value .= ' Nr.: '. $quelle['nummer'];
				if(!empty($quelle['auflage'])) $quellen_value .= ', Auflage: '. $quelle['auflage'];
			}
			$autoren = $arzneien['autoren'];
			foreach ($autoren as $key => $autor) {
				if($key > 0) $autor_herausgeber .= ', ';
				if( $autor['suchname'] ) $autor_herausgeber .= $autor['suchname']; else $autor_herausgeber .= $autor['vorname'].' '.$autor['nachname'];
			}
			$data_array =  array(
				"Arznei"      	=> $arzneien['titel'],
				"Quelle"  	=> $quellen_value,
				"Kommentar"     => $arzneien['kommentar'],
				"Unklarheiten" 	=> $arzneien['unklarheiten'],
				"Autor / Herausgeber" 		=> $autor_herausgeber,
			);
			echo json_encode($data_array);
			break;
		case 3:
			echo $error = $response['message'];
			break;
		case 4:
			echo $error = $response['message'];
			break;
		case 5:
			echo $error = $response['message'];
			break;
		case 6:
			echo $error = $response['message'];
			break;
		default:
			break;
	}																
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
			break;
		case 2:
			$pruefer = $response['content']['data'];
			$data_array =  array(
				"Vorname"      			=> $pruefer['vorname'],
				"Nachname"  			=> $pruefer['nachname'],
				"Suchname"     			=> $pruefer['suchname'],
				"Kürzel (mehrere mit '|' trennen!)" => $pruefer['kuerzel'],
				"Geburtsjahr/ datum"   => $pruefer['geburtsdatum'],
				"Todesjahr/ datum"  => $pruefer['sterbedatum'],
				"kommentar" => $pruefer['kommentar']
			);
			echo json_encode($data_array);
			break;
		case 3:
			echo $error = $response['message'];
			break;
		case 4:
			echo $error = $response['message'];
			break;
		case 5:
			echo $error = $response['message'];
			break;
		case 6:
			echo $error = $response['message'];
			break;
		default:
			break;
	}																
}

if(isset($_GET['benutzer_id'])) {
	$benutzer_id = $_GET['benutzer_id'];
	$url = $baseApiURL.'user/view?id='.$benutzer_id;
	$get_data = callAPI('GET',$url , false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			break;
		case 2:
			$benutzer = $response['content']['data'];
			$user_type_value = $benutzer['user_type'];
			if($user_type_value == 1) $user_type = 'Admin'; else if($user_type_value == 2) $user_type = 'Bearbeiter'; else $user_type = 'Gast';
			$active_status_value = $benutzer['active'];
			if($active_status_value == 1) $active_status = 'aktiv'; else $active_status = 'inaktiv';
			$data_array =  array(
				"Vorname"      		=> $benutzer['first_name'],
				"Nachname"  		=> $benutzer['last_name'],
				"Organisation"     	=> $benutzer['company'],
				"Email" 			=> $benutzer['email'],
				"Telefon"   		=> $benutzer['phone'],
				"Benutzername"  	=> $benutzer['username'],
				"Aktiviert" 		=> $active_status,
				"Benutzertyp" 		=> $user_type
			);
			echo json_encode($data_array);
			break;
		case 3:
			echo $error = $response['message'];
			break;
		case 4:
			echo $error = $response['message'];
			break;
		case 5:
			echo $error = $response['message'];
			break;
		case 6:
			echo $error = $response['message'];
			break;
		default:
			break;
	}																
}