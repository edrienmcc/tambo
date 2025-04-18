<?php
	include '../include/connection.php';
	
	$name = $_GET['name'];
	$id = $_GET['id'];

	$select = "SELECT * FROM tbl_stickers_pack WHERE id_packs = $id";
	$que = mysqli_query($conn, $select);
	$fetch = mysqli_fetch_assoc($que);

	$views = $fetch['views'];

	$add = $name + $views;

	$upd = "UPDATE tbl_stickers_pack SET views = $add WHERE id_packs = $id";

	mysqli_query($conn, $upd);

?>