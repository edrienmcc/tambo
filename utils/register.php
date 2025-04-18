<?php
	include '../include/connection.php';
	include '../image/baseurl.php';
	define('user_image', $image_path);

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$photo = $_FILES['photo']['name'];
	$tmp = $_FILES['photo']['tmp_name'];
	$type = $_POST['type_user'];
	$token = $_POST['token'];
	$resultToken = $token == "" ? "" : $token;
	$times = date("Y-m-d h:i:s");

	$query = "SELECT * FROM tbl_user WHERE name_user = '$name' AND email_user = '$email'";
	$check = mysqli_fetch_array(mysqli_query($conn, $query));

	if (isset($check)) {
		responseRegister($check, 400);
	}else{
		mysqli_query($conn, "INSERT INTO tbl_user(name_user, email_user, photo_user, password, score, status_user, type_user, token) VALUES 
		('".$name."', '".$email."', '".$photo."', '".$password."', '0', '1', '".$type."', '".$resultToken."')");
		move_uploaded_file($tmp, '../image/user/'.$photo);

		$getData = mysqli_fetch_array(mysqli_query($conn, $query));
		responseRegister($getData, 200);

		$insert = "INSERT INTO tbl_announcement(title_announcement, short_announcement, desc_announcement) VALUES ('Register Successfully', 'Thank you for being part of manga reader, get started to explore your manga', 'Thank you for being part of manga reader, get started to explore your manga')";

        mysqli_query($conn, $insert);

		$idAnnouncement = $conn->insert_id;

		mysqli_query($conn, "INSERT INTO tbl_announcement_content(id_announcement, id_user_announcement, status_announcement, time_announcement)
		 VALUES ('".$idAnnouncement."',  '".$getData['id_user']."', '0', '".$times."')");
	}

	function responseRegister($getData, $resp){
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