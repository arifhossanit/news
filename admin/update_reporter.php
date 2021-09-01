<?php include_once('includes/header.php');?>
<?php
if (isset($_GET["rid"])) {
    $id=$_GET["rid"];
    $sql="SELECT id, reporter_name, reporter_mail, reporter_mobile FROM myreporter WHERE id='$id'";
    $result=$db_config->query($sql);
    $data=$result->fetch_assoc();
}
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Reporter Info</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
                          if (isset($_GET['alert']) && $_GET['alert']=='type') {
                          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                  Extension not allowed, please choose a JPEG, JPG or PNG file!
                                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                              </div>";
                          }
                          if(isset($_GET['alert']) && $_GET['alert']=='size') {
                          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                  File size must be under 2 MB!
                                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                              </div>";
                          }
                          if (isset($_GET['alert']) && $_GET['alert']=='success') {
                          echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                  Reporter updated successfully!
                                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                  </div>";
                          }elseif ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                  Fail to update reporter! Try again.
                                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                  </div>";
                          }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Reporter
                            </div>
                            <div class="card-body table-responsive">
                              <form action="includes/process.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleId" class="form-label">Reporter Id</label>
                                    <input type="text" name="rid" value="<?php if (!empty($data['id'])) echo $data['id'] ?>" class="form-control" id="exampleId" placeholder="101">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Reporter Name</label>
                                    <input type="text" name="rname" value="<?php if (!empty($data['reporter_name'])) echo $data['reporter_name'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="Name of category">
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                                  <input type="email" name="rmail" value="<?php if (!empty($data['reporter_mail'])) echo $data['reporter_mail'] ?>" class="form-control" id="exampleInputEmail1" placeholder="example@mail.com">
                                </div>
                                <div class="mb-3">
                                  <label for="examplePhone" class="form-label">Phone Number</label>
                                  <input type="text" name="rmobile" value="<?php if (!empty($data['reporter_mobile'])) echo $data['reporter_mobile'] ?>" class="form-control" id="examplePhone" placeholder="01xxxxxxxxxx">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" name="rimg" class="form-control" id="rimg">
                                    <label class="input-group-text" for="rimg">Upload Image</label>
                                </div>
                                <div class="mb-3">
                                  <input type="submit" name="ersubmit" value="Update" class="btn btn-primary">
                                </div> 
                              </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?> 