<?php

	include '../include/connection.php';
	header( 'Content-Type: application/json; charset=utf-8' );

	$idEbook = $_POST['id_ebook'];
	$idUser = $_POST['id_user'];
	$type = $_POST['type'];

	if($type == 'add'){
	
		mysqli_query($conn, "INSERT INTO tbl_favorites (id_fav_course, id_fav_user) VALUES ('".$idEbook."', '".$idUser."')");
		echo json_encode(200);
	
	}else if($type == 'delete'){

		mysqli_query($conn, "DELETE FROM tbl_favorites WHERE id_fav_course = '".$idEbook."' AND id_fav_user = '".$idUser."'");
		echo json_encode(200);

	}
?>