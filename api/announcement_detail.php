<?php
    $idUser = $_GET['id_user'];
    $idAnnouncement = $_GET['detail_announcement'];

    $query1 = "SELECT * FROM tbl_announcement_content JOIN tbl_announcement ON tbl_announcement_content.id_announcement = tbl_announcement.id_announcement 
    WHERE tbl_announcement_content.id_user_announcement = '".$idUser."' AND tbl_announcement_content.id_announcement = '".$idAnnouncement."'";

    $sql1 = mysqli_query($conn, $query1);

    $announcement = mysqli_fetch_assoc($sql1);

    if($announcement['status_announcement'] == 0){
        $total = mysqli_num_rows(mysqli_query($conn, $query1));
        $totalUnread = $total;
    }

    $data['id'] = $announcement['id_announcement'];
    $data['title'] = $announcement['title_announcement'];
    $data['short_title'] = $announcement['short_announcement'];
    $data['statusRead'] = $announcement['status_announcement'];
    $data['date'] = $announcement['time_announcement'];
    $data['description'] = $announcement['desc_announcement'];

    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
?>