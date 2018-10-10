<?php 
include '../api/mainCall.php';
include '../config/route.php';
if(isset($_GET['autorId'])) {
	$autorId = $_GET['autorId'];
	$autorEditUrl = $baseApiURL.'autor/view?autorId='.$autorId;
	$get_data = callAPI('GET',$autorEditUrl , false);
	$response = json_decode($get_data, true);
	$status = $response['status'];
	$autoren = $response['content']['data'];
	echo $get_data;															
}