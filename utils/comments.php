<?php
	include '../include/connection.php';
    header( 'Content-Type: application/json; charset=utf-8' );

	$idUser = $_POST['id_user'];
	$idEbook = $_POST['id_ebook'];
	$comment = $_POST['comments'];
    $times = date("Y-m-d h:i:s");
	
	if(!empty($idUser) && !empty($idEbook)){
        mysqli_query($conn, "INSERT INTO tbl_comments(id_user, id_book, comment_text, comment_created)
        VALUES ('".$idUser."', '".$idEbook."', '".$comment."', '".$times."')");

        $msg = 200;
        echo json_encode($msg);
    }else{
        $msg = 400;
        echo json_encode($msg);
    }

?>