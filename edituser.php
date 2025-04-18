<?php include 'include/header.php';?>
<body>
	<div class="container">
	<div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
		<?php include 'include/child-tab.php';?>
		<div class="tab-content" id="myTabContent">	
			<div role="tabpanel">
				<div class="card">
					<div class="card-header">
						<h4>All Category</h4>
					</div>
					<div class="card-body">
						<?php
							$id = $_GET['id_user'];
							$query = "SELECT * FROM tbl_user WHERE id_user = '".$id."'";

							$ms = mysqli_query($conn, $query);
							$result = mysqli_fetch_assoc($ms);

							if (isset($_POST['submit'])) {
						
								$status = $_POST['status'];
								if(!empty($status)){
									foreach($status as $valueStatus){
										
									}
								}                                 

								$query = "UPDATE tbl_user SET status_user = '".$valueStatus."' WHERE id_user = '".$id."'";

								mysqli_query($conn, $query);

								?>
									<script>
										window.location = 'user.php';
									</script>
								<?php
								
							}
						?>
						<form class="form" role="form" method="post" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">User Name</label>
								<div class="col-lg-9">
									<input class="form-control" name="name" value="<?php echo $result['name_user']; ?>" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">User Email</label>
								<div class="col-lg-9">
									<input class="form-control" name="name" value="<?php echo $result['email_user']; ?>" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">User Password</label>
								<div class="col-lg-9">
									<input class="form-control" name="name" value="<?php echo $result['password']; ?>" disabled>
								</div>
							</div>												
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Badge Image</label>
								<div class="col-lg-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
											<img src="<?php include 'image/baseurl.php'; echo $image_path.$result['photo_user'];?>" alt=""/>
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail"
											style="
											max-width: 200px;
											max-height: 150px;
											line-height: 20px;">
										</div>
										<div>
											<span class="btn btn-file btn-primary">
												<span class="fileupload-new">Select image</span>
												<span class="fileupload-exists">Change</span>
												<input type="file" name="photo" accept="image/x-png" disabled></span>
											<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Status</label>
								<div class="col-lg-9">
									<div class="checkbox anim-checkbox">
										<input type="checkbox" id="ch3" name="status[]" value="1" <?php if($result['status_user']=="1"){ ?>checked<?php }?>/>
										<label for="ch3">Active</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-12 text-center">
									<input type="submit" name="submit" class="btn btn-primary" value="Save">
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