<?php include_once('includes/header.php');?>
<?php
    $sql="SELECT * FROM myreporter";
    $result=$db_config->query($sql);
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Reporters</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
                            if (isset($_GET['alert']) && $_GET['alert']=='success') {
                            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                    Reporter deleted successfully!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    Fail to delete reporter! Try again.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Reporters
                            </div>
                            <div class="card-body table-responsive">
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reporter Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Creation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Reporter Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Creation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while ($data=$result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php if (!empty($data['id'])) echo $data['id']; ?></td>
                                            <td><?php if (!empty($data['reporter_name'])) echo $data['reporter_name']; ?></td>
                                            <td><?php if (!empty($data['reporter_mail'])) echo $data['reporter_mail']; ?></td>
                                            <td><?php if (!empty($data['reporter_mobile'])) echo $data['reporter_mobile']; ?></td>
                                            <td><?php if (!empty($data['created_date'])) echo $data['created_date']; ?></td>
                                            <td>
                                                <a href="update_reporter.php?rid=<?php echo $data['id']?>" class="me-3"><i class="fas fa-user-edit"></i></i></a>
                                                <a href="includes/process.php?action=r_del&id=<?php echo $data['id']?>" class="text-danger"><i class="fas fa-trash-alt"></i></a>
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