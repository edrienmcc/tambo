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
						<h4>All User</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<?php
								if (isset($_GET['id_user'])) { 
									$deleteNews = $_GET['id_user'];
									$news_del = "DELETE FROM tbl_user WHERE id_user = '".$deleteNews."'";
									$news_del_path = "SELECT * FROM tbl_user WHERE id_user = '".$deleteNews."'";
									$que_del_path = mysqli_query($conn, $news_del_path);
									$datas = mysqli_fetch_assoc($que_del_path);

									if($datas['photo_user']!=""){
										unlink('image/user/'.$datas['photo_user']);
									}

									$que_del = mysqli_query($conn, $news_del);
								}
							?>
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Status</th>
									<th scope="col">Image</th>
									<th scope="col" style="width: 15%">Action</th>
								</tr>
								</thead>
								<tbody>
								<?php
									$cat = mysqli_query($conn, "SELECT * from tbl_user");
									$cat_id = mysqli_query($conn, "SELECT * from tbl_user");
									while($row = mysqli_fetch_array($cat))
									{ ?>
										<tr>
										<td><?php echo $row['id_user'] ?></td>
										<td><?php echo $row['name_user'] ?></td>
										<td>
											<?php
												if($row['status_user']!="0"){?>

													<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">Published</span>										
												<?php }else{ ?>
													<span class="badge badge-dark-lighten" style="color: #ef042f; background-color: rgba(49,58,70,.18);">Disabled</span>

												<?php }
											?>
										</td>
										<td><a href="<?php include 'image/baseurl.php';?><?php echo $image_path.$row['photo_user'];?>" id="example1" title="<?php echo $row['name_user'] ?>">
											<img src="<?php include 'image/baseurl.php';?><?php echo $image_path.$row['photo_user'];?>" height=70 width=100 id=myImg>
											</a>
										</td>
										<td>
											<?php 
												if ($demoOrLive == "1") { ?>
													<a href="edituser?id_user=<?php echo $row['id_user'];?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
											<?php } else {?>
													<a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
											<?php } ?>											
											&ensp;
											<!-- <?php 
												if ($demoOrLive == "1") { ?>
													<a href="userlistbadge.php?ulbadge=<?php echo $row['id_user'];?>" class="btn btn-info"><i class="fa fa-plus"></i></a>
											<?php } else {?>
													<a href="#view/" class="btn btn-info"><i class="fa fa-plus"></i></a>
											<?php } ?>
											&ensp; -->
											<?php 
												if ($demoOrLive == "1") { ?>
													<a href="?id_user=<?php echo $row['id_user'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this User?')"><i class="fa fa-user-times"></i></a>
											<?php } else {?>
													<a href="" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this User?')"><i class="fa fa-user-times"></i></a>
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