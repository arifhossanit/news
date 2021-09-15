<?php include_once('includes/header.php');?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">New Advertisement</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
                          if (isset($_GET['alert']) && $_GET['alert']=='type') {
                          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                  Extension not allowed, please choose a gif, JPG or PNG file!
                                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                              </div>";
                          }
                          if(isset($_GET['alert']) && $_GET['alert']=='size') {
                          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                  File size must be under 2 MB!
                                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                              </div>";
                          }
                          if(isset($_GET['alert']) && $_GET['alert']=='url') {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    AD URL is not valid!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                          if (isset($_GET['alert']) && $_GET['alert']=='success') {
                          echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                  Advertisement added successfully!
                                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                  </div>";
                          }elseif ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                  Fail to add new advertisement! Try again.
                                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                  </div>";
                          }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Add AD
                            </div>
                            <div class="card-body table-responsive">
                              <form action="includes/process.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="adpname" class="form-label">Ad provider Name</label>
                                    <input type="text" name="adpname" class="form-control" id="adpname" placeholder="Name of ad provider">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" class="form-control" id="address" rows="3"></textarea>
                                </div>
                                <div class="row">
                                  <div class="col-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="01xxxxxxxxxx">
                                  </div>
                                  <div class="col-6 mb-3">
                                    <label for="adori" class="form-label">AD oriantation</label>
                                    <select class="form-select" name="adori" aria-label="Default select example" id="adori">
                                      <option selected disabled value="">Select AD oriantation type</option>
                                      <option value="portrait">Portrait</option>
                                      <option value="landscape">Landscape</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="mb-3">
                                  <label for="adurl" class="form-label">Ad Url</label>
                                  <input type="text" name="adurl" class="form-control" id="adurl" placeholder="Advertiser website">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" name="adpic" class="form-control" id="adpic">
                                    <label class="input-group-text" for="adpic">Upload Image</label>
                                </div>
                                <div class="mb-3">
                                  <input type="submit" name="adsubmit" value="Submit" class="btn btn-primary">
                                </div> 
                              </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>  