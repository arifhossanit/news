<?php include_once('includes/header.php');?>
<?php
if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $sql="SELECT id, cat_name, cat_detail FROM mycategory WHERE id='$id'";
    $result=$db_config->query($sql);
    $data=$result->fetch_assoc();
}

?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
                            if (isset($_GET['alert']) && $_GET['alert']=='success') {
                            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                    Category updated successfully!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    Fail to updated category! Try again.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Category
                            </div>
                            <div class="card-body table-responsive">
                              <form action="includes/process.php" method="post">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Category No.</label>
                                    <input type="text" name="cat_no" value="<?php if (!empty($data['id'])) echo $data['id'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="Number of category">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Category</label>
                                    <input type="text" name="cat_name" value="<?php if (!empty($data['cat_name'])) echo $data['cat_name'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="Name of category">
                                </div>
                                <div class="mb-3">
                                  <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
                                  <textarea name="cat_detail" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php if (!empty($data['cat_detail'])) echo $data['cat_detail'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                  <input type="submit" value="Update" name="cat_edit" class="btn btn-primary">
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>  