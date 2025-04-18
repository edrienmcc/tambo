<?php include 'include/header.php';?>
<?php include 'include/demo.php';?>
<body>
	<div class="container col-lg-11">
	<div class="mx-auto col-lg-12 main-section" id="myTab" role="tablist">
		<?php include 'include/tab.php';?>
		<div class="tab-content mytab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
				<div class="card">
					<div class="card-header">
						<h5>Home</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="my-cards col col-md-5 mx-auto">
								<a href="course">
								<i class="fa fa-book"></i>
								<div class="my-card">
									<h4><b>Manga</b></h4> 
									<p>See All Manga</p> 
								</div>
							</a>
							</div>

							<div class="my-cards col col-md-5 mx-auto">
								<a href="category">
								<i class="fa fa-list"></i>
								<div class="my-card">
									<h4><b>Category</b></h4> 
									<p>See All Category</p> 
								</div>
								</a>
							</div>							
						</div>
						<div class="row" style="margin-top: 20px;">
							<div class="my-cards col col-md-5 mx-auto">
								<a href="user">
								<i class="fa fa-users"></i>
								<div class="my-card">
									<h4><b>User</b></h4> 
									<p>See All User</p> 
								</div>
								</a>
							</div>
							<div class="my-cards col col-md-5 mx-auto">
								<a href="announcement">
								<i class="fa fa-users"></i>
								<div class="my-card">
									<h4><b>Announcement</b></h4> 
									<p>See All Announcement</p> 
								</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="view" role="tabpanel" aria-labelledby="view-tab">
				<div class="card">
					<div class="card-header">
						<h4>View Manga</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Image</th>
									<th scope="col">Author</th>
									<th scope="col">category</th>
									<th scope="col">Status</th>
									<th scope="col">Action</th>
								</tr>
								</thead> 
								<tbody>
									<?php
										$employee = mysqli_query($conn, "SELECT * from tbl_course JOIN tbl_category ON tbl_course.category = tbl_category.cat_id JOIN tbl_author ON tbl_course.author = tbl_author.id_author ORDER BY id_packs DESC");
										while($row = mysqli_fetch_array($employee))
										{ ?>
											<tr>
											<td><?php echo $row['id_packs'] ?></td>
											<td><?php echo $row['name']?></td>
											<td><a href="<?php include 'image/baseurl.php'; echo $image_content;?><?php echo $row['photo_course'];?>" id="example1" title="<?php echo $row['name'] ?>">
												<img src="<?php include 'image/baseurl.php'; echo $image_content;?><?php echo $row['photo_course'];?>" height=100 width=80 id=myImg>
												</a>
											</td>								
											<td><?php echo $row['name_author']; ?></td>
											<td><?php echo $row['cat_name']; ?></td>
											<td> 
												<?php
													if($row['status']=="1"){?>

														<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">Active</span>																
													<?php }else if($row['status'] =="2"){?>

														<span class="badge badge-dark-lighten" style="color: #000000; background-color: rgba(49,58,70,.18);">Under Review</span>

													<?php }else { ?>

														<span class="badge badge-dark-lighten" style="color: #ef042f; background-color: rgba(49,58,70,.18);">Rejected</span>

													<?php }
												?>
											</td>
											<td>
												<?php 
													if ($demoOrLive == "1") { ?>
														<a href="editcourse?edit_pack=<?php echo $row['id_packs'];?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
												<?php } else {?>
														<a href="#view/" class="btn btn-success"><i class="fa fa-edit"></i></a>
												<?php } ?>
												&ensp;
												<?php
													if($row['status']==""){?>

														<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">Deactived</span>
													<?php }else { ?>

														<a href="lecture.php?lec=<?php echo $row['id_packs'];?>" class="btn btn-info"><i class="fa fa-plus"></i></a>

													<?php }
												?>												
												&ensp;
												<?php 
													if ($demoOrLive == "1") { ?>
														<a href="action/delete_course.php?course_id=<?php echo $row['id_packs'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news?')"><i class="fa fa-trash"></i></a>
												<?php } else {?>
														<a href="#view/" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Ebook?')"><i class="fa fa-trash"></i></a>
												<?php } ?>
											</td>
											</tr>
										<?php }
									?>						
								</tbody>
							</table>
						</div>
					</div>					
				</div>
			</div>
			<div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab">
				<div class="card">
					<div class="card-header">
						<h4>Add Course, Category, Quiz and etc</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="my-cards col col-md-3 mx-auto">
								<a href="addcourse">
								<i class="fa fa-book"></i>
								<div class="my-card">
									<h4><b>Manga</b></h4> 
									<p>Add Manga</p> 
								</div>
							</a>
							</div>
							<div class="my-cards col col-md-3 mx-auto">
								<a href="addcategory">
								<i class="fa fa-list"></i>
								<div class="my-card">
									<h4><b>Category</b></h4> 
									<p>Add Category</p> 
								</div>
								</a>
							</div>	

							<div class="my-cards col col-md-3 mx-auto">
								<a href="addannouncement">
								<i class="fa fa-users"></i>
								<div class="my-card">
									<h4><b>Announcement</b></h4> 
									<p>Add Announcement</p> 
								</div>
								</a>
							</div>							
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="addnews" role="tabpanel" aria-labelledby="addnews-tab">
				<div class="card">
					<div class="card-header">
						<h4>Add Category / News: </h4> <?php include 'include/child-tab.php'; ?>
					</div>
					<div class="card-body">
						<form class="form" role="form" autocomplete="off">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Nama</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Harga</label>
								<div class="col-lg-9">
									<input class="form-control" type="number" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Category</label>
								<div class="col-lg-9">
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Deskripsi</label>
								<div class="col-lg-9">
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Gambar</label>
								<div class="col-lg-9">
									<input class="form-control" type="file" accept="image/*">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-12 text-center">
									<input type="button" class="btn btn-primary" value="Tambah">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
				<div class="card">
					<div class="card-header">
						<h5>View All</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<?php
								if (isset($_GET['cat_id'])) { 
									$deleteNews = $_GET['cat_id'];
									$news_del = "DELETE FROM tbl_category WHERE cat_id = '".$deleteNews."'";
									$news_del_path = "SELECT * FROM tbl_category WHERE cat_id = '".$deleteNews."'";
									$que_del_path = mysqli_query($conn, $news_del_path);
									$datas = mysqli_fetch_assoc($que_del_path);

									if($datas['photo_cat']!=""){
										unlink('image/'.$datas['photo_cat']);
									}
									$que_del = mysqli_query($conn, $news_del);

									?>
									<script type="text/javascript">
										window.location = 'home#category';
									</script>
									<?php
								}
							?>
							<table id="dataTables-example" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
									<tr>
										<th scope="col">#</th>
										<th scope="col">Name</th>
										<th scope="col">Status</th>
										<th scope="col">Image</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$cat = mysqli_query($conn, "SELECT * from tbl_category");
										$cat_id = mysqli_query($conn, "SELECT * from tbl_category");
										while($row = mysqli_fetch_array($cat))
										{ ?>
											<tr>
											<td><?php echo $row['cat_id'] ?></td>
											<td><?php echo $row['cat_name'] ?></td>
											<td>
												<?php
													if($row['cat_status']!="0"){?>

														<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">Published</span>																												

													<?php }else{ ?>

														<span class="badge badge-dark-lighten" style="color: #ef042f; background-color: rgba(49,58,70,.18);">Disabled</span>

													<?php }
												?>
											</td>
											<td><a href="<?php include 'image/baseurl.php';?><?php echo "image/".$row['photo_cat'];?>" id="example1" title="<?php echo $row['name'] ?>">
												<img src="<?php include 'image/baseurl.php';?><?php echo "image/".$row['photo_cat'];?>" height=100 width=70 id=myImg>
												</a>
											</td>
											<td>
												<?php 
													if ($demoOrLive == "1") { ?>
														<a href="editcategory.php?cat_id=<?php echo $row['cat_id'];?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
												<?php } else {?>
														<a href="#category/" class="btn btn-success"><i class="fa fa-edit"></i></a>
												<?php } ?>												
												&ensp;&ensp;
												<?php 
													if ($demoOrLive == "1") { ?>
														<a href="?cat_id=<?php echo $row['cat_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Category?')"><i class="fa fa-trash"></i></a>
												<?php } else {?>
														<a href="#category/" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Category?')"><i class="fa fa-trash"></i></a>
												<?php } ?>	
											</td>
											</tr>
										<?php }
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
				<div class="card">
					<div class="card-header">
						<h4>Setting</h4>
					</div>
					<div class="card-body">
						<?php

							$query = "SELECT * FROM tbl_setting WHERE id = 1";

							$ms = mysqli_query($conn, $query);
							$result = mysqli_fetch_assoc($ms);
						?>
						<form class="form" role="form" autocomplete="off" method="post" action="action/edit_setting.php">
							<ul class="list-group">
								<li class="list-group-item active" style="text-align: center; margin-bottom: 20px;">Home Setting</li>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Slider Manga</label>
									<div class="col-lg-9">
										<input class="form-control" type="number" name="slider" min="3" max="7" value="<?php echo $result['slider'];?>">
									</div>
								</div>
							</ul>
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