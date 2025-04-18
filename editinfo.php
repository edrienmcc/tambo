<?php include 'include/header.php';?>
<?php include 'include/demo.php';?>
<?php include 'image/baseurl.php';?>
<body>
  <div class="container">
  <div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
    <?php include 'include/child-tab.php';?>
    <div class="tab-content" id="myTabContent"> 
      <div role="tabpanel">
        <div class="card">
          <div class="card-header">
            <h4>Add Stickers</h4>
          </div>
          <div class="card-body">
          	<?php
          		$id = $_GET['edit_info'];

          		$query = mysqli_query($conn, "SELECT * FROM tbl_notification WHERE id_notification = '".$id."'");

          		$result = mysqli_fetch_assoc($query);
          	?>
            <form class="form" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-lg-3 col-form-label form-control-label">Title</label>
				<div class="col-lg-9">
				  <input class="form-control" name="name" value="<?php echo $result['notification_title'] ?>" disabled>
				</div>
			</div> 
			<div class="form-group row">
				<label class="col-lg-3 col-form-label form-control-label">Short Description</label>
				<div class="col-lg-9">
					<textarea class="form-control" name="shortdes" style="height:100px;" disabled><?php echo $result['notification_shortdesc'] ?></textarea>
				</div>
			</div>    
			<div class="form-group row" id="news_article_display">
				<label class="col-lg-3 col-form-label form-control-label">Description</label>
				<div class="col-lg-9">
					<textarea name="description" id="description" class="form-control" disabled><?php echo $result['notification_desc'] ?></textarea>

                    <script>CKEDITOR.replace( 'description' );</script>
				</div>
			</div>           
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'include/footer.php';?>
</body>
</html>