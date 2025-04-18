<?php include 'include/header.php';?>
<?php include 'include/demo.php';?>
<body>
	<div class="container col-lg-11">
	<div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
		<?php include 'include/child-tab.php';?>
		<div class="tab-content" id="myTabContent">	
			<div role="tabpanel">
				<div class="card">
					<div class="card-header">
						<h4>All Courses</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Image</th>
									<th scope="col">Publisher</th>
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
												<img src="<?php include 'image/baseurl.php'; echo $image_content;?><?php echo $row['photo_course'];?>" height=70 width=100 id=myImg>
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
													if($row['status']=="0"){?>

														<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">Disabled</span>
													<?php }else { ?>

														<?php 
															if ($demoOrLive == "1") { ?>
																<a href="lecture.php?lec=<?php echo $row['id_packs'];?>" class="btn btn-info"><i class="fa fa-plus"></i></a>
														<?php } else {?>
																<a href="#view/" class="btn btn-info"><i class="fa fa-plus"></i></a>
														<?php } ?>

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
		</div>
	</div>
</div>
<?php include 'include/footer.php';?>
</body>
</html>