<?php
	include '../include/connection.php';
	
	$data = file_get_contents('php://input');
	$dataDecode = json_decode($data, true);

	$name = $dataDecode['add_view'];
	$id = $dataDecode['id'];

	$que = mysqli_query($conn, "SELECT * FROM tbl_course WHERE id_packs = '".$id."'");
	$fetch = mysqli_fetch_assoc($que);
	$views = $fetch['views'];

	$add = $name + $views;

	$upd = "UPDATE tbl_course SET views = '".$add."' WHERE id_packs = '".$id."'";

	mysqli_query($conn, $upd);

?>