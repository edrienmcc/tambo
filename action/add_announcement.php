<?php

    include '../include/connection.php';
    include '../image/baseurl.php';

    if (isset($_POST['submit'])) {
         
        $name = addslashes($_POST['name']);
        $shortdes = addslashes($_POST['shortdes']);
        $description = $_POST['description'];
        $times = date("Y-m-d h:i:s");

        $insert = "INSERT INTO tbl_announcement(title_announcement, short_announcement, desc_announcement) VALUES ('".$name."', '".$shortdes."', '".$description."')";

        mysqli_query($conn, $insert);

        $idAnnouncement = $conn->insert_id;

        $selectUser = mysqli_query($conn, "SELECT * FROM tbl_user WHERE status_user = 1");

        while($data = mysqli_fetch_array($selectUser)){
            mysqli_query($conn, "INSERT INTO tbl_announcement_content(id_announcement, id_user_announcement, status_announcement, time_announcement) VALUES 
            ('".$idAnnouncement."', '".$data['id_user']."', '0', '".$times."')");
        }

        ?>
            <script>
                window.location = '../announcement';
            </script>
        <?php

    }
?>