<?php

    $idUser = $_GET['id_user'];

    $query1 = "SELECT * FROM tbl_collection_title WHERE collection_title_user_id = '$idUser' ORDER BY id_collection_title DESC";
    $sql1 = mysqli_query($conn, $query1);

    $name = array();

    while ($collections = mysqli_fetch_assoc($sql1)) {

        $collection['id_collection_title'] = $collections['id_collection_title'];
        $collection['collection_title'] = $collections['collection_title'];
        $collection['created_date'] = $collections['created_date'];

        array_push($name, $collection);
    }

    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($name, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
?>