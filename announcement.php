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
						<h4>All Announcement</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<?php
								if (isset($_GET['id_announcement'])) { 
									$deletePackage = $_GET['id_announcement'];
									mysqli_query($conn, "DELETE FROM tbl_announcement WHERE id_announcement = '".$deletePackage."'");
									mysqli_query($conn, "DELETE FROM tbl_announcement_content WHERE id_announcement = '".$deletePackage."'");
								}
							?>
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Title</th>
									<th scope="col">Short Description</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
									<?php
										$package = mysqli_query($conn, "SELECT * FROM tbl_announcement");
										while($row = mysqli_fetch_array($package))
										{ ?>
											<tr>
											<td><?php echo $row['id_announcement'] ?></td>
											<td><?php echo $row['title_announcement'] ?></td>
											<td><?php echo $row['short_announcement'] ?></td>							
											<td>
												<?php
													if ($demoOrLive == "1") { ?>
														<a href="?id_announcement=<?php echo $row['id_announcement'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this id_announcement?')"><i class="fa fa-user-times"></i></a>	
												<?php } else {?>
														<a href="" class="btn btn-danger" onclick="return confirm('Demo user not allowed to delete')"><i class="fa fa-user-times"></i></a>
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