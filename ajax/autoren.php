<?php 
include '../api/mainCall.php';
include '../config/route.php';
if(isset($_GET['autorId'])) {
	$autorId = $_GET['autorId'];
	$autorEditUrl = $baseApiURL.'autor/view?autorId='.$autorId;
	$get_data = callAPI('GET',$autorEditUrl , false);
	echo $get_data;															
}