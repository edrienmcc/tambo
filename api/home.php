<?php
    $query1 = "SELECT * FROM tbl_course JOIN tbl_author ON tbl_course.author = tbl_author.id_author JOIN tbl_category ON tbl_course.category = tbl_category.cat_id WHERE status = 1 ORDER BY tbl_course.id_packs DESC LIMIT 5";

    $sql1 = mysqli_query($conn, $query1);
    $popular = array();

    while ($course = mysqli_fetch_assoc($sql1)) {

        $queLec = mysqli_query($conn, "SELECT * FROM tbl_course_lecture WHERE cl_id = '".$course['id_packs']."' ORDER BY tbl_course_lecture.lec_id ASC");
        $data = responseApi($course, $queLec);

        array_push($popular, $data);
    }

    $row['popular'] = $popular;


    $queryLatest = "SELECT * FROM tbl_course JOIN tbl_author ON tbl_course.author = tbl_author.id_author JOIN tbl_category ON tbl_course.category = tbl_category.cat_id WHERE tbl_course.status = 1 ORDER BY tbl_course.id_packs DESC LIMIT 7";

    $sqlLatest = mysqli_query($conn, $queryLatest);
    $latest = array();

    while ($course = mysqli_fetch_assoc($sqlLatest)) {

        $queLec = mysqli_query($conn, "SELECT * FROM tbl_course_lecture WHERE cl_id = '".$course['id_packs']."' ORDER BY tbl_course_lecture.lec_id ASC");

        $data = responseApi($course, $queLec);

        array_push($latest, $data);
    }

    $row['latest'] = $latest;

    $limit=SLIDER;
		
    $querySlider = "SELECT * FROM tbl_course JOIN tbl_author ON tbl_course.author = tbl_author.id_author JOIN tbl_category ON tbl_course.category = tbl_category.cat_id WHERE status = 1 ORDER BY tbl_course.id_packs ASC LIMIT $limit";

    $sqlSlider = mysqli_query($conn, $querySlider);

    $slider = array();

    while ($course = mysqli_fetch_assoc($sqlSlider)) {

        $queLec = mysqli_query($conn, "SELECT * FROM tbl_course_lecture WHERE cl_id = '".$course['id_packs']."' ORDER BY tbl_course_lecture.lec_id ASC");

        $data = responseApi($course, $queLec, 'slider');

        array_push($slider, $data);
    }

    $row['slider'] = $slider;


    $queryComing = "SELECT * FROM tbl_course JOIN tbl_author ON tbl_course.author = tbl_author.id_author JOIN tbl_category ON tbl_course.category = tbl_category.cat_id WHERE tbl_course.status = 0 ORDER BY tbl_course.id_packs DESC";
    $sqlComing = mysqli_query($conn, $queryComing);
    $coming = array();

    while ($course = mysqli_fetch_assoc($sqlComing)) {

        $queLec = mysqli_query($conn, "SELECT * FROM tbl_course_lecture WHERE cl_id = '".$course['id_packs']."' ORDER BY tbl_course_lecture.lec_id ASC");

        $data = responseApi($course, $queLec);

        array_push($coming, $data);
    }

    $row['coming'] = $coming;

    $set['home'] = $row;
		
    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
?>