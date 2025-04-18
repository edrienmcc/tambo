<?php
    $idBook = $_GET['display_comment'];

    $query1 = "SELECT * FROM tbl_comments JOIN tbl_user ON tbl_comments.id_user = tbl_user.id_user WHERE tbl_comments.id_book = '".$idBook."' ORDER BY tbl_comments.id_comments DESC";

    $sql1 = mysqli_query($conn, $query1);

    $name = array();

    while ($comments = mysqli_fetch_assoc($sql1)) {

        $comment['id_user'] = $comments['id_user'];
        $comment['name_user'] = $comments['name_user'];
        $comment['comment_text'] = $comments['comment_text'];
        $comment['comment_created'] = $comments['comment_created'];
        $comment['photo_user'] = $image_path.$comments['photo_user'];

        array_push($name, $comment);
    }

    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($name,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
?>