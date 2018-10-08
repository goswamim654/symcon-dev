<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'mainCall.php';

$data_array =  array(
	"Code"      => '',
	"Suchname"  => '',
	"Titel"     => '',
	"Vorname"   => '',
	"Nachname"  => 'Mukesh',
	"Geburtsdatum" => '',
	"Sterbedatum" => '',
	"Kommentar" => '',
	"Sterbedatum" => '',
	"ip_address" => '',
);

$get_data = callAPI('POST', 'https://alegralabs.com/hemanta/symcom/api/public/v1/autor/add', json_encode($data_array));
$response = json_decode($get_data, true);
$status = $response['status'];
$autoren = $response['content']['data'];
var_dump($get_data);