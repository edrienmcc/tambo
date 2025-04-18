<?php include 'include/header.php';?>
<?php include 'include/demo.php';?>
<body>
	<div class="container">
	<div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
		<?php include 'include/child-tab.php';?>
		<div class="tab-content" id="myTabContent">	
			<div role="tabpanel">
				<div class="card">
					<div class="card-header">
						<h4>All News</h4>
					</div>
				<div class="card-body">
				<?php
					$id = $_GET['edit_pack'];
					$query = "SELECT * FROM tbl_course WHERE id_packs = '".$id."'";

					$ms = mysqli_query($conn, $query);
					$result = mysqli_fetch_assoc($ms);

					if (isset($_POST['submit'])) {
					
						$name = addslashes($_POST['name']);
				        $category = $_POST['category'];
				        $author = $_POST['author'];
				        $shortdes = addslashes($_POST['shortdes']);
				        $description = $_POST['description'];

						if($_FILES['photo']['name']!=""){
							$file = $_FILES['photo']['tmp_name'];
							$filename = $_FILES['photo']['name'];
							$target_directory = "image/image_course/";

							$new_image = "edumy_".time()."_".str_replace(" ", "", $filename);
							$target_filepath = $target_directory.$new_image;
							$image = $new_image;

							$query = "UPDATE tbl_course SET name = '".$name."', author = '".$author."', photo_course = '".$image."', category = '".$category."', shortdes = '".$shortdes."', description = '".$description."' WHERE id_packs = '".$id."'";

							if ($result['photo_course']!="") {
								unlink('image/image_course/'.$result['photo_course']);
							}
							mysqli_query($conn, $query);
							move_uploaded_file($file, $target_filepath);
				            ?>
							<script type="text/javascript">
								window.location = 'home#view/';
							</script>
							<?php

						}else{
							$query = "UPDATE tbl_course SET name = '".$name."', author = '".$author."', category = '".$category."', shortdes = '".$shortdes."', description = '".$description."' WHERE id_packs = '".$id."'";

							mysqli_query($conn, $query);

							?>
							<script type="text/javascript">
								window.location = 'home#view/';
							</script>
							<?php
						}

					}
				?>
					<form class="form" role="form" method="post" enctype="multipart/form-data">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Title Course</label>
								<div class="col-lg-9">
									<input class="form-control" name="name" value="<?php echo $result['name'];?>" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Category</label>
								<div class="col-lg-9">
									<?php
										include 'include/connection.php';
										$cat_que = "SELECT * FROM tbl_category";
										$cat_sel = mysqli_query($conn, $cat_que);
										$cat_sel_equals = mysqli_query($conn, "SELECT * FROM tbl_course WHERE id_packs = '".$id."'");
										$data_name = mysqli_fetch_assoc($cat_sel_equals);
									?>
									<select name="category" class="form-control" required>
										<?php while ($data = mysqli_fetch_assoc($cat_sel)) {
											if ($data['cat_id'] == $data_name['category']) {?>
												<option selected="<?php echo $data_name['category'];?>" value="<?php echo $data['cat_id'];?>">
													<?php echo $data['cat_name'];?>
												</option>
											<?php } else { ?>
												<option value="<?php echo $data['cat_id'];?>">
													<?php echo $data['cat_name'];?>
												</option>
											}
										<?php }} ?>
									</select>
								</div>
							</div>   
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Author</label>
								<div class="col-lg-9">
									<?php
										include 'include/connection.php';
										$cat_que = "SELECT * FROM tbl_author";
										$cat_sel = mysqli_query($conn, $cat_que);
										$cat_sel_equals = mysqli_query($conn, "SELECT * FROM tbl_course WHERE id_packs = '".$id."'");
										$data_name = mysqli_fetch_assoc($cat_sel_equals);
									?>
									<select name="author" class="form-control" required>
										<?php while ($data = mysqli_fetch_assoc($cat_sel)) {
											if ($data['id_author'] == $data_name['author']) {?>
												<option selected="<?php echo $data_name['author'];?>" value="<?php echo $data['id_author'];?>">
													<?php echo $data['name_author'];?>
												</option>
											<?php } else { ?>
												<option value="<?php echo $data['id_author'];?>">
													<?php echo $data['name_author'];?>
												</option>
											}
										<?php }} ?>
									</select>
								</div>
							</div>	
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Image Course (750 x 500) recomended</label>
								<div class="col-lg-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
											<img src="<?php include 'image/baseurl.php'; echo $image_pack.$result['photo_course'];?>" alt=""/>
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
												<input type="file" name="photo" accept="image/*"></span>
											<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Short Description</label>
								<div class="col-lg-9">
									<textarea class="form-control" name="shortdes" style="height:150px;"><?php echo $result['shortdes'];?></textarea>
								</div>
							</div>
							<div class="form-group row" id="news_article_display">
								<label class="col-lg-3 col-form-label form-control-label">Description</label>
								<div class="col-lg-9">
									<textarea name="description" id="description" class="form-control">
										<?php echo $result['description']?>
									</textarea>
                                    <script>CKEDITOR.replace( 'description' );</script>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-12 text-center">
									<input type="submit" <?php 
										if ($demoOrLive == "1") { ?>
											name="submit"
									<?php } else { ?>
											onclick="return confirm('Demo version not working.')"
									<?php } ?> 
									class="btn btn-primary" value="Save">
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