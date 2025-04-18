<?php
    $query1 = "SELECT * FROM tbl_course JOIN tbl_author ON tbl_course.author = tbl_author.id_author JOIN tbl_category ON tbl_course.category = tbl_category.cat_id WHERE tbl_course.status = 0 ORDER BY tbl_course.id_packs DESC";

    $sql1 = mysqli_query($conn, $query1);

    $androidStore = $result['authentication'];
    $iosStore = $result['your_website'];
    $name = array();

    while ($course = mysqli_fetch_assoc($sql1)) {

        $queLec = mysqli_query($conn, "SELECT * FROM tbl_course_lecture WHERE cl_id = '".$course['id_packs']."' ORDER BY tbl_course_lecture.lec_id ASC");

        $lecture = [];

        foreach ($queLec as $key => $value) {

            $lecture[$key]['lec_id'] = $value['lec_id'];
            $lecture[$key]['cl_id'] = $value['cl_id'];
            $lecture[$key]['title_chapter'] = $value['title_chapter'];
            $lecture[$key]['file_chapter'] = $course_pack.$value['cl_id'].'/'.$value['file_chapter'];
            $lecture[$key]['image_chapter'] = $course_pack.$value['cl_id'].'/'.$value['image_chapter'];
        }

        $courses['id_course'] = $course['id_packs'];
        $courses['name'] = $course['name'];
        $courses['author'] = $course['name_author'];
        $courses['status'] = $course['status'];
        $courses['image_author'] = $image_author.$course['image_author'];
        $courses['short_desc_author'] = $course['short_desc_author'];
        $courses['desc_author'] = $course['desc_author'];
        $courses['photo_manga'] = $image_pack.$course['photo_course'];
        $courses['shortdes'] = $course['shortdes'];
        $courses['description'] = $course['description'];
        $courses['lecture'] = $lecture;

        array_push($name, $courses);
    }

    $head = array(
        'authentication'=>$androidStore,
        'website'=>$iosStore,
        'course'=>$name);

    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($head,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
?>