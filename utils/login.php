<?php

	include '../include/connection.php';
	include '../image/baseurl.php';
	define('user_image', $image_path);

	$email = $_POST['email'];
	$password = $_POST['password'];
	
	///google field register
	$type = $_POST['type'];
	$name = $_POST['name'];
	$photo = $_POST['photo'];
	///end field google

	$query = "SELECT * FROM tbl_user WHERE email_user = '$email' AND password = '$password' AND status_user = 1";
	$check = mysqli_fetch_array(mysqli_query($conn, $query));
	$getData = mysqli_fetch_assoc(mysqli_query($conn, $query));

	if($type == "google"){
		///check again when new user data added by google
		if(isset($check)){

			responseLogin($getData, 200);

		}else{
			mysqli_query($conn, "INSERT INTO tbl_user(name_user, email_user, photo_user, password, score, status_user) VALUES
			('".$name."', '".$email."', '".$photo."', '".$password."', '', '1')");

			$query = "SELECT * FROM tbl_user WHERE email_user = '$email' AND password = '$password' AND status_user = 1";
			$check = mysqli_fetch_array(mysqli_query($conn, $query));
			$getData = mysqli_fetch_assoc(mysqli_query($conn, $query));

			responseLogin($getData, 200);
		}
	}else{
		if (isset($check)) {
			responseLogin($getData, 200);
		}else{
			responseLogin($getData, 400);
		}
	}
	mysqli_close($conn);

	function responseLogin($getData, $resp){
		$img = user_image;

		$data['message'] = $resp;
		$data['token'] = $getData['token'] == "" ? $getData['id_user'] : $getData['token'];
		$data['username'] = $getData['name_user'];
		$data['email'] = $getData['email_user'];
		$data['photo'] = $img.$getData['photo_user'];
		$data['type_account'] = $getData['type_user'];

		header( 'Content-Type: application/json; charset=utf-8' );
		echo json_encode($data);

	}
?>