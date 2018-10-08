<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'mainCall.php';

include '../config/route.php'
$data_array =  array(
		"Code" 		=> '',
		"Suchname"  => '',
		"Titel"		=> '',
		"Vorname" 	=> '',
		"Nachname"  => 'Mukesh',
		"Geburtsdatum" => '',
		"Sterbedatum" => '',
		"Kommentar" => '',
		"Sterbedatum" => '',
		"ip_address" => '',
	);
//$baseURL = 'https://alegralabs.com/hemanta/symcom/api/public/v1/';

$get_data = callAPI('POST', 'https://alegralabs.com/hemanta/symcom/api/public/v1/user/login', '');
// $response = json_decode($get_data, true);
// $status = $response['status'];
// $autoren = $response['content']['data'];
var_dump($get_data);