<?php
	include '../include/connection.php';
	if (isset($_GET['course_id'])) {
	 
		$delSticker = $_GET['course_id'];
		
		$stick_del = "DELETE FROM tbl_course WHERE id_packs = '".$delSticker."'";
		$stick_del_path = "SELECT * FROM tbl_course WHERE id_packs = '".$delSticker."'";

		$delStickerPack = "DELETE FROM tbl_course_lecture WHERE cl_id = '".$delSticker."'";

		$que_del_path = mysqli_query($conn, $stick_del_path);
		$datas = mysqli_fetch_assoc($que_del_path);


		if($datas['photo_course']!=""){
			unlink('../image/image_course/'.$datas['photo_course']);
		}

		$que_del_pack = mysqli_query($conn, $delStickerPack);
		$que_del = mysqli_query($conn, $stick_del);
		?>
			<script type="text/javascript">
				window.location = '../home#view/';
			</script>
		<?php
	}
?>