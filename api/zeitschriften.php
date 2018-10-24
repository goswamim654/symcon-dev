<?php
if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 3)) {
	header('Location: '.$absoluteUrl);
}
include 'mainCall.php';
$zeitschriften = '';
// herkunft selectbox options
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

// Autor selectbox 
$get_data = callAPI('GET', $baseApiURL.'autor/all?is_paginate=0', false);
$response = json_decode($get_data, true);
$status = $response['status'];
switch ($status) {
	case 0:
		echo $response['message'];
		die();
		break;
	case 2:
		$autorenSelectBox = $response['content']['data'];
		break;
	default:
		break;
}


// get a single quelle

if(isset($_GET['zeitschrift_id'])) {
	$zeitschrift_id = $_GET['zeitschrift_id'];
	$editUrl = $baseApiURL.'zeitschrift/view?quelle_id='.$zeitschrift_id;
	$get_data = callAPI('GET',$editUrl , false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$zeitschriften = $response['content']['data'];
			$code = $zeitschriften['code'];
			$titel = $zeitschriften['titel'];
			$sprache = $zeitschriften['sprache'];
			$herkunft_id = $zeitschriften['herkunft_id'];
			$quelle_schema_id = $zeitschriften['quelle_schema_id'];
			$jahr = $zeitschriften['jahr'];
			$band = $zeitschriften['band'];
			$nummer = $zeitschriften['nummer'];
			$jahrgang = $zeitschriften['jahrgang'];
			$supplementheft = $zeitschriften['supplementheft'];
			$autoren_selected = $zeitschriften['autoren'];
			$autor_id_selected_values = [];
			foreach ($autoren_selected as $key => $autor_selected) {
				$autor_id_selected_values[] = $autor_selected['autor_id'];
			}
			$file_url = $zeitschriften['file_url'];
			//print_r($get_data);
			//die();
			break;
		default:
			break;
	}																
}

// add and edit a quelle

if(isset($_POST['Speichern']) && isset($_POST['ÄnderungenSpeichern'])) {
	$herkunft_id = isset($_POST['herkunft_id']) ? $_POST['herkunft_id'] : '';
	$code = isset($_POST['code']) ? $_POST['code'] : '';
	$titel = isset($_POST['titel']) ? $_POST['titel'] : '';
	$jahr = isset($_POST['jahr']) ? $_POST['jahr'] : '';
	$band = isset($_POST['band']) ? $_POST['band'] : '';
	$nummer = isset($_POST['nummer']) ? $_POST['nummer'] : '';
	$jahrgang = isset($_POST['jahrgang']) ? $_POST['jahrgang'] : '';
	$supplementheft = isset($_POST['supplementheft']) ? $_POST['supplementheft'] : '';
	$autor_id = isset($_POST['autor_id']) ? $_POST['autor_id'] : '';

	$data_array =  array(
		"herkunft_id"   	=> $herkunft_id,
		"code"      		=> $code,
		"titel"     		=> $titel,
		"jahr"				=> $jahr,
		"band" 				=> $band,
		"nummer" 			=> $nummer,
		"autor_id" 			=> $autor_id,
		"file_url" 			=> ''
	);


	// add quelle

	if(isset($_POST['Speichern'])) {
		//print_r($data_array);
		$get_data = callAPI('POST', $baseApiURL.'quelle/add', json_encode($data_array));
		//print_r($get_data);
		//die();
	}
	// edit quelle

	if(isset($_POST['ÄnderungenSpeichern'])) {
		$zeitschrift_id = $_POST['zeitschrift_id'];
		$get_data = callAPI('POST',  $baseApiURL.'quelle/update?quelle_id='.$zeitschrift_id, json_encode($data_array));
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
			$sprache = '';
			$herkunft_id = '';
			$quelle_schema_id = '';
			$jahr = '';
			$band = '';
			$nummer = '';
			$jahrgang = '';
			$supplementheft = '';
			$autor_id = '';
			$file_url = '';
			$_SESSION['success'] = $response['message'];
			$zeitschriften = $response['content']['data'];
			$autoren = $zeitschriften['autoren'];
			foreach ($autoren as $key => $autor) {
				$autor_id_selected_values[] = $autor['autor_id'];
			}
			//header('Location: '.$absoluteUrl. 'stammdaten/zeitschriften/index.php');
			break;	
		case 3:
			$_SESSION['validationError'] = $response['message'];
			break;
		default:
			//header('Location: '.$absoluteUrl. 'stammdaten/zeitschriften/index.php');
			break;
	}
}
