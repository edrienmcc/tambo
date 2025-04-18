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
						<?php $id = $_GET['lec'];?>
						<h4>All Chapter</h4><a href="addlecture.php?addlec=<?php echo $id;?>">Add Chapter</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<?php
								if (isset($_GET['news_id'])) { 
									$deleteNews = $_GET['news_id'];
									$news_del = "DELETE FROM tbl_ebook WHERE id_ebook = '".$deleteNews."'";
									$news_del_path = "SELECT * FROM tbl_ebook WHERE id_ebook = '".$deleteNews."'";
									$que_del_path = mysqli_query($conn, $news_del_path);
									$datas = mysqli_fetch_assoc($que_del_path);

									if($datas['pdf']!=""){
										unlink('ebook/'.$datas['pdf']);
									}

									if($datas['photo']!=""){
										unlink('image/'.$datas['photo']);
									}
									$que_del = mysqli_query($conn, $news_del);
								}
							?>
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Id Lec</th>
									<th scope="col">Name</th>
									<th scope="col">Photo</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
									<?php
										$employee = mysqli_query($conn, "SELECT * from tbl_course_lecture WHERE cl_id = '".$id."' ORDER BY lec_id DESC");
										while($row = mysqli_fetch_array($employee))
										{ ?>
											<tr>
											<td><?php echo $row['lec_id'] ?></td>
											<td><?php echo $row['cl_id'] ?></td>
											<td><?php echo $row['title_chapter']?></td>
											<td><a href="<?php include 'image/baseurl.php'; echo $image_chapter.$id.'/';?><?php echo $row['image_chapter'];?>" id="example1" title="<?php echo $row['title_chapter'] ?>">
												<img src="<?php include 'image/baseurl.php'; echo $image_chapter.$id.'/';?><?php echo $row['image_chapter'];?>" height=100 width=80 id=myImg>
												</a>
											</td>								
											<td>
												<a href="editlecture.php?edit_lec=<?php echo $row['lec_id'];?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
												&ensp;
												<?php 
													if ($demoOrLive == "1") { ?>
														<a href="action/delete_lecture.php?course_id=<?php echo $row['lec_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news?')"><i class="fa fa-trash"></i></a>
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