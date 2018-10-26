<?php
include 'unauthenticated-main-call.php';

if(isset($_POST['username']) && isset($_POST['password'])) 
{
	$data_array =  array("username" => $_POST['username'], "password" => $_POST['password'] );
	$get_data = callAPI('POST', $baseApiURL.'user/login', json_encode($data_array));
	$response = json_decode($get_data, true);
	$status = $response['status'];
	switch ($status) {
		case 0:
			$error = $response['message'];
			break;
		case 2:
			$_SESSION['token_type'] = $response['content']['token_type'];
			$_SESSION['access_token'] = $response['content']['access_token'];
			$_SESSION['username'] = $response['content']['username'];
			$_SESSION['email'] = $response['content']['email'];
			$_SESSION['user_type'] = $response['content']['user_type'];
			$_SESSION['last_login_at'] = $response['content']['last_login_at'];
			header('Location: '.$absoluteUrl);
			break;	
		case 3:
			$validationError = $response['content'];
			break;
		case 4:
			$error = $response['message'];
			break;
		default:
			break;
	}
}

?>