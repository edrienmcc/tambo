<?php

	include '../include/connection.php';
	if (isset($_POST['submit'])) {
		$cl_id = $_SESSION['cl_id_ses'];
		$title = $_POST['name'];
        $pdf_temp = $_FILES['pdf']['tmp_name'];
        $pdf = $_FILES['pdf']['name'];

        $photo_temp = $_FILES['photo']['tmp_name'];
        $photo = $_FILES['photo']['name'];

        $photoReplace = "chapter_img_".time().str_replace(" ", "_", $photo);
        $pdfReplace = "chapter_pdf_".time().str_replace(" ", "_", $pdf);		

		$path = "../image/image_lecture/";

		mysqli_query($conn, "INSERT INTO tbl_course_lecture (cl_id, title_chapter, file_chapter, image_chapter) VALUES ('$cl_id', '$title', '$pdfReplace', '$photoReplace')");

		move_uploaded_file($photo_temp, $path.$cl_id.'/'.$photoReplace);
        move_uploaded_file($pdf_temp, $path.$cl_id.'/'.$pdfReplace);

        $_SESSION['msg']="Upload file name $title successfully";
		?>
			<script type="text/javascript">
				window.location = "javascript:history.go(-1)";
			</script>
		<?php
	}
?>