<?php

	include '../include/connection.php';
	header( 'Content-Type: application/json; charset=utf-8' );

	$idAnnouncement = $_POST['id_announcement'];
	$idUser = $_POST['id_user'];

	mysqli_query($conn, "UPDATE tbl_announcement_content SET status_announcement = '1' 
    WHERE id_announcement = '".$idAnnouncement."' AND id_user_announcement = '".$idUser."'");

	echo json_encode('success');
    
	mysqli_close($conn);
?>