<?php include 'include/header.php';?>
<?php include 'include/demo.php';?>
<?php include 'image/baseurl.php';?>
<body>
  <div class="container col-lg-11">
  <div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
    <?php include 'include/child-tab.php';?>
    <div class="tab-content" id="myTabContent"> 
      <div role="tabpanel">
        <div class="card">
          <div class="card-header">
            <h4>Add Chapter</h4>
          </div>
          <div class="card-body">
            <?php 
                $id = $_GET['addlec'];     
                $_SESSION['cl_id_ses'] = $id;         
             ?>
            <form class="form" method="post" action="action/add_lecture.php" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Title</label>
                <div class="col-lg-9">
                  <input class="form-control" name="name">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Chapter File</label>
                <div class="col-lg-9">
                  <input class="form-control" type="file" name="pdf" accept="application/pdf">
                </div>
              </div>   
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Chapter Image</label>
                <div class="col-lg-9">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                      <img src="assets/img/demoUpload.jpg" alt=""/>
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
                <div class="col-lg-12 text-center">
                  <p style="color: green"><?php echo $_SESSION['msg'];?></p>
                  <input type="submit" <?php 
                    if ($demoOrLive == "1") { ?>
                      name="submit"
                  <?php } else { ?>
                      onclick="return confirm('Demo version not working.')"
                  <?php } ?>  class="btn btn-primary" value="Save">
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