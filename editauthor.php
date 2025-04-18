<?php include 'include/header.php';?>
<body>
	<div class="container">
	<div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
		<?php include 'include/child-tab.php';?>
		<div class="tab-content" id="myTabContent">	
			<div role="tabpanel">
				<div class="card">
					<div class="card-header">
						<h4>All Edit Publisher</h4>
					</div>
					<div class="card-body">
						<?php
							$id = $_GET['id_author'];
							$query = "SELECT * FROM tbl_author WHERE id_author = '".$id."'";

							$ms = mysqli_query($conn, $query);
							$result = mysqli_fetch_assoc($ms);

							if (isset($_POST['submit'])) {
							
								$name = addslashes($_POST['name']);
							    $email = addslashes($_POST['email']);
							    $password = addslashes($_POST['password']);
							    $shortdes = addslashes($_POST['shortdes']);
							    $description = addslashes($_POST['description']);  
								                                

								if($_FILES['photo']['name']!=""){
									
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

									$query = "UPDATE tbl_author SET name_author = '".$name."', image_author = '".$md5photo."', short_desc_author = '".$shortdes."', desc_author = '".$description."', author_email = '".$email."', author_password = '".$password."' WHERE id_author = '".$id."'";

									if ($result['image_author']!="") {
										unlink('image/image_author/'.$result['image_author']);
									}

									move_uploaded_file($strphoto_temp, "image/image_author/".$md5photo);
									mysqli_query($conn, $query);
									?>
									<script>
										window.location = 'author.php';
									</script>
									<?php

								}

								$query = "UPDATE tbl_author SET name_author = '".$name."', short_desc_author = '".$shortdes."', desc_author = '".$description."', author_email = '".$email."', author_password = '".$password."' WHERE id_author = '".$id."'";
								mysqli_query($conn, $query);

								?>
									<script>
										window.location = 'author.php';
									</script>
								<?php
								
							}
						?>
						<form class="form" role="form" method="post" action="" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Name</label>
								<div class="col-lg-9">
									<input class="form-control" name="name" value="<?php echo $result['name_author']; ?>">
								</div>
							</div>	
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Email</label>
								<div class="col-lg-9">
									<input class="form-control" name="email" value="<?php echo $result['author_email']; ?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Password</label>
								<div class="col-lg-9">
									<input class="form-control" name="password" value="<?php echo $result['author_password']; ?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Author / Teacher Image (512x512) recomended</label>
								<div class="col-lg-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
											<img src="<?php include 'image/baseurl.php'; echo $image_author.$result['image_author'];?>" alt=""/>
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
												<input type="file" name="photo" accept="image/jpeg"></span>
											<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Short Description (200 word)</label>
								<div class="col-lg-9">
									<textarea class="form-control" name="shortdes" style="height:100px;"><?php echo $result['short_desc_author']; ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Description</label>
								<div class="col-lg-9">
									<textarea class="form-control" name="description" style="height:150px;"><?php echo $result['desc_author']; ?></textarea>
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