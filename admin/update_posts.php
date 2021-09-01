<?php include_once('includes/header.php');?>

<?php
if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $sql="SELECT id, post_title, cat_id, post_details, post_pic, reporter_id FROM  mypost WHERE id='$id'";
    $result=$db_config->query($sql);
    $data=$result->fetch_object();
    $pid=$data->id;
    $post_title=$data->post_title;
    $cat_id=$data->cat_id;
    $post_details=$data->post_details;
    $post_pic=$data->post_pic;
    $reporter_id=$data->reporter_id;
}
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Post</h1>
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
                    Fail to update post! Try again.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            if (isset($_GET['alert']) && $_GET['alert']=='success') {
            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                    Post updated successfully!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        ?>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit post
            </div>
            <div class="card-body table-responsive">
                <form action="includes/process.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="pid" value="<?php echo $pid ?>">
                    <div class="mb-3">
                        <label for="post_title" class="form-label">Post Title</label>
                        <input type="text" name="post_title" value="<?php if (!empty($post_title)) echo $post_title ?>" class="form-control" id="post_title" placeholder="Name of category">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="post_cat" class="form-label">Category</label>
                            <select class="form-select" name="post_cat" id="post_cat" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <?php
                                    $csql="SELECT id,cat_name FROM mycategory";
                                    $cresult=$db_config->query($csql);
                                    while ($crow=$cresult->fetch_object()) { ?>
                                    <option 
                                    value='<?php echo $crow->id ?>'
                                    <?php if ($crow->id==$cat_id) echo 'selected' ?>>
                                    <?php echo $crow->cat_name ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="post_reporter" class="form-label">Reporter</label>
                            <select class="form-select" name="post_reporter" id="post_reporter" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <?php
                                    $rsql="SELECT id,reporter_name FROM myreporter";
                                    $rresult=$db_config->query($rsql);
                                    while ($rrow=$rresult->fetch_object()) { ?>
                                    <option 
                                    value='<?php echo $rrow->id ?>'
                                    <?php if ($rrow->id==$reporter_id) echo 'selected' ?>>
                                    <?php echo $rrow->reporter_name ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="post_detail" class="form-label">Post Details</label>
                        <textarea name="post_detail" class="form-control" id="summernote" id="post_detail" rows="3"><?php if (!empty($post_details)) echo $post_details ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="post_excerpt" class="form-label">News Excerpt</label>
                        <textarea name="post_excerpt" class="form-control" id="post_excerpt" rows="1"> </textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="post_img" class="form-control" id="post_img">
                        <label class="input-group-text" for="post_img">Feature Image</label>
                    </div>
                    <div class="mb-3">
                        <img src="../post_images/<?php echo $post_pic ?>" class="img-thumbnail w-25 h-25" alt="News picture">
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="upost_submit" value="Update" class="btn btn-primary" id="mypost">
                    </div>
                </form> 
            </div>
        </div>
    </div>
</main>

<?php include_once('includes/footer.php');?> 