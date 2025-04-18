<?php
	include '../include/connection.php';
    header( 'Content-Type: application/json; charset=utf-8' );

	$idUser = $_POST['id_user'];
	$idEbook = $_POST['id_ebook'];
    $type = $_POST['type'];
    $times = date("Y-m-d h:i:s");

    if($type == 'create'){
        $title = $_POST['collection_title'];

        if(!empty($title)){
            mysqli_query($conn, "INSERT INTO tbl_collection_title(collection_title, collection_title_user_id, created_date) VALUES ('".$title."', '".$idUser."', '".$times."')");
            $msg = 200;
            echo json_encode($msg);
        }else{
            $msg = 400;
            echo json_encode($msg);
        }
    }else if($type == 'add'){

        $idCollection = $_POST['collection_id'];

        if(!empty($idUser) && !empty($idEbook)){
            mysqli_query($conn, "INSERT INTO tbl_collection(id_user, id_ebook, id_collection_title) VALUES ('".$idUser."', '".$idEbook."', '".$idCollection."')");
    
            $msg = 200;
            echo json_encode($msg);
        }else{
            $msg = 400;
            echo json_encode($msg);
        }
    }else if($type == 'delete'){
        mysqli_query($conn, "DELETE FROM tbl_collection WHERE id_ebook = '".$idEbook."' AND id_user = '".$idUser."'");
        echo json_encode(200);
    }
	
?>