<?php include_once('includes/header.php');?>
<?php
    $sql="SELECT mypost.id, post_title, post_excerpt, post_pic, cat_name, reporter_name, post_date FROM mypost, mycategory, myreporter WHERE cat_id=mycategory.id AND reporter_id=myreporter.id ORDER BY mypost.id DESC";
    $result=$db_config->query($sql);
?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manage Posts</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <?php
                if (isset($_GET['alert']) && $_GET['alert']=='success') {
                echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                        Post deleted successfully!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                }elseif ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        Fail to delete post! Try again.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                }
            ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    List of available catagory
                </div>
                <div class="card-body table-responsive">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>News excerpt</th>
                                <th>Category</th>
                                <th>Reporter</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>News Details</th>
                                <th>Category</th>
                                <th>Reporter</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                while ($data=$result->fetch_object()) {
                                echo"<tr>
                                        <td>$data->id</td>
                                        <td>$data->post_title</td>
                                        <td>$data->post_excerpt</td>
                                        <td>$data->cat_name</td>
                                        <td>$data->reporter_name</td>
                                        <td>$data->post_date</td>
                                        <td>
                                            <a href='update_posts.php?id=$data->id' class='me-3'><i class='fas fa-edit'></i></a>
                                            <a href='includes/process.php?action=post_del&pid=$data->id&img=$data->post_pic' class='text-danger' onclick='return confirm(\"Are you sure about delete?\")'>
                                                <i class='fas fa-trash-alt'></i>
                                            </a>
                                        </td>
                                    </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
<?php include_once('includes/footer.php');?> 