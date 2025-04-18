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
            <h4>Edit Chapter</h4>
          </div>
          <div class="card-body">
            <?php 
                $id = $_GET['edit_lec'];    
                $query = mysqli_query($conn, "SELECT * FROM tbl_course_lecture WHERE lec_id = '".$id."'");
                $result = mysqli_fetch_assoc($query);

                if (isset($_POST['submit'])) {

                    $title = $_POST['name'];
                    $pdf_temp = $_FILES['pdf']['tmp_name'];
                    $pdf = $_FILES['pdf']['name'];

                    $photo_temp = $_FILES['photo']['tmp_name'];
                    $photo = $_FILES['photo']['name'];

                    $photoReplace = "chapter_img_".time().str_replace(" ", "_", $photo);
                    $pdfReplace = "chapter_pdf_".time().str_replace(" ", "_", $pdf);

                    $path = "image/image_lecture/";

                    if ($pdf != "" && $photo !="") {
                      if ($result['file_chapter'] != "") {
                          unlink($path.$result['cl_id'].'/'.$result['file_chapter']);
                      }

                      if ($result['image_chapter'] != "") {
                          unlink($path.$result['cl_id'].'/'.$result['image_chapter']);
                      }

                      mysqli_query($conn, "UPDATE tbl_course_lecture SET title_chapter = '".$title."', file_chapter = '".$pdfReplace."', image_chapter = '".$photoReplace."' WHERE lec_id = '".$id."'");

                      move_uploaded_file($photo_temp, $path.$result['cl_id'].'/'.$photoReplace);
                      move_uploaded_file($pdf_temp, $path.$result['cl_id'].'/'.$pdfReplace);

                      ?>
                        <script type="text/javascript">
                          window.location = "javascript:history.go(-1)";
                        </script>
                      <?php

                    }else{
                      
                      mysqli_query($conn, "UPDATE tbl_course_lecture SET title_chapter = '".$title."' WHERE lec_id = '".$id."'");

                      ?>
                        <script type="text/javascript">
                          window.location = 'javascript:history.go(-1)';
                        </script>
                      <?php
                    }
                }
             ?>
            <form class="form" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Title</label>
                <div class="col-lg-9">
                  <input class="form-control" name="name" value="<?php echo $result['title_chapter'];?>">
                </div>
              </div> 
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Chapter File</label>
                <div class="col-lg-9">
                  <input class="form-control" type="file" name="pdf" accept="application/pdf">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Current Chapter File</label>
                <div class="col-lg-9">
                  <p><?php include "image/baseurl.php"; echo $course_pack.$result['cl_id'].'/'.$result['file_chapter'];?></p>
                </div>
              </div>   
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Chapter Image</label>
                <div class="col-lg-9">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                      <img src="<?php include 'image/baseurl.php'; echo $course_pack.$result['cl_id'].'/'.$result['image_chapter'];?>" alt=""/>
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