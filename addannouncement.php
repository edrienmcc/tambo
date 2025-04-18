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
						<h4>Add Announcement</h4>
					</div>
					<div class="card-body">
						<form class="form" role="form" method="post" action="action/add_announcement.php">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Title Announcement (100) character</label>
								<div class="col-lg-9">
									<input class="form-control" name="name" maxlength="100" required>
								</div>
							</div>
                            <div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Short Description (250) character</label>
								<div class="col-lg-9">
									<textarea class="form-control" name="shortdes" maxlength="250" style="height:150px;"></textarea>
								</div>
							</div>
							<div class="form-group row" id="news_article_display">
								<label class="col-lg-3 col-form-label form-control-label">Description</label>
								<div class="col-lg-9">
									<textarea name="description" id="description" class="form-control"></textarea>

                                    <script>CKEDITOR.replace( 'description' );</script>
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