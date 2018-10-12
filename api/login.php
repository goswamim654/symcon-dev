<?php
include 'mainCall.php';
if(isset($_POST['username']) && isset($_POST['username'])) {
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$data_array =  array("username" => $username, "password" => $password );

	//print_r(json_encode($data_array));

	$get_data = callAPI('POST', $baseApiURL.'user/login', json_encode($data_array));
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			$_SESSION['token_type'] = $response['content']['token_type'];
			$_SESSION['access_token'] = $response['content']['access_token'];
			$_SESSION['username'] = $response['content']['username'];
			$_SESSION['user_type'] = $response['content']['user_type'];
			$_SESSION['last_login_at'] = $response['content']['last_login_at'];
			header('Location: '.$absoluteUrl);
			break;	
		case 3:
			$_SESSION['validationError'] = $response['message'];
			break;
		default:
			break;
	}
}
// print_r($status);
// die();

?>