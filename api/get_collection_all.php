<?php
    $idUser = $_GET['get_collection_all'];

    $query1 = "SELECT * FROM tbl_collection_title WHERE collection_title_user_id = '".$idUser."' ORDER BY id_collection_title DESC";
    $sql1 = mysqli_query($conn, $query1);

    $name = array();

    while ($collections = mysqli_fetch_assoc($sql1)) {

        $lecture = [];
        $itemQuery = "SELECT * FROM tbl_collection JOIN tbl_course ON tbl_collection.id_ebook = tbl_course.id_packs WHERE id_user = '".$collections['collection_title_user_id']."' AND id_collection_title = '".$collections['id_collection_title']."' ORDER BY id_collection DESC";
        $itemSelect = mysqli_query($conn, $itemQuery);

        foreach($itemSelect as $key => $value){
            $lecture[$key]['id_collection'] = $value['id_collection'];
            $lecture[$key]['id_user'] = $value['id_user'];
            $lecture[$key]['id_ebook'] = $value['id_ebook'];
            $lecture[$key]['id_collection_title'] = $value['id_collection_title'];
            $lecture[$key]['name'] = $value['name'];
            $lecture[$key]['photo_manga'] = img_content.$value['photo_course'];
            $lecture[$key]['id_manga'] = $value['id_packs'];
        }

        $collection['id_collection_title'] = $collections['id_collection_title'];
        $collection['collection_title'] = $collections['collection_title'];
        $collection['collection_title_user_id'] = $collections['collection_title_user_id'];
        $collection['created_date'] = $collections['created_date'];
        $collection['items'] = $lecture;

        array_push($name, $collection);
    }

    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($name, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
?>