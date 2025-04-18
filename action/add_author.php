<?php

    include '../include/connection.php';

    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $shortdes = addslashes($_POST['shortdes']);
    $description = addslashes($_POST['description']);
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo = $_FILES['photo']['name'];
    $strphoto = str_replace(" ", "", $photo);
    $strphoto_temp = str_replace(" ", "", $photo_tmp);
    $md5photo = time()."_".$strphoto;
    

    $query = "INSERT INTO tbl_author (name_author, image_author, short_desc_author, desc_author, author_email, author_password, status_author) VALUES ('$name', '$md5photo', '$shortdes', '$description', '$email', '$password', '1')";

    if (isset($_POST['submit'])) {
    
        move_uploaded_file($strphoto_temp, "../image/image_author/".$md5photo);
        mysqli_query($conn, $query);
        ?>
        <script>
            window.location = '../author';
        </script>
        <?php
    } else {
        ?>
        <script>
            window.location = '../author';
        </script>
        <?php
    }
?>