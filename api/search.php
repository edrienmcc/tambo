<?php
    $search = $_GET['search'];

    $query1 = "SELECT * FROM tbl_course JOIN tbl_author ON tbl_course.author = tbl_author.id_author JOIN tbl_category ON tbl_course.category = tbl_category.cat_id WHERE tbl_course.name LIKE '%".$search."%' AND status = 1 ORDER BY tbl_course.id_packs DESC";

    $sql1 = mysqli_query($conn, $query1);

    $androidStore = $result['authentication'];
    $iosStore = $result['your_website'];
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