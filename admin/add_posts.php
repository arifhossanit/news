<?php include_once('includes/header.php');?>
<?php
 $csql="SELECT id,cat_name FROM mycategory";
 $rsql="SELECT id,reporter_name FROM myreporter";
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">New Post</h1>
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
                            if ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    Fail to add post! Try again.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                            if (isset($_GET['alert']) && $_GET['alert']=='success') {
                            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                    Post added successfully!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Add Post
                            </div>
                            <div class="card-body table-responsive">
                                <form action="includes/process.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="post_title" class="form-label">Post Title</label>
                                        <input type="text" name="post_title" class="form-control" id="post_title" placeholder="Name of category">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="post_cat" class="form-label">Category</label>
                                            <select class="form-select" name="post_cat" id="post_cat" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <?php
                                                    $result=$db_config->query($csql);
                                                    while ($data=$result->fetch_assoc()) {
                                                        print_r($data);
                                                        $cat_id=$data['id'];
                                                        $cat_name=$data['cat_name'];
                                                        echo "<option value='$cat_id'>$cat_name</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="post_reporter" class="form-label">Reporter</label>
                                            <select class="form-select" name="post_reporter" id="post_reporter" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <?php
                                                    $results=$db_config->query($rsql);
                                                    while ($row=$results->fetch_assoc()) {
                                                        $rid=$row['id'];
                                                        $rname=$row['reporter_name'];
                                                        echo "<option value='$rid'>$rname ($rid)</option>";
                                                        
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="post_detail" class="form-label">Post Details</label>
                                        <textarea name="post_detail" class="form-control" id="summernote" id="post_detail" rows="3"></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" name="post_img" class="form-control" id="post_img">
                                        <label class="input-group-text" for="post_img">Feature Image</label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" name="post_submit" value="Publish" class="btn btn-primary" id="mypost">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>