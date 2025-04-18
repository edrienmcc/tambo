<?php
    $id = $_GET['announcement'];

    $query1 = "SELECT * FROM tbl_announcement_content JOIN tbl_announcement ON tbl_announcement_content.id_announcement = tbl_announcement.id_announcement WHERE id_user_announcement = '".$id."'";

    $sql1 = mysqli_query($conn, $query1);

    $name = array();
    $totalUnread = 0;

    while ($announcement = mysqli_fetch_assoc($sql1)) {
        if($announcement['status_announcement'] == 0){
            $total++;
            $totalUnread = $total;
        }
        $data['id'] = $announcement['id_announcement'];
        $data['title'] = $announcement['title_announcement'];
        $data['short_title'] = $announcement['short_announcement'];
        $data['statusRead'] = $announcement['status_announcement'];
        $data['date'] = $announcement['time_announcement'];
        $data['description'] = $announcement['desc_announcement'];
        array_push($name, $data);
    }

    $announcement = array('announcement'=> $name, 'total_unread'=> $totalUnread);

    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($announcement,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
?>