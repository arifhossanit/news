<?php include_once('includes/header.php');?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Add Category
                            </div>
                            <div class="card-body table-responsive">
                              <?php
                              if (isset($_GET['alert']) && $_GET['alert']=='success') {
                                echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                        Category add successfully!
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                      </div>";
                              }elseif ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        Fail to add category! Try again.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                      </div>";
                                # code...
                              }
                              ?>
                              <form action="includes/process.php" method="post">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Category</label>
                                    <input type="text" name="cat_name" class="form-control" id="exampleFormControlInput1" placeholder="Name of category">
                                </div>
                                <div class="mb-3">
                                  <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
                                  <textarea name="cat_detail" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                  <input type="submit" value="Add" name="cat_add" class="btn btn-primary">
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>  