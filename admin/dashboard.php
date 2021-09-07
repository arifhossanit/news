<?php include_once('includes/header.php');?>
<?php
    $sql="SELECT mypost.id, post_title, post_excerpt, cat_name, reporter_name, post_date FROM mypost, mycategory, myreporter WHERE cat_id=mycategory.id AND reporter_id=myreporter.id";
    $result=$db_config->query($sql);
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Posts Table</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage_posts.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Comments Table</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage_comments.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Users Table</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage_users.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">News Catagory Table</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage_category.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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
                                            <a href='includes/process.php?action=post_del&pid=$data->id' class='text-danger' onclick='return confirm(\"Are you sure about delete?\")'>
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