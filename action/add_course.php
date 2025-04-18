<?php

    include '../include/connection.php';
    include '../image/baseurl.php';

    if (isset($_POST['submit'])) {
         
        $name = addslashes($_POST['name']);
        $category = $_POST['category'];
        $author = $_POST['author'];
        $shortdes = addslashes($_POST['shortdes']);
        $description = $_POST['description'];
        $file = $_FILES['photo']['tmp_name'];
        $filename = $_FILES['photo']['name'];
        $target_directory = "../image/image_course/";

        $new_image = "mangabook_".time()."_".str_replace(" ", "", $filename);
        $target_filepath = $target_directory.$new_image;
        $image = $new_image;

        $insert = "INSERT INTO tbl_course(name, author, photo_course, category, shortdes, description) VALUES ('".$name."', '".$author."', '".$image."', '".$category."', '".$shortdes."', '".$description."')";

        $result = mysqli_query($conn, $insert);
        move_uploaded_file($file, $target_filepath);

        $lastIdOfStickerPacks = $conn->insert_id;
        $result = mysqli_query($conn, "INSERT INTO tbl_course_lecture(cl_id) VALUES ('".$lastIdOfStickerPacks."')");

        $path = "../image/image_lecture/";

        mkdir($path.$lastIdOfStickerPacks);

        ?>
            <script>
                window.location = '../home#view';
            </script>
        <?php

    }
?>