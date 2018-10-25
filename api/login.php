<?php
//include 'mainCall.php';
function callAPI($method, $url, $data) {

   $curl = curl_init();
   curl_setopt($curl, CURLOPT_POST, 1);
    if ($data) curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);

   

    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
   
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
   $result = curl_exec($curl);

   if(!$result) {
       header('Location: '.$absoluteUrl.'connection-failure.php');
   }
   curl_close($curl);
   return $result;
}
if(isset($_POST['username']) && isset($_POST['password'])) {
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$data_array =  array("username" => $username, "password" => $password );

	//print_r(json_encode($data_array));

	$get_data = callAPI('POST', $baseApiURL.'user/login', json_encode($data_array));
	$response = json_decode($get_data, true);
	$status = $response['status'];
	//echo $response['message'];
	switch ($status) {
		case 0:
			echo $response['message'];
			die();
			break;
		case 2:
			//$_SESSION['success'] = $response['message'];
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
			$loginError = $response['message'];
			break;
		default:
			break;
	}
}
// print_r($status);
// die();

?>