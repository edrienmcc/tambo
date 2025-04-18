<?php
	include '../include/connection.php';
	if (isset($_GET['id_notif'])) {
	 
		$id = $_GET['id_notif'];
		$infodel = "DELETE FROM tbl_notification WHERE id_notification = '".$id."'";

		mysqli_query($conn, $infodel)

		?>
			<script type="text/javascript">
				window.location = '../home#info/';
			</script>
		<?php
		
	}
?>