<?php
    $idc = $_GET['detail'];
    $userId = $_GET['user_id'];

    $query1 = "SELECT * FROM tbl_course JOIN tbl_author ON tbl_course.author = tbl_author.id_author JOIN tbl_category ON tbl_course.category = tbl_category.cat_id WHERE id_packs = '".$idc."' ORDER BY tbl_course.id_packs ASC";

    $sql1 = mysqli_query($conn, $query1);

    $androidStore = $result['authentication'];
    $iosStore = $result['your_website'];
    $name = array();
    $course = mysqli_fetch_assoc($sql1);

    $queLec = mysqli_query($conn, "SELECT * FROM tbl_course_lecture WHERE cl_id = '".$course['id_packs']."' ORDER BY tbl_course_lecture.lec_id ASC");

    $collection = mysqli_query($conn, "SELECT * FROM tbl_collection WHERE id_user = '".$userId."' AND id_ebook = '".$idc."'");
    $collectionData = mysqli_fetch_assoc($collection);
    $collectionTitle = mysqli_query($conn, "SELECT * FROM tbl_collection_title WHERE id_collection_title = '".$collectionData['id_collection_title']."'");
    $collectionTitleData = mysqli_fetch_assoc($collectionTitle);

    $queryFavorite = "SELECT * FROM tbl_favorites WHERE id_fav_course = '".$idc."' AND id_fav_user = '".$userId."'";
    $selectFavorite = mysqli_fetch_assoc(mysqli_query($conn, $queryFavorite));

    $favorite['id_favorite'] = $selectFavorite['id_favorites'];
    $favorite['id_fav_course'] = $selectFavorite['id_fav_course'];
    $favorite['id_fav_user'] = $selectFavorite['id_fav_user'];

    $collectionObj['collection_title'] = $collectionTitleData['collection_title'];
    $collectionObj['created_date'] = $collectionTitleData['created_date'];
    $collectionObj['id_ebook'] = $collectionData['id_ebook'];

    $data = responseApi($course, $queLec, 'detail', $collectionObj, $favorite);

    $head = array('manga'=> $data);

    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($head,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die(); 
?>