<?php
	include '../include/connection.php';
	if (isset($_GET['course_id'])) {
	 
		$delId = $_GET['course_id'];

		$course_del_path = "SELECT * FROM tbl_course_lecture WHERE lec_id = '".$delId."'";
		$delCourse = "DELETE FROM tbl_course_lecture WHERE lec_id = '".$delId."'";

		$que_del_path = mysqli_query($conn, $course_del_path);
		$datas = mysqli_fetch_assoc($que_del_path);

		if($datas['photo_course']!=""){
			unlink('../image/image_course/'.$datas['photo_course']);
		}

		$que_del_pack = mysqli_query($conn, $delCourse);
		?>
			<script type="text/javascript">
				window.location = '../home#view/';
			</script>
		<?php
	}
?>