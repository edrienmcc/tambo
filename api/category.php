<?php
    $json3 = array();

    $query3 = "SELECT * FROM tbl_category WHERE cat_status = '1' ORDER BY cat_id DESC";
    $sql3 = mysqli_query($conn, $query3);

    while ($data3 = mysqli_fetch_assoc($sql3)) {
        
        $row3['cat_id'] = $data3['cat_id'];
        $row3['photo_cat'] = $file_path.'image/'.$data3['photo_cat'];
        $row3['name'] = $data3['cat_name'];
        $row3['status'] = $data3['cat_status'];
        $row3['color'] = $data3['cat_background'];

        array_push($json3, $row3);
    }
    $row['category'] = $json3;
    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($row,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
?>