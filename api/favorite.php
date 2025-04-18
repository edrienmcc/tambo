<?php
    $idUser = $_GET['favorite'];

    $query1 = "SELECT * FROM tbl_course JOIN tbl_author ON tbl_course.author = tbl_author.id_author JOIN tbl_category ON tbl_course.category = tbl_category.cat_id JOIN tbl_favorites ON tbl_course.id_packs = tbl_favorites.id_fav_course JOIN tbl_user ON tbl_favorites.id_fav_user = tbl_user.id_user WHERE tbl_favorites.id_fav_user = '".$idUser."' AND status = 1 ORDER BY tbl_favorites.id_favorites DESC";

    $sql1 = mysqli_query($conn, $query1);
    $name = array();

    while ($course = mysqli_fetch_assoc($sql1)) {

        $queLec = mysqli_query($conn, "SELECT * FROM tbl_course_lecture WHERE cl_id = '".$course['id_packs']."' ORDER BY tbl_course_lecture.lec_id ASC");

        $data = responseApi($course, $queLec);

        array_push($name, $data);
    }

    $head = array('manga'=> $name);

    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($head,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
?>