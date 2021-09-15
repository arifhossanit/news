<?php include_once('includes/header.php');?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Comments</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
                            if (isset($_GET['alert']) && $_GET['alert']=='success') {
                            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                    User comment deleted successfully!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    Fail to delete Comment! Try again.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Showing reader comments
                            </div>
                            <div class="card-body table-responsive">
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Post Id</th>
                                            <th>User Id</th>
                                            <th>Comments</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Post Id</th>
                                            <th>User Id</th>
                                            <th>Comments</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $sql="SELECT * FROM mycomments ORDER BY mycomments.id DESC";
                                        $result=$db_config->query($sql);
                                        while ($data=$result->fetch_object()) {
                                        $phpdate = strtotime( $data->comment_date );
                                        $mysqldate = date( 'd M Y, h:i A', $phpdate )
                                    ?>
                                        <tr>
                                            <td><?php echo $data->id;?></td>
                                            <td><?php echo $data->post_id;?></td>
                                            <td><?php echo $data->user_id;?></td>
                                            <td><?php echo $data->comment;?></td>
                                            <td><?php echo $data->comment_date;?></td>
                                            <td class="text-center">
                                                <a href='includes/process.php?action=com_del&id=<?php echo $data->id;?>' class='text-danger' onclick='return confirm(\"Are you sure about delete?\")'>
                                                    <i class='fas fa-trash-alt'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?> 